<?php

namespace ThreeDCart\Api\Soap;

use ThreeDCart\Api\Soap\Parameter\BatchSize;
use ThreeDCart\Api\Soap\Parameter\CallBackUrl;
use ThreeDCart\Api\Soap\Parameter\CustomerAction;
use ThreeDCart\Api\Soap\Parameter\StartNum;
use ThreeDCart\Api\Soap\Request\ClientInterface;
use ThreeDCart\Api\Soap\Request\MalFormedApiResponseException;
use ThreeDCart\Api\Soap\Request\ResponseHandlerInterface;
use ThreeDCart\Api\Soap\Request\ResponseInvalidException;
use ThreeDCart\Api\Soap\Resource\Customer\Address;
use ThreeDCart\Api\Soap\Resource\Customer\Customer;
use ThreeDCart\Api\Soap\Resource\Customer\LoginToken;
use ThreeDCart\Api\Soap\Resource\Order\Order;
use ThreeDCart\Api\Soap\Resource\Order\Status;
use ThreeDCart\Api\Soap\Resource\Product\Product;
use ThreeDCart\Api\Soap\Resource\Product\ProductInventory;
use ThreeDCart\Api\Soap\Resource\ResourceParserInterface;
use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Response\Xml;
use ThreeDCart\Primitive\ArrayValueObject;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class Client
 *
 * @package ThreeDCart\Api\Soap
 */
class Client
{
    const THREEDCART_SOAP_API_URL = 'http://api.3dcart.com/cart.asmx';
    
    const XML_TAG_PRODUCT = 'Product';
    const XML_TAG_CUSTOMER = 'Customer';
    const XML_TAG_PRODUCT_QUANTITY = 'ProductQuantity';
    const XML_TAG_CUSTOMER_COUNT = 'CustomerCount';
    const XML_TAG_ORDER_QUANTITY = 'Quantity';
    const XML_TAG_ORDER = 'Order';
    const XML_TAG_CUSTOMER_CONTACT_ID = 'contactid';
    const XML_TAG_Product_ID = 'ProductID';
    const XML_TAG_NEW_INVENTORY = 'NewInventory';
    const XML_TAG_INVOICE_NUM = 'InvoiceNum';
    const XML_TAG_NEW_STATUS = 'NewStatus';
    const XML_TAG_RESULT = 'result';
    const XML_TAG_RESULT_OK = 'OK';
    
    /** @var ClientInterface */
    private $soapClient;
    /** @var ResponseHandlerInterface */
    private $responseHandler;
    /** @var ResourceParserInterface */
    private $resourceParser;
    
    /**
     * @param ClientInterface          $soapClient
     * @param ResponseHandlerInterface $responseHandler
     * @param ResourceParserInterface  $resourceParser
     */
    public function __construct(
        ClientInterface $soapClient,
        ResponseHandlerInterface $responseHandler,
        ResourceParserInterface $resourceParser
    ) {
        $this->soapClient = $soapClient;
        $this->responseHandler = $responseHandler;
        $this->resourceParser = $resourceParser;
    }
    
    /**
     * @param BatchSize         $batchSize
     * @param StartNum          $startNum
     * @param StringValueObject $productId
     * @param CallBackUrl       $callBackUrl
     *
     * @return Product[]
     *
     * @throws ResponseInvalidException
     */
    public function getProducts(
        BatchSize $batchSize,
        StartNum $startNum,
        StringValueObject $productId,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse = $this->soapClient->getProduct($batchSize, $startNum, $productId, $callBackUrl);
        
        /** @var Product[] $products */
        $products = $this->getResources(
            $xmlResponse,
            new StringValueObject(Product::class),
            new StringValueObject(self::XML_TAG_PRODUCT)
        );
        
        return $products;
    }
    
    /**
     * @param BatchSize         $batchSize
     * @param StartNum          $startNum
     * @param StringValueObject $customersFilter Comma delimited string with zero or more search parameters.
     *                                           Allowed parameters: firstname, lastname, email, countrycode, statecode,
     *                                           city, phone. i.e.: firstname=John,email=john@email.com, countrycode=US,
     *                                           statecode=FL,city=Margate
     * @param CallBackUrl       $callBackUrl
     *
     * @return Customer[]
     *
     * @throws ResponseInvalidException
     */
    public function getCustomers(
        BatchSize $batchSize,
        StartNum $startNum,
        StringValueObject $customersFilter,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse = $this->soapClient->getCustomers($batchSize, $startNum, $customersFilter, $callBackUrl);
        
        /** @var Customer[] $customers */
        $customers = $this->getResources(
            $xmlResponse,
            new StringValueObject(Customer::class),
            new StringValueObject(self::XML_TAG_CUSTOMER)
        );
        
        return $customers;
    }
    
