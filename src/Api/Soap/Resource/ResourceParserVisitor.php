<?php

namespace ThreeDCart\Api\Soap\Resource;

use ThreeDCart\Api\Soap\Resource\Customer\AdditionalFields;
use ThreeDCart\Api\Soap\Resource\Customer\Address;
use ThreeDCart\Api\Soap\Resource\Customer\Customer;
use ThreeDCart\Api\Soap\Resource\Customer\LoginToken;
use ThreeDCart\Api\Soap\Resource\Order\AffiliateInformation;
use ThreeDCart\Api\Soap\Resource\Order\CheckoutQuestion;
use ThreeDCart\Api\Soap\Resource\Order\Comments;
use ThreeDCart\Api\Soap\Resource\Order\GiftCertificatePurchased;
use ThreeDCart\Api\Soap\Resource\Order\GiftCertificateUsed;
use ThreeDCart\Api\Soap\Resource\Order\Item;
use ThreeDCart\Api\Soap\Resource\Order\Order;
use ThreeDCart\Api\Soap\Resource\Order\Promotion;
use ThreeDCart\Api\Soap\Resource\Order\Shipment;
use ThreeDCart\Api\Soap\Resource\Order\ShippingInformation;
use ThreeDCart\Api\Soap\Resource\Order\Status;
use ThreeDCart\Api\Soap\Resource\Order\Transaction;
use ThreeDCart\Api\Soap\Resource\Product\Category;
use ThreeDCart\Api\Soap\Resource\Product\EProduct;
use ThreeDCart\Api\Soap\Resource\Product\ExtraFields;
use ThreeDCart\Api\Soap\Resource\Product\Image;
use ThreeDCart\Api\Soap\Resource\Product\Images;
use ThreeDCart\Api\Soap\Resource\Product\Option;
use ThreeDCart\Api\Soap\Resource\Product\OptionValue;
use ThreeDCart\Api\Soap\Resource\Product\PriceLevel;
use ThreeDCart\Api\Soap\Resource\Product\Product;
use ThreeDCart\Api\Soap\Resource\Product\ProductInventory;
use ThreeDCart\Api\Soap\Resource\Product\RelatedProduct;
use ThreeDCart\Api\Soap\Resource\Product\Reward;
use ThreeDCart\Primitive\ArrayValueObject;

/**
 * Class ResourceParserVisitor
 *
 * @package ThreeDCart\Api\Soap\Resource
 */
class ResourceParserVisitor implements VisitorInterface
{
    /** @var ArrayValueObject */
    private $data;
    
    /**
     * @param ArrayValueObject $data
     */
    public function __construct(ArrayValueObject $data)
    {
        $this->data = $data->getValue();
    }
    
    /**
     * @param SoapResource $resource
     * @param array        $data
     *
     * @throws ParseException
     */
    private function assignSimpleProperties(SoapResource $resource, array $data)
    {
        foreach ($data as $key => $value) {
            if (method_exists($resource, 'get' . $key) && call_user_func([$resource, 'get' . $key]) !== null) {
                continue;
            }
            if (! method_exists($resource, 'set' . $key)) {
                throw new ParseException('unable to create resource. setter set' . $key . '() don\'t exist');
            }
            $resource->{'set' . $key}($value);
        }
    }
    
    /**
     * @param array       $data
     * @param string      $objectIndex
     * @param string|null $objectIndexChild
     *
     * @return array
     */
    private function reduceHierarchy(array $data, $objectIndex, $objectIndexChild = null)
    {
        if (! isset($data[$objectIndex])
            || ! is_array($data[$objectIndex])
        ) {
            return [];
        }
        $data = $data[$objectIndex];
        
        if ($objectIndexChild !== null) {
            if (! isset($data[$objectIndexChild])
                || ! is_array($data[$objectIndexChild])
            ) {
                return [];
            }
            $data = $data[$objectIndexChild];
        }
        
        return $data;
    }
    
    /**
     * Will create an array of objects of type $className from an passed array of objectData by using
     *
     * @param string      $className
     * @param array       $data
     * @param string      $objectIndex
     * @param string|null $objectIndexChild
     *
     * @return SoapResource[]
     */
    private function createObjects($className, array $data, $objectIndex, $objectIndexChild = null)
    {
        if (! $data = $this->reduceHierarchy($data, $objectIndex, $objectIndexChild)) {
            return $data;
        }
        
        if (! isset($data[0]) && ! empty($data)) {
            // We need a special logic in case the API returns jut one element instead of an array
            return [$this->createObject($className, $data)];
        }
        
        $objects = [];
        foreach ($data as $objectData) {
            if ($object = $this->createObject($className, $objectData)) {
                $objects[] = $object;
            }
        }
        
        return $objects;
    }
    
