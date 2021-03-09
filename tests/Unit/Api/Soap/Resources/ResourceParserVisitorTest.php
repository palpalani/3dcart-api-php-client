<?php

namespace tests\Unit\Api\Soap\Resources;

use tests\Unit\ThreeDCartTestCase;
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
use ThreeDCart\Api\Soap\Resource\ResourceParserVisitor;
use ThreeDCart\Primitive\ArrayValueObject;

/**
 * Class ResourceParserVisitorTest
 *
 * @package tests\Unit\Api\Soap\Resources
 */
class ResourceParserVisitorTest extends ThreeDCartTestCase
{
    public function testVisitorCustomer()
    {
        $customer = new Customer();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('Customer', 'Customer.json');
        $resourceParserVisitor->visitCustomer($customer);
        
        $this->assertInstanceOf(Address::class, $customer->getBillingAddress());
        $this->assertInstanceOf(Address::class, $customer->getShippingAddress());
        $this->assertInstanceOf(AdditionalFields::class, $customer->getAditionalFields());
        
        $this->assertEquals('1', $customer->getCustomerID());
        $this->assertEquals('Administrator', $customer->getUserID());
        $this->assertEquals('Sample Customer from 3dcart', $customer->getComments());
        $this->assertEquals('5/6/2014', $customer->getLastLoginDate());
        $this->assertEquals(null, $customer->getWebSite());
        $this->assertEquals(null, $customer->getDiscountGroup());
        $this->assertEquals(null, $customer->getAccountNumber());
        $this->assertEquals('1', $customer->isMailList());
        $this->assertEquals('0', $customer->isCustomerType());
        $this->assertEquals('6/22/2009', $customer->getLastUpdate());
        $this->assertEquals('1', $customer->isCustEnabled());
        $this->assertEquals(null, $customer->getAdditionalField4());
    }
    
    public function testVisitorCustomerLoginToken()
    {
        $loginToken = new LoginToken();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('CustomerLoginToken', 'LoginToken.json');
        $resourceParserVisitor->visitCustomerLoginToken($loginToken);
        
        $this->assertEquals(
            'fhWZ2A1EX49XV9Z7dwqUbZsMn/uDrQeEgKZ4ubaHMdwcp2IyRISw789d0beK7+f3',
            $loginToken->getToken()
        );
    }
    
    public function testVisitorAddress()
    {
        $address = new Address();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('CustomerAddress', 'Address.json');
        $resourceParserVisitor->visitCustomerAddress($address);
        
        $this->assertEquals('John', $address->getFirstName());
        $this->assertEquals('Doe', $address->getLastName());
        $this->assertEquals('123 Street', $address->getAddress());
        $this->assertEquals(null, $address->getAddress2());
        $this->assertEquals('Coral Springs', $address->getCity());
        $this->assertEquals('FL', $address->getStateCode());
        $this->assertEquals('33065', $address->getZipCode());
        $this->assertEquals('US', $address->getCountryCode());
        $this->assertEquals('3DCart', $address->getCompany());
        $this->assertEquals('800-828-6650', $address->getPhone());
        $this->assertEquals('test@3dcart.com', $address->getEmail());
    }
    
    public function testVisitorAdditionalFields()
    {
        $additionalFields = new AdditionalFields();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('CustomerAdditionalFields', 'AdditionalFields.json');
        $resourceParserVisitor->visitCustomerAdditionalFields($additionalFields);
        
        $this->assertEquals('some information', $additionalFields->getAdditionalField1());
        $this->assertEquals('another information', $additionalFields->getAdditionalField2());
        $this->assertEquals(null, $additionalFields->getAdditionalField3());
    }
    