    /**
     * @param StringValueObject $invoiceNum
     * @param CallBackUrl       $callBackUrl
     *
     * @return Status
     *
     * @throws ResponseInvalidException
     */
    public function getOrderStatus(StringValueObject $invoiceNum, CallBackUrl $callBackUrl)
    {
        $xmlResponse = $this->soapClient->getOrderStatus($invoiceNum, $callBackUrl);
        
        /** @var Status $orderStatus */
        $orderStatus = $this->getResource($xmlResponse, new StringValueObject(Status::class));
        
        return $orderStatus;
    }
    
    /**
     * @param CallBackUrl $callBackUrl
     *
     * @return IntegerValueObject
     *
     * @throws ResponseInvalidException
     */
    public function getProductCount(CallBackUrl $callBackUrl)
    {
        $xmlResponse = $this->soapClient->getProductCount($callBackUrl);
        
        return $this->getIntegerValueObject($xmlResponse, new StringValueObject(self::XML_TAG_PRODUCT_QUANTITY));
    }
    
    /**
     * @param StringValueObject $productId
     * @param CallBackUrl       $callBackUrl
     *
     * @return ProductInventory
     *
     * @throws ResponseInvalidException
     */
    public function getProductInventory(StringValueObject $productId, CallBackUrl $callBackUrl)
    {
        $xmlResponse = $this->soapClient->getProductInventory($productId, $callBackUrl);
        
        /** @var ProductInventory $productInventory */
        $productInventory = $this->getResource($xmlResponse, new StringValueObject(ProductInventory::class));
        
        return $productInventory;
    }
    
    /**
     * @param StringValueObject  $customerEmail
     * @param IntegerValueObject $timeToLive
     * @param CallBackUrl        $callBackUrl
     *
     * @return LoginToken
     *
     * @throws ResponseInvalidException
     */
    public function getCustomerLoginToken(
        StringValueObject $customerEmail,
        IntegerValueObject $timeToLive,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse = $this->soapClient->getCustomerLoginToken($customerEmail, $timeToLive, $callBackUrl);
        
        /** @var LoginToken $loginToken */
        $loginToken = $this->getResource($xmlResponse, new StringValueObject(LoginToken::class));
        
        return $loginToken;
    }
    
    /**
     * @param CallBackUrl $callBackUrl
     *
     * @return IntegerValueObject
     *
     * @throws ResponseInvalidException
     */
    public function getCustomerCount(CallBackUrl $callBackUrl)
    {
        $xmlResponse = $this->soapClient->getCustomerCount($callBackUrl);
        
        return $this->getIntegerValueObject($xmlResponse, new StringValueObject(self::XML_TAG_CUSTOMER_COUNT));
    }
    
    /**
     * @param BooleanValueObject $startFrom
     * @param StringValueObject  $invoiceNum
     * @param StringValueObject  $status
     * @param \DateTime          $dateFrom
     * @param \DateTime          $dateTo
     * @param CallBackUrl        $callBackUrl
     *
     * @return IntegerValueObject
     *
     * @throws ResponseInvalidException
     */
    public function getOrderCount(
        BooleanValueObject $startFrom,
        StringValueObject $invoiceNum,
        StringValueObject $status,
        \DateTime $dateFrom = null,
        \DateTime $dateTo = null,
        CallBackUrl $callBackUrl = null
    ) {
        $xmlResponse =
            $this->soapClient->getOrderCount($startFrom, $invoiceNum, $status, $dateFrom, $dateTo, $callBackUrl);
        
        return $this->getIntegerValueObject($xmlResponse, new StringValueObject(self::XML_TAG_ORDER_QUANTITY));
    }
    
    /**
     * @param BatchSize          $batchSize
     * @param StartNum           $startNum
     * @param BooleanValueObject $startFrom If startFrom is true and invoiceNum is specified,
     *                                      the web service will return orders >= invoiceNum.
     *                                      If startFrom is false and invoiceNum is specified,
     *                                      the web service will return just the specified order.
     *                                      If invoiceNum is not specified, this parameter will be ignored.
     * @param StringValueObject  $invoiceNum
     * @param StringValueObject  $status
     * @param \DateTime          $dateFrom
     * @param \DateTime          $dateTo
     * @param CallBackUrl        $callBackUrl
     *
     * @return Order[]
     *
     * @throws ResponseInvalidException
     */
    public function getOrders(
        BatchSize $batchSize,
        StartNum $startNum,
        BooleanValueObject $startFrom,
        StringValueObject $invoiceNum,
        StringValueObject $status,
        \DateTime $dateFrom = null,
        \DateTime $dateTo = null,
        CallBackUrl $callBackUrl = null
    ) {
        $xmlResponse = $this->soapClient->getOrders(
            $batchSize,
            $startNum,
            $startFrom,
            $invoiceNum,
            $status,
            $dateFrom,
            $dateTo,
            $callBackUrl
        );
        
        /** @var Order[] $orders */
        $orders = $this->getResources(
            $xmlResponse,
            new StringValueObject(Order::class),
            new StringValueObject(self::XML_TAG_ORDER)
        );
        
        return $orders;
    }
    