    /**
     * @param string $className
     * @param array  $objectData
     * @param string $objectIndex
     *
     * @return SoapResource
     */
    private function createObject($className, array $objectData, $objectIndex = null)
    {
        /** @var SoapResource $resource */
        $resource = new $className();
        
        if ($objectIndex !== null) {
            if (! isset($objectData[$objectIndex])) {
                return $resource;
            }
            $objectData = $objectData[$objectIndex];
        }
        
        $visitor = new ResourceParserVisitor(new ArrayValueObject($objectData));
        $resource->accept($visitor);
        
        return $resource;
    }
    
    /**
     * @param Product $product
     */
    public function visitProduct(Product $product)
    {
        /** @var Category[] $categories */
        $categories = $this->createObjects(Category::class, $this->data, 'Categories', 'Category');
        $product->setCategories($categories);
        
        /** @var RelatedProduct[] $relatedProducts */
        $relatedProducts = $this->createObjects(RelatedProduct::class, $this->data, 'RelatedProducts', 'Product');
        $product->setRelatedProducts($relatedProducts);
        
        /** @var Option[] $options */
        $options = $this->createObjects(Option::class, $this->data, 'Options', 'Option');
        $product->setOptions($options);
        
        /** @var ExtraFields $extraFields */
        $extraFields = $this->createObject(ExtraFields::class, $this->data, 'ExtraFields');
        $product->setExtraFields($extraFields);
        
        /** @var PriceLevel $priceLevel */
        $priceLevel = $this->createObject(PriceLevel::class, $this->data, 'PriceLevel');
        $product->setPriceLevel($priceLevel);
        
        /** @var EProduct $eProduct */
        $eProduct = $this->createObject(EProduct::class, $this->data, 'eProduct');
        $product->setEProduct($eProduct);
        
        /** @var Reward $reward */
        $reward = $this->createObject(Reward::class, $this->data, 'Rewards');
        $product->setRewards($reward);
        
        /** @var Images $images */
        $images = $this->createObject(Images::class, $this->data, 'Images');
        $product->setImages($images);
        
        $this->assignSimpleProperties($product, $this->data);
    }
    
    /**
     * @param Category $category
     */
    public function visitProductCategory(Category $category)
    {
        $this->assignSimpleProperties($category, $this->data);
    }
    
    public function visitProductEProduct(EProduct $eProduct)
    {
        $this->assignSimpleProperties($eProduct, $this->data);
    }
    
    public function visitProductExtraFields(ExtraFields $extraFields)
    {
        $this->assignSimpleProperties($extraFields, $this->data);
    }
    
    public function visitProductImages(Images $images)
    {
        /** @var Images[] $image */
        $image = $this->createObjects(Image::class, $this->data, 'Image');
        $images->setImages($image);
        
        if (isset($this->data['Image'])) {
            unset($this->data['Image']);
        }
        $this->assignSimpleProperties($images, $this->data);
    }
    
    public function visitProductImage(Image $image)
    {
        $this->assignSimpleProperties($image, $this->data);
    }
    
    public function visitProductOption(Option $option)
    {
        /** @var OptionValue[] $values */
        $values = $this->createObjects(OptionValue::class, $this->data, 'Values', 'Value');
        $option->setValues($values);
        
        $this->assignSimpleProperties($option, $this->data);
    }
    
    public function visitProductOptionValue(OptionValue $optionValue)
    {
        $this->assignSimpleProperties($optionValue, $this->data);
    }
    
    public function visitProductPriceLevel(PriceLevel $priceLevel)
    {
        $this->assignSimpleProperties($priceLevel, $this->data);
    }
    
    public function visitProductRelatedProduct(RelatedProduct $relatedProduct)
    {
        $this->assignSimpleProperties($relatedProduct, $this->data);
    }
    
    public function visitProductReward(Reward $reward)
    {
        $this->assignSimpleProperties($reward, $this->data);
    }
    
    public function visitCustomer(Customer $customer)
    {
        /** @var AdditionalFields $additionalFields */
        $additionalFields = $this->createObject(AdditionalFields::class, $this->data, 'AditionalFields');
        $customer->setAditionalFields($additionalFields);
        
        /** @var Address $billingAddress */
        $billingAddress = $this->createObject(Address::class, $this->data, 'BillingAddress');
        $customer->setBillingAddress($billingAddress);
        
        /** @var Address $shippingAddress */
        $shippingAddress = $this->createObject(Address::class, $this->data, 'ShippingAddress');
        $customer->setShippingAddress($shippingAddress);
        
        $this->assignSimpleProperties($customer, $this->data);
    }
    
    public function visitCustomerAddress(Address $address)
    {
        $this->assignSimpleProperties($address, $this->data);
    }
    