    public function testVisitorProduct()
    {
        $product = new Product();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('Product', 'Product.json');
        $resourceParserVisitor->visitProduct($product);
        
        $this->assertEquals(true, is_array($product->getCategories()));
        $this->assertEquals(false, empty($product->getCategories()));
        foreach ($product->getCategories() as $category) {
            $this->assertInstanceOf(Category::class, $category);
        }
        
        $this->assertEquals(true, is_array($product->getRelatedProducts()));
        $this->assertEquals(false, empty($product->getRelatedProducts()));
        foreach ($product->getRelatedProducts() as $relatedProduct) {
            $this->assertInstanceOf(RelatedProduct::class, $relatedProduct);
        }
        
        $this->assertEquals(true, is_array($product->getOptions()));
        $this->assertEquals(false, empty($product->getOptions()));
        foreach ($product->getOptions() as $option) {
            $this->assertInstanceOf(Option::class, $option);
        }
        
        $this->assertInstanceOf(ExtraFields::class, $product->getExtraFields());
        $this->assertInstanceOf(EProduct::class, $product->getEProduct());
        $this->assertInstanceOf(Reward::class, $product->getRewards());
        $this->assertInstanceOf(Images::class, $product->getImages());
        
        $this->assertEquals(true, is_array($product->getImages()->getImages()));
        $this->assertEquals(false, empty($product->getImages()->getImages()));
        foreach ($product->getImages()->getImages() as $image) {
            $this->assertInstanceOf(Image::class, $image);
        }
        
        $this->assertEquals('1', $product->getCatalogID());
        $this->assertEquals('Custom Cap', $product->getProductID());
        $this->assertEquals('Custom Cap', $product->getProductName());
        $this->assertEquals('MPNNUMBER', $product->getMfgid());
        $this->assertEquals('MyManufacturer', $product->getManufacturer());
        $this->assertEquals('Test', $product->getDistributor());
        $this->assertEquals('0.00', $product->getCost());
        $this->assertEquals('17.99', $product->getPrice());
        $this->assertEquals('0', $product->getRetailPrice());
        $this->assertEquals('19.99', $product->getSalePrice());
        $this->assertEquals('1', $product->isOnSale());
        $this->assertEquals('0', $product->getStock());
        $this->assertEquals('0', $product->getStockAlert());
        $this->assertEquals('2.00', $product->getWeight());
        $this->assertEquals('44.00', $product->getWidth());
        $this->assertEquals('33.00', $product->getHeight());
        $this->assertEquals('55.00', $product->getDepth());
        $this->assertEquals('1', $product->getMinimumOrder());
        $this->assertEquals('0', $product->getMaximumOrder());
        $this->assertEquals('6/22/2009', $product->getDateCreated());
        $this->assertEquals('Sample Product', $product->getDescription());
        $this->assertEquals(
            '<div><strong><span style="COLOR: #ff0000">SAMPLE PRODUCT </span></strong></div><div>&nbsp;</div><div>Our adjustable, 100% brushed cotton Cap is unstructured and an ideal way to beat the heat.</div>    ',
            $product->getExtendedDescription()
        );
        $this->assertEquals('My;Key;words', $product->getKeywords());
        $this->assertEquals('0.00', $product->getShipCost());
        $this->assertEquals('Title Of MetaTags', $product->getTitle());
        $this->assertEquals(
            '<META NAME="DESCRIPTION" CONTENT="gffghnhg"><META NAME="ABSTRACT" CONTENT="mbjmhj"><META NAME="KEYWORDS" CONTENT="bmvghjhjm">',
            $product->getMetaTags()
        );
        $this->assertEquals('DIsplayTesxt', $product->getDisplayText());
        $this->assertEquals('1', $product->isHomeSpecial());
        $this->assertEquals('0', $product->isCategorySpecial());
        $this->assertEquals('0', $product->isHide());
        $this->assertEquals('1', $product->isFreeShipping());
        $this->assertEquals('0', $product->isNonTax());
        $this->assertEquals('0', $product->isNotForsale());
        $this->assertEquals('0', $product->isGiftCertificate());
        $this->assertEquals('Administrator', $product->getUserId());
        $this->assertEquals('10/16/2016 9:50:30 AM', $product->getLastUpdate());
        $this->assertEquals(null, $product->getWarehouseLocation());
        $this->assertEquals(null, $product->getWarehouseBin());
        $this->assertEquals(null, $product->getWarehouseAisle());
        $this->assertEquals(null, $product->getWarehouseCustom());
        $this->assertEquals('0', $product->isUseCatoptions());
        $this->assertEquals(null, $product->getQuantityOptions());
        $this->assertEquals('0', $product->getMinOrder());
        $this->assertEquals('-1', $product->getListingDisplayType());
        $this->assertEquals('-1', $product->getShowOutStock());
        $this->assertEquals('0', $product->getPricingGroupOpt());
        $this->assertEquals('0', $product->getQuantityDiscountOpt());
        $this->assertEquals('-1', $product->getLoginLevel());
        $this->assertEquals(null, $product->getRedirectTo());
        $this->assertEquals(null, $product->getAccessGroup());
        $this->assertEquals('1', $product->isSelfShip());
        $this->assertEquals('MyT', $product->getTaxCode());
        $this->assertEquals('0', $product->isNonSearchable());
        $this->assertEquals('InStock message', $product->getInstockMessage());
        $this->assertEquals('Out Stock Message', $product->getOutOfStockMessage());
        $this->assertEquals('Back order Message', $product->getBackOrderMessage());
        $this->assertEquals('MyCustomFileName', $product->getFileName());
        $this->assertEquals('3', $product->getReviewAverage());
        $this->assertEquals('1', $product->getReviewCount());
    }
    