    /**
     * @param StringValueObject  $productId
     * @param IntegerValueObject $quantity
     * @param BooleanValueObject $replaceStock
     * @param CallBackUrl        $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function updateProductInventory(
        StringValueObject $productId,
        IntegerValueObject $quantity,
        BooleanValueObject $replaceStock,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse = $this->soapClient->updateProductInventory($productId, $quantity, $replaceStock, $callBackUrl);
        
        return $this->checkProductIdsQuantity(
            $productId,
            $quantity,
            $this->getArrayValueObject($xmlResponse)
        );
    }
    
    /**
     * @param StringValueObject $invoiceNum
     * @param StringValueObject $newStatus
     * @param CallBackUrl       $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function updateOrderStatus(
        StringValueObject $invoiceNum,
        StringValueObject $newStatus,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse = $this->soapClient->updateOrderStatus($invoiceNum, $newStatus, $callBackUrl);
        
        return $this->checkInvoiceNumsNewStatus(
            $invoiceNum,
            $newStatus,
            $this->getArrayValueObject($xmlResponse)
        );
    }
    
    /**
     * @param StringValueObject $invoiceNum
     * @param StringValueObject $shipmentID
     * @param StringValueObject $tracking
     * @param \DateTime         $shipmentDate
     * @param CallBackUrl       $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function updateOrderShipment(
        StringValueObject $invoiceNum,
        StringValueObject $shipmentID,
        StringValueObject $tracking,
        \DateTime $shipmentDate,
        CallBackUrl $callBackUrl
    ) {
        $xmlResponse =
            $this->soapClient->updateOrderShipment($invoiceNum, $shipmentID, $tracking, $shipmentDate, $callBackUrl);
        
        return $this->isResultOk($this->getArrayValueObject($xmlResponse));
    }
    
    /**
     * @param Customer    $customer
     * @param array       $customerDataFieldList pass a list of parameter to define which fields should be generated.
     *                                           Use the Customer::EDIT_CUSTOMER_* constants
     * @param CallBackUrl $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function updateCustomer(Customer $customer, array $customerDataFieldList, CallBackUrl $callBackUrl)
    {
        if (count($customerDataFieldList) == 1
            && current($customerDataFieldList) == Customer::EDIT_CUSTOMER_ALT_CONTACTID
        ) {
            $customerDataFieldList[] = Customer::EDIT_CUSTOMER_CONTACTID;
        }
        
        $xmlResponse =
            $this->editCustomer(
                $customer,
                $customerDataFieldList,
                new CustomerAction(CustomerAction::UPDATE),
                $callBackUrl
            );
        
        return $this->isResultOk($this->getArrayValueObject($xmlResponse));
    }
    
    /**
     * @param Customer    $customer
     * @param CallBackUrl $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function insertCustomer(Customer $customer, CallBackUrl $callBackUrl)
    {
        $insertFieldList = $this->getCustomerInsertFieldList($customer);
        
        $generatedCustomerData = $customer->getCustomerData(
            array_unique(
                array_keys(
                    $insertFieldList
                )
            )
        );
        
        $this->insertCustomerCheckRequiredFields($generatedCustomerData);
        
        $xmlResponse = $this->soapClient->editCustomer(
            $this->convertCustomerData($generatedCustomerData),
            new CustomerAction(CustomerAction::INSERT),
            $callBackUrl
        );
        
        $arrayResponse = $this->getArrayValueObject($xmlResponse);
        $isResultOk = $this->isResultOk($arrayResponse);
        
        if ($isResultOk->getBoolValue()
            && $arrayResponse->issetKey(new StringValueObject(self::XML_TAG_CUSTOMER_CONTACT_ID))
        ) {
            $customer->setCustomerID($arrayResponse->getIntegerValueObject(new StringValueObject(self::XML_TAG_CUSTOMER_CONTACT_ID))
                                                   ->getIntValue());
        }
        
        return $isResultOk;
    }
    
    /**
     * @param Customer    $customer
     * @param CallBackUrl $callBackUrl
     *
     * @return BooleanValueObject
     *
     * @throws ResponseInvalidException
     */
    public function deleteCustomer(Customer $customer, CallBackUrl $callBackUrl)
    {
        $xmlResponse =
            $this->editCustomer($customer, [], new CustomerAction(CustomerAction::DELETE), $callBackUrl);
        
        return $this->isResultOk($this->getArrayValueObject($xmlResponse));
    }
    