    public function visitCustomerAdditionalFields(AdditionalFields $additionalFields)
    {
        $this->assignSimpleProperties($additionalFields, $this->data);
    }
    
    public function visitOrderStatus(Status $orderStatus)
    {
        $this->assignSimpleProperties($orderStatus, $this->data);
    }
    
    public function visitProductInventory(ProductInventory $productInventory)
    {
        $this->assignSimpleProperties($productInventory, $this->data);
    }
    
    public function visitCustomerLoginToken(LoginToken $loginToken)
    {
        $this->assignSimpleProperties($loginToken, $this->data);
    }
    
    public function visitOrder(Order $order)
    {
        /** @var Promotion[] $promotions */
        $promotions = $this->createObjects(Promotion::class, $this->data, 'Promotions', 'Promotion');
        $order->setPromotions($promotions);
        
        /** @var Address $billingAddress */
        $billingAddress = $this->createObject(Address::class, $this->data, 'BillingAddress');
        $order->setBillingAddress($billingAddress);
        
        /** @var Comments $comments */
        $comments = $this->createObject(Comments::class, $this->data, 'Comments');
        $order->setComments($comments);
        
        /** @var Transaction $transactions */
        $transactions = $this->createObject(Transaction::class, $this->data, 'Transaction');
        $order->setTransaction($transactions);
        
        /** @var CheckoutQuestion[] $checkoutQuestions */
        $checkoutQuestions =
            $this->createObjects(CheckoutQuestion::class, $this->data, 'CheckoutQuestions', 'Question');
        $order->setCheckoutQuestions($checkoutQuestions);
        
        /** @var AffiliateInformation $affiliateInformation */
        $affiliateInformation = $this->createObject(AffiliateInformation::class, $this->data, 'AffiliateInformation');
        $order->setAffiliateInformation($affiliateInformation);
        
        /** @var ShippingInformation $shippingInformation */
        $shippingInformation = $this->createObject(ShippingInformation::class, $this->data, 'ShippingInformation');
        $order->setShippingInformation($shippingInformation);
        
        
        /** @var GiftCertificatePurchased[] $giftCertificatePurchased */
        $giftCertificatePurchased = $this->createObjects(
            GiftCertificatePurchased::class,
            $this->data,
            'GiftCertificatePurchased',
            'Gift'
        );
        $order->setGiftCertificatePurchased(isset($giftCertificatePurchased[0]) ? $giftCertificatePurchased[0] : null);
        
        /** @var GiftCertificateUsed[] $giftCertificateUsed */
        $giftCertificateUsed = $this->createObjects(
            GiftCertificateUsed::class,
            $this->data,
            'GiftCertificateUsed',
            'Gift'
        );
        $order->setGiftCertificateUsed(isset($giftCertificateUsed[0]) ? $giftCertificateUsed[0] : null);
        
        $this->assignSimpleProperties($order, $this->data);
    }
    
    public function visitOrderComments(Comments $comments)
    {
        $this->assignSimpleProperties($comments, $this->data);
    }
    
    public function visitOrderAffiliateInformation(AffiliateInformation $affiliateInformation)
    {
        $this->assignSimpleProperties($affiliateInformation, $this->data);
    }
    
    public function visitOrderGiftCertificatePurchased(GiftCertificatePurchased $giftCertificatePurchased)
    {
        $this->assignSimpleProperties($giftCertificatePurchased, $this->data);
    }
    
    public function visitOrderGiftCertificateUsed(GiftCertificateUsed $giftCertificateUsed)
    {
        $this->assignSimpleProperties($giftCertificateUsed, $this->data);
    }
    
    public function visitOrderItem(Item $item)
    {
        $this->assignSimpleProperties($item, $this->data);
    }
    
    public function visitOrderPromotion(Promotion $promotion)
    {
        $this->assignSimpleProperties($promotion, $this->data);
    }
    
    public function visitOrderShipment(Shipment $shipment)
    {
        $this->assignSimpleProperties($shipment, $this->data);
    }
    
    public function visitOrderShippingInformation(ShippingInformation $shippingInformation)
    {
        /** @var Shipment $shipment */
        $shipment = $this->createObject(Shipment::class, $this->data, 'Shipment');
        $shippingInformation->setShipment($shipment);
        
        /** @var Item[] $orderItems */
        $orderItems = $this->createObjects(Item::class, $this->data, 'OrderItems', 'Item');
        $shippingInformation->setOrderItems($orderItems);
    }
    
    public function visitOrderTransaction(Transaction $transaction)
    {
        $this->assignSimpleProperties($transaction, $this->data);
    }
    
    public function visitOrderCheckoutQuestion(CheckoutQuestion $checkoutQuestion)
    {
        $this->assignSimpleProperties($checkoutQuestion, $this->data);
    }
}