    public function testVisitorProductCategory()
    {
        $category = new Category();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductCategory', 'Category.json');
        $resourceParserVisitor->visitProductCategory($category);
        
        $this->assertEquals('4', $category->getCategoryID());
        $this->assertEquals('Apparel', $category->getCategoryName());
    }
    
    public function testVisitorProductEProduct()
    {
        $eProduct = new EProduct();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductEProduct', 'EProduct.json');
        $resourceParserVisitor->visitProductEProduct($eProduct);
        
        $this->assertEquals(null, $eProduct->getEProductPassword());
        $this->assertEquals('0', $eProduct->getEProductRandom());
        $this->assertEquals('0', $eProduct->getEProductExpire());
        $this->assertEquals(null, $eProduct->getEProductPath());
        $this->assertEquals('0', $eProduct->isEProductSerial());
        $this->assertEquals(null, $eProduct->getEProductInstructions());
        $this->assertEquals('0', $eProduct->isEProductReuseSerial());
    }
    
    public function testVisitorProductExtraFields()
    {
        $extraFields = new ExtraFields();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductExtraField', 'ExtraField.json');
        $resourceParserVisitor->visitProductExtraFields($extraFields);
        
        $this->assertEquals('123456789', $extraFields->getExtraField1());
        $this->assertEquals('more custom 2', $extraFields->getExtraField2());
        $this->assertEquals('and one more 3', $extraFields->getExtraField3());
        $this->assertEquals(null, $extraFields->getExtraField4());
        $this->assertEquals(null, $extraFields->getExtraField5());
        $this->assertEquals('Extra Field 6    ', $extraFields->getExtraField6());
        $this->assertEquals('xtr4 f13ld 7    ', $extraFields->getExtraField7());
        $this->assertEquals(null, $extraFields->getExtraField8());
        $this->assertEquals(null, $extraFields->getExtraField9());
        $this->assertEquals(null, $extraFields->getExtraField10());
        $this->assertEquals(null, $extraFields->getExtraField11());
        $this->assertEquals(null, $extraFields->getExtraField12());
        $this->assertEquals('extreFIeld13', $extraFields->getExtraField13());
    }
    
    public function testVisitorProductImage()
    {
        $image = new Image();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductImage', 'Image.json');
        $resourceParserVisitor->visitProductImage($image);
        
        $this->assertEquals(null, $image->getCaption());
        $this->assertEquals('assets/images/default/cap.jpg', $image->getUrl());
    }
    
    public function testVisitorProductImages()
    {
        $images = new Images();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductImages', 'Images.json');
        $resourceParserVisitor->visitProductImages($images);
        
        $this->assertEquals(true, is_array($images->getImages()));
        $this->assertEquals(false, empty($images->getImages()));
        foreach ($images->getImages() as $image) {
            $this->assertInstanceOf(Image::class, $image);
        }
        
        $this->assertEquals('assets/images/default/cap_thumbnail.jpg', $images->getThumbnail());
    }
    
    public function testVisitorProductOption()
    {
        $option = new Option();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductOption', 'Option.json');
        $resourceParserVisitor->visitProductOption($option);
        
        $this->assertEquals("2", $option->getId());
        $this->assertEquals("Color", $option->getOptionType());
        
        $this->assertEquals(true, is_array($option->getValues()));
        $this->assertEquals(false, empty($option->getValues()));
        foreach ($option->getValues() as $value) {
            $this->assertInstanceOf(OptionValue::class, $value);
        }
    }
    
    public function testVisitorProductOptionValue()
    {
        $optionValue = new OptionValue();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductOptionValue', 'OptionValue.json');
        $resourceParserVisitor->visitProductOptionValue($optionValue);
        
        $this->assertEquals("4", $optionValue->getID());
        $this->assertEquals("Red", $optionValue->getName());
        $this->assertEquals(null, $optionValue->getOptionPartNumber());
        $this->assertEquals("10.00", $optionValue->getOptionPrice());
    }
    