    /**
     * @param Customer       $customer
     * @param array          $customerDataFieldList pass a list of parameter to define which fields should be updated.
     *                                              Use the Customer::EDIT_CUSTOMER_* constants
     * @param CustomerAction $action
     * @param CallBackUrl    $callBackUrl
     *
     * @return Xml
     *
     * @throws ResponseInvalidException
     */
    private function editCustomer(Customer $customer, array $customerDataFieldList, $action, CallBackUrl $callBackUrl)
    {
        $customerDataFieldList[] = $this->getCustomerIdentifier($customer)->getStringValue();
        
        return $this->soapClient->editCustomer(
            $this->convertCustomerData(
                $customer->getCustomerData(
                    array_unique($customerDataFieldList)
                )
            ),
            $action,
            $callBackUrl
        );
    }
    
    /**
     * @param ResponseHandlerInterface $responseHandler
     */
    public function setResponseHandler(ResponseHandlerInterface $responseHandler)
    {
        $this->responseHandler = $responseHandler;
    }
    
    /**
     * @param Xml               $xml
     * @param StringValueObject $className
     * @param StringValueObject $tagName
     *
     * @return SoapResource[]
     *
     * @throws ResponseInvalidException
     */
    protected function getResources(Xml $xml, StringValueObject $className, StringValueObject $tagName)
    {
        $objectData = $this->responseHandler->convertToArray($xml);
        $this->responseHandler->handleApiErrors($xml, $objectData);
        
        $objectData = $this->extractSpecificXmlTagAsArray($tagName, $objectData);
        
        if ($objectData->issetIndex(new IntegerValueObject(0))) {
            return $this->resourceParser->getResources($className, $objectData);
        }
        
        return [$this->resourceParser->getResource($className, $objectData)];
    }
    
    /**
     * @param Xml $xml
     *
     * @return ArrayValueObject
     */
    protected function getArrayValueObject(Xml $xml)
    {
        $objectData = $this->responseHandler->convertToArray($xml);
        $this->responseHandler->handleApiErrors($xml, $objectData);
        
        return $objectData;
    }
    
    /**
     * @param Xml               $xml
     * @param StringValueObject $className
     *
     * @return SoapResource
     */
    protected function getResource(Xml $xml, StringValueObject $className)
    {
        $objectData = $this->responseHandler->convertToArray($xml);
        $this->responseHandler->handleApiErrors($xml, $objectData);
        
        return $this->resourceParser->getResource($className, $objectData);
    }
    
    /**
     * @param Xml               $xml
     * @param StringValueObject $tagName
     *
     * @return IntegerValueObject
     */
    protected function getIntegerValueObject(Xml $xml, StringValueObject $tagName)
    {
        $objectData = $this->responseHandler->convertToArray($xml);
        $this->responseHandler->handleApiErrors($xml, $objectData);
        
        return new IntegerValueObject((int)$this->extractSpecificXmlTagAsString(
            $tagName,
            $objectData
        )->getStringValue());
    }
    
    /**
     * @param StringValueObject  $productId
     * @param IntegerValueObject $quantity
     * @param ArrayValueObject   $response
     *
     * @return BooleanValueObject
     */
    protected function checkProductIdsQuantity(
        StringValueObject $productId,
        IntegerValueObject $quantity,
        ArrayValueObject $response
    ) {
        return new BooleanValueObject(
            $response->issetKey(new StringValueObject(self::XML_TAG_Product_ID))
            && $response->getStringValueObject(new StringValueObject(self::XML_TAG_Product_ID))->getStringValue()
            === $productId->getStringValue()
            && $response->issetKey(new StringValueObject(self::XML_TAG_NEW_INVENTORY))
            && $response->getIntegerValueObject(new StringValueObject(self::XML_TAG_NEW_INVENTORY))->getIntValue()
            === $quantity->getIntValue()
        );
    }
    
