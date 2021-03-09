<?php

namespace ThreeDCart\Api\Soap\Request;

use ThreeDCart\Api\Soap\Parameter\BatchSize;
use ThreeDCart\Api\Soap\Parameter\CallBackUrl;
use ThreeDCart\Api\Soap\Parameter\CustomerAction;
use ThreeDCart\Api\Soap\Parameter\StartNum;
use ThreeDCart\Api\Soap\Response\Xml;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\DateFormat;
use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class PhpDefaultClient
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class PhpDefaultClient implements ClientInterface
{
    const THREEDCART_GET_PRODUCT_RESULT_FIELD = 'getProductResult';
    const THREEDCART_GET_CUSTOMER_RESULT_FIELD = 'getCustomerResult';
    const THREEDCART_GET_ORDER_STATUS_RESULT_FIELD = 'getOrderStatusResult';
    const THREEDCART_GET_PRODUCT_COUNT_RESULT_FIELD = 'getProductCountResult';
    const THREEDCART_GET_PRODUCT_INVENTORY_RESULT_FIELD = 'getProductInventoryResult';
    const THREEDCART_GET_CUSTOMER_LOGIN_TOKEN_RESULT_FIELD = 'getCustomerLoginTokenResult';
    const THREEDCART_GET_CUSTOMER_COUNT_RESULT_FIELD = 'getCustomerCountResult';
    const THREEDCART_GET_ORDER_COUNT_RESULT_FIELD = 'getOrderCountResult';
    const THREEDCART_GET_ORDER_RESULT_FIELD = 'getOrderResult';
    const THREEDCART_UPDATE_PRODUCT_INVENTORY_RESULT_FIELD = 'updateProductInventoryResult';
    const THREEDCART_UPDATE_ORDER_STATUS_RESULT_FIELD = 'updateOrderStatusResult';
    const THREEDCART_UPDATE_ORDER_SHIPMENT_RESULT_FIELD = 'updateOrderShipmentResult';
    const THREEDCART_EDIT_CUSTOMER_RESULT_FIELD = 'editCustomerResult';
    
    /** @var StringValueObject */
    private $threeDCartApiKey;
    /** @var StringValueObject */
    private $threeDCartStoreUrl;
    /** @var ResponseHandler */
    private $responseHandler;
    /** @var \SoapClient */
    private $soapClient;
    
    /**
     * @param \SoapClient       $soapClient
     * @param ResponseHandler   $responseHandler
     * @param StringValueObject $threeDCartStoreUrl
     * @param StringValueObject $threeDCartApiKey
     */
    public function __construct(
        \SoapClient $soapClient,
        ResponseHandler $responseHandler,
        StringValueObject $threeDCartStoreUrl,
        StringValueObject $threeDCartApiKey
    ) {
        $this->responseHandler = $responseHandler;
        $this->threeDCartStoreUrl = $threeDCartStoreUrl;
        $this->threeDCartApiKey = $threeDCartApiKey;
        $this->soapClient = $soapClient;
    }
    
    public function getProduct(
        BatchSize $batchSize,
        StartNum $startNum,
        StringValueObject $productId,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getProduct([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'batchSize' => $batchSize->getIntValue(),
            'startNum' => $startNum->getIntValue(),
            'productId' => $productId->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse($soapResponse, new StringValueObject(self::THREEDCART_GET_PRODUCT_RESULT_FIELD));
        
        return new Xml(new StringValueObject($soapResponse->getProductResult->any));
    }
    
    /**
     * @param \stdClass         $response
     * @param StringValueObject $field
     *
     * @throws ResponseBodyEmptyException
     */
    public function checkEmptyResponse(\stdClass $response, StringValueObject $field)
    {
        if (empty($response) || empty($response->{$field->getStringValue()}->any)) {
            throw new ResponseBodyEmptyException('response body is empty');
        }
    }
    
    /**
     * @param \SoapClient $soapClient
     */
    public function setSoapClient(\SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
    }
    
    public function getCustomers(
        BatchSize $batchSize,
        StartNum $startNum,
        StringValueObject $customersFilter,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getCustomer([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'batchSize' => $batchSize->getIntValue(),
            'startNum' => $startNum->getIntValue(),
            'customersFilter' => $customersFilter->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse($soapResponse, new StringValueObject(self::THREEDCART_GET_CUSTOMER_RESULT_FIELD));
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_CUSTOMER_RESULT_FIELD}->any));
    }
    
    public function getOrderStatus(StringValueObject $invoiceNum, CallBackUrl $callBackUrl)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getOrderStatus([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'invoiceNum' => $invoiceNum->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse($soapResponse, new StringValueObject(self::THREEDCART_GET_ORDER_RESULT_FIELD));
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_ORDER_RESULT_FIELD}->any));
    }
    
    public function getProductCount(CallBackUrl $callBackUrl)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getProductCount([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_PRODUCT_COUNT_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_PRODUCT_COUNT_RESULT_FIELD}->any));
    }
    
    public function getProductInventory(StringValueObject $productId, CallBackUrl $callBackUrl)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getProductInventory([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'productId' => $productId->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_PRODUCT_INVENTORY_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_PRODUCT_INVENTORY_RESULT_FIELD}->any));
    }
    
    public function getCustomerLoginToken(
        StringValueObject $customerEmail,
        IntegerValueObject $timeToLive,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getCustomerLoginToken([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'customerEmail' => $customerEmail->getStringValue(),
            'timeToLive' => $timeToLive->getIntValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_CUSTOMER_LOGIN_TOKEN_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_CUSTOMER_LOGIN_TOKEN_RESULT_FIELD}->any));
    }
    
    public function getCustomerCount(CallBackUrl $callBackUrl)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getCustomerCount([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_CUSTOMER_COUNT_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_CUSTOMER_COUNT_RESULT_FIELD}->any));
    }
    
    public function editCustomer(
        StringValueObject $customerData,
        CustomerAction $action,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->editCustomer([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'customerData' => $customerData->getStringValue(),
            'action' => $action->getValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_EDIT_CUSTOMER_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_EDIT_CUSTOMER_RESULT_FIELD}->any));
    }
    
    public function getOrderCount(
        BooleanValueObject $startFrom,
        StringValueObject $invoiceNum,
        StringValueObject $status,
        \DateTime $dateFrom = null,
        \DateTime $dateTo = null,
        CallBackUrl $callBackUrl = null
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getOrderCount([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'startFrom' => $startFrom->getBoolValue(),
            'invoiceNum' => $invoiceNum->getStringValue(),
            'status' => $status->getStringValue(),
            'dateFrom' => ! empty($dateFrom) ? $dateFrom->format(DateFormat::THREE_D_CART_API_DATE_FORMAT) : '',
            'dateTo' => ! empty($dateTo) ? $dateTo->format(DateFormat::THREE_D_CART_API_DATE_FORMAT) : '',
            'callBackURL' => ! empty($callBackUrl) ? $callBackUrl->getStringValue() : '',
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_ORDER_COUNT_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_ORDER_COUNT_RESULT_FIELD}->any));
    }
    
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
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->getOrder([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'batchSize' => $batchSize->getIntValue(),
            'startNum' => $startNum->getIntValue(),
            'startFrom' => $startFrom->getBoolValue(),
            'invoiceNum' => $invoiceNum->getStringValue(),
            'status' => $status->getStringValue(),
            'dateFrom' => ! empty($dateFrom) ? $dateFrom->format(DateFormat::THREE_D_CART_API_DATE_FORMAT) : '',
            'dateTo' => ! empty($dateTo) ? $dateTo->format(DateFormat::THREE_D_CART_API_DATE_FORMAT) : '',
            'callBackURL' => ! empty($callBackUrl) ? $callBackUrl->getStringValue() : '',
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_GET_ORDER_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_GET_ORDER_RESULT_FIELD}->any));
    }
    
    public function updateProductInventory(
        StringValueObject $productId,
        IntegerValueObject $quantity,
        BooleanValueObject $replaceStock,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->updateProductInventory([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'productId' => $productId->getStringValue(),
            'quantity' => $quantity->getIntValue(),
            'replaceStock' => $replaceStock->getBoolValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_UPDATE_PRODUCT_INVENTORY_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_UPDATE_PRODUCT_INVENTORY_RESULT_FIELD}->any));
    }
    
    public function updateOrderStatus(
        StringValueObject $invoiceNum,
        StringValueObject $newStatus,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->updateOrderStatus([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'invoiceNum' => $invoiceNum->getStringValue(),
            'newStatus' => $newStatus->getStringValue(),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_UPDATE_ORDER_STATUS_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_UPDATE_ORDER_STATUS_RESULT_FIELD}->any));
    }
    
    public function updateOrderShipment(
        StringValueObject $invoiceNum,
        StringValueObject $shipmentID,
        StringValueObject $tracking,
        \DateTime $shipmentDate,
        CallBackUrl $callBackUrl
    ) {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->updateOrderShipment([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'invoiceNum' => $invoiceNum->getStringValue(),
            'shipmentID' => $shipmentID->getStringValue(),
            'tracking' => $tracking->getStringValue(),
            'shipmentDate' => $shipmentDate->format(DateFormat::THREE_D_CART_API_DATE_FORMAT),
            'callBackURL' => $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse(
            $soapResponse,
            new StringValueObject(self::THREEDCART_UPDATE_ORDER_SHIPMENT_RESULT_FIELD)
        );
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_UPDATE_ORDER_SHIPMENT_RESULT_FIELD}->any));
    }
}