    public function testVisitorProductPriceLevel()
    {
        $priceLevel = new PriceLevel();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductPriceLevel', 'PriceLevel.json');
        $resourceParserVisitor->visitProductPriceLevel($priceLevel);
        
        $this->assertEquals("17.99", $priceLevel->getPrice_1());
        $this->assertEquals("16.99", $priceLevel->getPrice_2());
        $this->assertEquals("0", $priceLevel->getPrice_3());
        $this->assertEquals("0", $priceLevel->getPrice_4());
        $this->assertEquals("0", $priceLevel->getPrice_5());
        $this->assertEquals("0", $priceLevel->getPrice_6());
        $this->assertEquals("0", $priceLevel->getPrice_7());
        $this->assertEquals("0", $priceLevel->getPrice_8());
        $this->assertEquals("0", $priceLevel->getPrice_9());
        $this->assertEquals("14.99", $priceLevel->getPrice_10());
    }
    
    public function testVisitorProductRelatedProduct()
    {
        $relatedProduct = new RelatedProduct();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('ProductRelatedProduct', 'RelatedProduct.json');
        $resourceParserVisitor->visitProductRelatedProduct($relatedProduct);
        
        $this->assertEquals("1002", $relatedProduct->getProductID());
        $this->assertEquals("Custom Cap 2", $relatedProduct->getProductName());
    }
    
    public function testVisitorProductReward()
    {
        $reward = new Reward();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductReward', 'Reward.json');
        $resourceParserVisitor->visitProductReward($reward);
        
        $this->assertEquals('123', $reward->getRewardPoints());
        $this->assertEquals('321', $reward->getRewardRedeem());
        $this->assertEquals('0', $reward->isRewardDisable());
    }
    
    public function testVisitorProductInventory()
    {
        $productInventory = new ProductInventory();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('ProductInventory', 'Inventory.json');
        $resourceParserVisitor->visitProductInventory($productInventory);
        
        $this->assertEquals('Custom Cap', $productInventory->getProductID());
        $this->assertEquals('0', $productInventory->getInventory());
    }
    
    public function testVisitorOrderAffiliateInformation()
    {
        $affiliateInformation = new AffiliateInformation();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderAffiliateInformation', 'AffiliateInformation.json');
        $resourceParserVisitor->visitOrderAffiliateInformation($affiliateInformation);
        
        $this->assertEquals('0', $affiliateInformation->getAffiliateID());
        $this->assertEquals('0', $affiliateInformation->getAffiliateCommission());
        $this->assertEquals(null, $affiliateInformation->isAffiliateApproved());
        $this->assertEquals(null, $affiliateInformation->isAffiliateApproved());
    }
    
    public function testVisitorOrderComments()
    {
        $comments = new Comments();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('OrderComments', 'Comments.json');
        $resourceParserVisitor->visitOrderComments($comments);
        
        $this->assertEquals('Test comment 1', $comments->getOrderComment());
        $this->assertEquals('Test comment 2', $comments->getOrderInternalComment());
        $this->assertEquals('Test comment 3', $comments->getOrderExternalComment());
    }
    
    public function testVisitorOrderGiftCertificatePurchased()
    {
        $giftCertificatePurchased = new GiftCertificatePurchased();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderGiftCertificatePurchased', 'GiftCertificatePurchased.json');
        $resourceParserVisitor->visitOrderGiftCertificatePurchased($giftCertificatePurchased);
        
        $this->assertEquals('GC0518136', $giftCertificatePurchased->getCode());
        $this->assertEquals('1350.99', $giftCertificatePurchased->getAmount());
        $this->assertEquals('You', $giftCertificatePurchased->getToName());
        $this->assertEquals('test@3dcart.com', $giftCertificatePurchased->getToEmail());
        $this->assertEquals('This is a gift message', $giftCertificatePurchased->getToMessage());
        $this->assertEquals('Me', $giftCertificatePurchased->getFromName());
    }
    
    public function testVisitorOrderGiftCertificateUsed()
    {
        $giftCertificateUsed = new GiftCertificateUsed();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderGiftCertificateUsed', 'GiftCertificateUsed.json');
        $resourceParserVisitor->visitOrderGiftCertificateUsed($giftCertificateUsed);
        
        $this->assertEquals('gc0518136', $giftCertificateUsed->getCode());
        $this->assertEquals('44.03', $giftCertificateUsed->getAmount());
    }
    