    /**
     * @param StringValueObject $invoiceNum
     * @param StringValueObject $newStatus
     * @param ArrayValueObject  $response
     *
     * @return BooleanValueObject
     */
    protected function checkInvoiceNumsNewStatus(
        StringValueObject $invoiceNum,
        StringValueObject $newStatus,
        ArrayValueObject $response
    ) {
        return new BooleanValueObject($response->issetKey(new StringValueObject(self::XML_TAG_INVOICE_NUM))
            && $response->getStringValueObject(new StringValueObject(self::XML_TAG_INVOICE_NUM))->getStringValue()
            === $invoiceNum->getStringValue()
            && $response->issetKey(new StringValueObject(self::XML_TAG_NEW_STATUS))
            && $response->getStringValueObject(new StringValueObject(self::XML_TAG_NEW_STATUS))->getStringValue()
            === $newStatus->getStringValue());
    }
    
    /**
     * @param ArrayValueObject $response
     *
     * @return BooleanValueObject
     */
    protected function isResultOk(ArrayValueObject $response)
    {
        return new BooleanValueObject($response->issetKey(new StringValueObject(self::XML_TAG_RESULT))
            && $response->getStringValueObject(new StringValueObject(self::XML_TAG_RESULT))->getStringValue()
            == self::XML_TAG_RESULT_OK);
    }
    
    /**
     * @param Customer $customer
     *
     * @return StringValueObject
     */
    protected function getCustomerIdentifier(Customer $customer)
    {
        $altCustomerId = $customer->getUserID();
        
        return new StringValueObject(! empty($altCustomerId) ? Customer::EDIT_CUSTOMER_ALT_CONTACTID
            : Customer::EDIT_CUSTOMER_CONTACTID);
    }
    
    /**
     * @param array $generatedCustomerData
     */
    protected function insertCustomerCheckRequiredFields(array $generatedCustomerData)
    {
        $requiredFields = ['billing_firstname', 'billing_lastname', 'email', 'pass'];
        foreach ($requiredFields as $requiredField) {
            if (! isset($generatedCustomerData[$requiredField])) {
                throw new \InvalidArgumentException(
                    'the field: ' . $requiredField . ' is required when inserting a new customer!'
                );
            }
        }
    }
    
    /**
     * @param array $customerData
     *
     * @return StringValueObject
     */
    protected function convertCustomerData(array $customerData)
    {
        $temporaryCustomerData = [];
        foreach ($customerData as $key => $value) {
            if ($value === null) {
                continue;
            }
            $temporaryCustomerData[] = $key . '===' . $value;
        }
        
        return new StringValueObject(implode('|||', $temporaryCustomerData));
    }
    
    /**
     * @param Customer $customer
     *
     * @return array
     */
    protected function getCustomerInsertFieldList(Customer $customer)
    {
        $insertFieldList = Customer::$editCustomerMapping;
        
        if ($customer->getBillingAddress()) {
            $insertFieldList = array_merge($insertFieldList, Address::$editCustomerMappingBilling);
        }
        
        if ($customer->getShippingAddress()) {
            $insertFieldList = array_merge($insertFieldList, Address::$editCustomerMappingShipping);
        }
        
        return $insertFieldList;
    }
    
    /**
     * @param ClientInterface $soapClient
     */
    public function setSoapClient(ClientInterface $soapClient)
    {
        $this->soapClient = $soapClient;
    }
    
    /**
     * @param StringValueObject $responseXmlTag
     * @param ArrayValueObject  $apiResponse
     *
     * @return ArrayValueObject
     *
     * @throws MalFormedApiResponseException
     */
    protected function extractSpecificXmlTagAsArray(StringValueObject $responseXmlTag, ArrayValueObject $apiResponse)
    {
        $arrResponse = $apiResponse->getValue();
        if (! isset($arrResponse[$responseXmlTag->getStringValue()])) {
            throw new MalFormedApiResponseException('xml tag ' . $responseXmlTag->getStringValue() . ' is missing');
        }
        
        return new ArrayValueObject($arrResponse[$responseXmlTag->getStringValue()]);
    }
    
    /**
     * @param StringValueObject $responseXmlTag
     * @param ArrayValueObject  $apiResponse
     *
     * @return StringValueObject
     *
     * @throws MalFormedApiResponseException
     */
    protected function extractSpecificXmlTagAsString(StringValueObject $responseXmlTag, ArrayValueObject $apiResponse)
    {
        $arrResponse = $apiResponse->getValue();
        if (! isset($arrResponse[$responseXmlTag->getStringValue()])) {
            throw new MalFormedApiResponseException('xml tag ' . $responseXmlTag->getStringValue() . ' is missing');
        }
        
        return new StringValueObject($arrResponse[$responseXmlTag->getStringValue()]);
    }
}
