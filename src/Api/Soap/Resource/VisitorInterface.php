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

/**
 * Interface VisitorInterface
 *
 * @package ThreeDCart\Api\Soap\Resource
 */
interface VisitorInterface
{
    public function visitCustomer(Customer $customer);
    
    public function visitCustomerLoginToken(LoginToken $loginToken);
    
    public function visitCustomerAddress(Address $address);
    
    public function visitCustomerAdditionalFields(AdditionalFields $additionalFields);
    
    public function visitProduct(Product $product);
    
    public function visitProductCategory(Category $category);
    
    public function visitProductEProduct(EProduct $eProduct);
    
    public function visitProductExtraFields(ExtraFields $extraFields);
    
    public function visitProductImages(Images $images);
    
    public function visitProductImage(Image $image);
    
    public function visitProductOption(Option $option);
    
    public function visitProductOptionValue(OptionValue $optionValue);
    
    public function visitProductPriceLevel(PriceLevel $priceLevel);
    
    public function visitProductRelatedProduct(RelatedProduct $relatedProduct);
    
    public function visitProductReward(Reward $reward);
    
    public function visitProductInventory(ProductInventory $productInventory);
    
    public function visitOrder(Order $order);
    
    public function visitOrderComments(Comments $comments);
    
    public function visitOrderAffiliateInformation(AffiliateInformation $affiliateInformation);
    
    public function visitOrderGiftCertificatePurchased(GiftCertificatePurchased $giftCertificatePurchased);
    
    public function visitOrderGiftCertificateUsed(GiftCertificateUsed $giftCertificateUsed);
    
    public function visitOrderItem(Item $item);
    
    public function visitOrderPromotion(Promotion $promotion);
    
    public function visitOrderShipment(Shipment $shipment);
    
    public function visitOrderShippingInformation(ShippingInformation $shippingInformation);
    
    public function visitOrderTransaction(Transaction $transaction);
    
    public function visitOrderStatus(Status $orderStatus);
    
    public function visitOrderCheckoutQuestion(CheckoutQuestion $checkoutQuestion);
}