    public function testVisitorOrderItem()
    {
        $item = new Item();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderItem', 'Item.json');
        $resourceParserVisitor->visitOrderItem($item);
        
        $this->assertEquals('0', $item->getShipmentID());
        $this->assertEquals(null, $item->getProductID());
        $this->assertEquals(null, $item->getProductName());
        $this->assertEquals('1', $item->getQuantity());
        $this->assertEquals('1.00', $item->getUnitPrice());
        $this->assertEquals('0.00', $item->getUnitCost());
        $this->assertEquals('0.00', $item->getOptionPrice());
        $this->assertEquals('3.00', $item->getWeight());
        $this->assertEquals(null, $item->getDimension());
        $this->assertEquals('0', $item->getWarehouseID());
        $this->assertEquals('6/22/2009 12:05:07 PM', $item->getDateAdded());
        $this->assertEquals('Tote-Bag_p_3.html', $item->getPageAdded());
        $this->assertEquals('Tangible', $item->getProdType());
        $this->assertEquals('0', $item->isTaxable());
        $this->assertEquals('1.00', $item->getItemPrice());
        $this->assertEquals('1.00', $item->getTotal());
        $this->assertEquals(null, $item->getWarehouseLocation());
        $this->assertEquals(null, $item->getWarehouseBin());
        $this->assertEquals(null, $item->getWarehouseAisle());
        $this->assertEquals(null, $item->getWarehouseCustom());
    }
    
    public function testVisitorOrder()
    {
        $order = new Order();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('Order', 'Order.json');
        $resourceParserVisitor->visitOrder($order);
        
        $this->assertInstanceOf(Address::class, $order->getBillingAddress());
        $this->assertInstanceOf(Comments::class, $order->getComments());
        $this->assertInstanceOf(Transaction::class, $order->getTransaction());
        $this->assertInstanceOf(GiftCertificatePurchased::class, $order->getGiftCertificatePurchased());
        $this->assertInstanceOf(GiftCertificateUsed::class, $order->getGiftCertificateUsed());
        $this->assertInstanceOf(AffiliateInformation::class, $order->getAffiliateInformation());
        $this->assertInstanceOf(ShippingInformation::class, $order->getShippingInformation());
        
        $this->assertEquals(true, is_array($order->getPromotions()));
        foreach ($order->getPromotions() as $promotion) {
            $this->assertInstanceOf(Promotion::class, $promotion);
        }
        
        $this->assertEquals(true, is_array($order->getCheckoutQuestions()));
        foreach ($order->getCheckoutQuestions() as $checkoutQuestion) {
            $this->assertInstanceOf(CheckoutQuestion::class, $checkoutQuestion);
        }
        
        $this->assertEquals('1', $order->getOrderID());
        $this->assertEquals('AB-1000', $order->getInvoiceNumber());
        $this->assertEquals('1', $order->getCustomerID());
        $this->assertEquals('6/22/2009', $order->getDate());
        $this->assertEquals('1', $order->getTotal());
        $this->assertEquals('0.00', $order->getTax());
        $this->assertEquals('0.00', $order->getTax2());
        $this->assertEquals('0.00', $order->getTax3());
        $this->assertEquals('0', $order->getShipping());
        $this->assertEquals('Online Credit Card', $order->getPaymentMethod());
        $this->assertEquals(null, $order->getCardType());
        $this->assertEquals('12:44:37 PM', $order->getTime());
        $this->assertEquals('0.00', $order->getDiscount());
        $this->assertEquals('New', $order->getOrderStatus());
        $this->assertEquals('http://www.google.com', $order->getReferer());
        $this->assertEquals('Me', $order->getSalesPerson());
        $this->assertEquals('203.0.113.195', $order->getIP());
        $this->assertEquals('6/22/2009 10:23:09 AM', $order->getDateStarted());
        $this->assertEquals('API', $order->getUserID());
        $this->assertEquals('6/22/2009', $order->getLastUpdate());
        $this->assertEquals('1.00', $order->getWeight());
    }
    
    public function testVisitorOrderPromotion()
    {
        $promotion = new Promotion();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('OrderPromotion', 'Promotion.json');
        $resourceParserVisitor->visitOrderPromotion($promotion);
        
        $this->assertEquals('1% Shop renegrade Promo', $promotion->getCode());
        $this->assertEquals('0.30', $promotion->getAmount());
    }
    
    public function testVisitorOrderShipment()
    {
        $shipment = new Shipment();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderShipment', 'Shipment.json');
        $resourceParserVisitor->visitOrderShipment($shipment);
        
        $this->assertEquals('0', $shipment->getShipmentID());
        $this->assertEquals(null, $shipment->getShipmentDate());
        $this->assertEquals('0', $shipment->getShipping());
        $this->assertEquals(null, $shipment->getMethod());
        $this->assertEquals('Test', $shipment->getFirstName());
        $this->assertEquals('Test', $shipment->getLastName());
        $this->assertEquals(null, $shipment->getCompany());
        $this->assertEquals('123 Street', $shipment->getAddress());
        $this->assertEquals(null, $shipment->getAddress2());
        $this->assertEquals('Coral Springs', $shipment->getCity());
        $this->assertEquals('33065', $shipment->getZipCode());
        $this->assertEquals('FL', $shipment->getStateCode());
        $this->assertEquals('US', $shipment->getCountryCode());
        $this->assertEquals('800-828-6650', $shipment->getPhone());
        $this->assertEquals('1.00', $shipment->getWeight());
        $this->assertEquals('New', $shipment->getStatus());
        $this->assertEquals(null, $shipment->getInternalComment());
        $this->assertEquals(null, $shipment->getTrackingCode());
    }
    
    public function testVisitorOrderShippingInformation()
    {
        $shippingInformation = new ShippingInformation();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderShippingInformation', 'ShippingInformation.json');
        $resourceParserVisitor->visitOrderShippingInformation($shippingInformation);
        
        $this->assertInstanceOf(Shipment::class, $shippingInformation->getShipment());
        $this->assertEquals(true, is_array($shippingInformation->getOrderItems()));
        
        foreach ($shippingInformation->getOrderItems() as $item) {
            $this->assertInstanceOf(Item::class, $item);
        }
    }
    
    public function testVisitorOrderStatus()
    {
        $orderStatus = new Status();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('OrderStatus', 'OrderStatus.json');
        $resourceParserVisitor->visitOrderStatus($orderStatus);
        
        $this->assertEquals('1', $orderStatus->getId());
        $this->assertEquals('AB-1347', $orderStatus->getInvoiceNum());
        $this->assertEquals('New', $orderStatus->getStatusText());
    }
    
    public function testVisitorOrderTransaction()
    {
        $transaction = new Transaction();
        $resourceParserVisitor = $this->instantiateResourceParserVisitor('OrderTransaction', 'Transaction.json');
        $resourceParserVisitor->visitOrderTransaction($transaction);
        
        $this->assertEquals('123', $transaction->getCVV2());
        $this->assertEquals(null, $transaction->getAVS());
        $this->assertEquals('', $transaction->getResponseText());
        $this->assertEquals(null, $transaction->getTransactionId());
        $this->assertEquals(null, $transaction->getApprovalCode());
        $this->assertEquals('Sale', $transaction->getTransactionType());
        $this->assertEquals('11.23', $transaction->getAmount());
    }
    
    public function testVisitorOrderCheckoutQuestion()
    {
        $checkoutQuestion = new CheckoutQuestion();
        $resourceParserVisitor =
            $this->instantiateResourceParserVisitor('OrderCheckoutQuestion', 'CheckoutQuestion.json');
        $resourceParserVisitor->visitOrderCheckoutQuestion($checkoutQuestion);
        
        $this->assertEquals('1', $checkoutQuestion->getId());
        $this->assertEquals('What can c checkout question be?', $checkoutQuestion->getQuestion());
        $this->assertEquals('Answer1', $checkoutQuestion->getAnswer());
    }
    
    public function testVisitorProductOptionInvalidData()
    {
        $option = new Option();
        $resourceParserVisitor = new ResourceParserVisitor(new ArrayValueObject(['Values' => ['Wrong index' => []]]));
        $resourceParserVisitor->visitProductOption($option);
        
        $this->assertEquals(true, is_array($option->getValues()));
        $this->assertEquals(true, empty($option->getValues()));
    }
    
    /**
     * @param string $mock
     * @param string $mockPart
     *
     * @return ResourceParserVisitor
     */
    private function instantiateResourceParserVisitor($mock, $mockPart)
    {
        return new ResourceParserVisitor(new ArrayValueObject(json_decode($this->loadMock($mock, $mockPart), true)));
    }
}
