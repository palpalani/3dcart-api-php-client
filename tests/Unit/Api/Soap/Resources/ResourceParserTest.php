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
use ThreeDCart\Api\Soap\Resource\ParseException;
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
use ThreeDCart\Api\Soap\Resource\ResourceParser;
use ThreeDCart\Api\Soap\Resource\ResourceParserInterface;
use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Primitive\ArrayValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class ResourceParserTest
 *
 * @package tests\Unit\Api\Soap\Resources
 */
class ResourceParserTest extends ThreeDCartTestCase
{
    /** @var ResourceParserInterface */
    private $resourceParser;

    public function setup(): void
    {
        $this->resourceParser = new ResourceParser();

        //$json = '{"CatalogID":"1","ProductID":"Custom Cap","ProductName":"Custom Cap","Categories":{"Category":[{"CategoryID":"4","CategoryName":"Apparel"},{"CategoryID":"1","CategoryName":"Sample Category"},{"CategoryID":"3","CategoryName":"Gifts"}]},"Mfgid":"MPNNUMBER","Manufacturer":"MyManufacturer","Distributor":"Test","Cost":"0.00","Price":"17.99","RetailPrice":"0","SalePrice":"19.99","OnSale":"1","Stock":"0","StockAlert":"0","Weight":"2.00","Width":"44.00","Height":"33.00","Depth":"55.00","MinimumOrder":"1","MaximumOrder":"0","DateCreated":"6\/22\/2009","Description":"Sample Product","ExtendedDescription":"<div><strong><span style=\"COLOR: #ff0000\">SAMPLE PRODUCT <\/span><\/strong><\/div><div>&nbsp;<\/div><div>Our adjustable, 100% brushed cotton Cap is unstructured and an ideal way to beat the heat.<\/div>    ","Keywords":"My;Key;words","RelatedProducts":{"Product":[{"ProductID":"1002","ProductName":"Custom Cap 2"},{"ProductID":"1003","ProductName":"Tote Bag"}]},"ShipCost":"0.00","Title":"Title Of MetaTags","MetaTags":"<META NAME=\"DESCRIPTION\" CONTENT=\"gffghnhg\"><META NAME=\"ABSTRACT\" CONTENT=\"mbjmhj\"><META NAME=\"KEYWORDS\" CONTENT=\"bmvghjhjm\">","DisplayText":"DIsplayTesxt","HomeSpecial":"1","CategorySpecial":"0","Hide":"0","FreeShipping":"1","NonTax":"0","NotForsale":"0","GiftCertificate":"0","UserId":"Administrator","LastUpdate":"10\/16\/2016 9:50:30 AM","ExtraFields":{"ExtraField1":"123456789","ExtraField2":"more custom 2","ExtraField3":"and one more 3","ExtraField4":[],"ExtraField5":[],"ExtraField6":"Extra Field 6    ","ExtraField7":"xtr4 f13ld 7    ","ExtraField8":[],"ExtraField9":[],"ExtraField10":[],"ExtraField11":[],"ExtraField12":[],"ExtraField13":"extreFIeld13"},"WarehouseLocation":[],"WarehouseBin":[],"WarehouseAisle":[],"WarehouseCustom":[],"UseCatoptions":"0","QuantityOptions":[],"PriceLevel":{"Price_1":"17.99","Price_2":"16.99","Price_3":"0","Price_4":"0","Price_5":"0","Price_6":"0","Price_7":"0","Price_8":"0","Price_9":"0","Price_10":"14.99"},"MinOrder":"0","ListingDisplayType":"-1","ShowOutStock":"-1","PricingGroupOpt":"0","QuantityDiscountOpt":"0","LoginLevel":"-1","RedirectTo":[],"AccessGroup":[],"SelfShip":"1","TaxCode":"MyT","eProduct":{"eProductPassword":[],"eProductRandom":"0","eProductExpire":"0","eProductPath":[],"eProductSerial":"0","eProductInstructions":[],"eProductReuseSerial":"0"},"NonSearchable":"0","InstockMessage":"InStock message","OutOfStockMessage":"Out Stock Message","BackOrderMessage":"Back order Message","Rewards":{"RewardPoints":"123","RewardDisable":"0","RewardRedeem":"123"},"FileName":"MyCustomFileName","ReviewAverage":"3","ReviewCount":"1","Images":{"Image":[{"Url":"assets\/images\/default\/cap.jpg","Caption":[]},{"Url":[],"Caption":[]},{"Url":[],"Caption":[]},{"Url":[],"Caption":[]}],"Thumbnail":"assets\/images\/default\/cap_thumbnail.jpg"},"Options":{"Option":[{"Id":"2","OptionType":"Color","Values":{"Value":[{"ID":"4","Name":"Red","OptionPrice":"10.00","OptionPartNumber":[]},{"ID":"5","Name":"Blue","OptionPrice":"0.00","OptionPartNumber":[]}]}},{"Id":"3","OptionType":"Size","Values":{"Value":[{"ID":"6","Name":"XL","OptionPrice":"3.00","OptionPartNumber":"3"},{"ID":"7","Name":"L","OptionPrice":"0.00","OptionPartNumber":"4"}]}},{"Id":"6","OptionType":"<FONT COLOR=\"#FFFFFF\"><\/font>","Values":{"Value":[{"ID":"10","Name":"testtextbox","OptionPrice":"2.00","OptionPartNumber":"5"},{"ID":"11","Name":"testtextbox2","OptionPrice":"0.00","OptionPartNumber":"6"}]}},{"Id":"7","OptionType":"Textarea","Values":{"Value":{"ID":"12","Name":"textareatest","OptionPrice":"2.00","OptionPartNumber":"7"}}},{"Id":"9","OptionType":"DropImage","Values":{"Value":[{"ID":"14","Name":"DropImage test","OptionPrice":"0.00","OptionPartNumber":"9"},{"ID":"23","Name":"DropImage2","OptionPrice":"0.00","OptionPartNumber":"10"}]}},{"Id":"10","OptionType":"File","Values":{"Value":{"ID":"15","Name":"File test","OptionPrice":"2.00","OptionPartNumber":[]}}},{"Id":"8","OptionType":"title","Values":{"Value":{"ID":"13","Name":"titletest","OptionPrice":"2.50","OptionPartNumber":"8"}}},{"Id":"12","OptionType":"One TIme Fee","Values":{"Value":[{"ID":"17","Name":"One Time Fee of 3\u20ac","OptionPrice":"3.00","OptionPartNumber":[]},{"ID":"22","Name":"More Time Fee of 6\u20ac","OptionPrice":"6.00","OptionPartNumber":[]}]}},{"Id":"13","OptionType":"<b>CheckBox<\/b>","Values":{"Value":[{"ID":"19","Name":"checkbox2 test","OptionPrice":"0.00","OptionPartNumber":"13"},{"ID":"18","Name":"checkbox1 test","OptionPrice":"3.00","OptionPartNumber":"12"}]}},{"Id":"14","OptionType":"QTY","Values":{"Value":[{"ID":"20","Name":"qty1 test","OptionPrice":"2.00","OptionPartNumber":[]},{"ID":"21","Name":"Qty30 test","OptionPrice":"30.00","OptionPartNumber":[]}]}}]}}';
        //$json = '{"CategoryID":"4","CategoryName":"Apparel"}';
        //$json = '{"ProductID":"1002","ProductName":"Custom Cap 2"}';
        //$json = '{"Price_1":"17.99","Price_2":"16.99","Price_3":"0","Price_4":"0","Price_5":"0","Price_6":"0","Price_7":"0","Price_8":"0","Price_9":"0","Price_10":"14.99"}';
        //$json = '{"eProductPassword":[],"eProductRandom":"0","eProductExpire":"0","eProductPath":[],"eProductSerial":"0","eProductInstructions":[],"eProductReuseSerial":"0"}';
        //$json = '{"RewardPoints":"123","RewardDisable":"0","RewardRedeem":"123"}';
        //$json = '{"Url":"assets\/images\/default\/cap.jpg","Caption":[]}';
        //$json = '{"Id":"2","OptionType":"Color","Values":{"Value":[{"ID":"4","Name":"Red","OptionPrice":"10.00","OptionPartNumber":[]},{"ID":"5","Name":"Blue","OptionPrice":"0.00","OptionPartNumber":[]}]}}';
        //$json = '{"ID":"4","Name":"Red","OptionPrice":"10.00","OptionPartNumber":[]}';
        //$json = '{"CustomerID":"1","UserID":"Administrator","BillingAddress":{"FirstName":"John","LastName":"Doe","Address":"123 Street","Address2":null,"City":"Coral Springs","StateCode":"FL","ZipCode":"33065","CountryCode":"US","Company":"3DCart","Phone":"800-828-6650","Email":"test@3dcart.com"},"ShippingAddress":{"FirstName":"John","LastName":"Doe","Address":"123 Street","Address2":null,"City":"Coral Springs","StateCode":"FL","ZipCode":"33065","CountryCode":"US","Company":"3DCart","Phone":"800-828-6650"},"Comments":"Sample Customer from 3dcart","LastLoginDate":"5\/6\/2014","WebSite":null,"DiscountGroup":null,"AccountNumber":null,"MailList":"1","CustomerType":"0","LastUpdate":"6\/22\/2009","CustEnabled":"1","AditionalFields":{"AdditionalField1":null,"AdditionalField2":null,"AdditionalField3":null},"AdditionalField4":null}';
        //$json = '{"AdditionalField1":null,"AdditionalField2":null,"AdditionalField3":null}';
        //$json = '{"FirstName":"John","LastName":"Doe","Address":"123 Street","Address2":null,"City":"Coral Springs","StateCode":"FL","ZipCode":"33065","CountryCode":"US","Company":"3DCart","Phone":"800-828-6650","Email":"test@3dcart.com"}';
        //$json = '{"ExtraField1":"123456789","ExtraField2":"more custom 2","ExtraField3":"and one more 3","ExtraField4":[],"ExtraField5":[],"ExtraField6":"Extra Field 6    ","ExtraField7":"xtr4 f13ld 7    ","ExtraField8":[],"ExtraField9":[],"ExtraField10":[],"ExtraField11":[],"ExtraField12":[],"ExtraField13":"extreFIeld13"}';
        //$json = '{"OrderID":"1","InvoiceNumber":"AB-1000","CustomerID":"1","Date":"6/22/2009","Total":"1","Tax":"0.00","Tax2":"0.00","Tax3":"0.00","Shipping":"0","BillingAddress":{"FirstName":"Test","LastName":"Test","Email":"test@3dcart.com","Address":"123 Street","Address2":null,"City":"Coral Springs","ZipCode":"33065","StateCode":"FL","CountryCode":"US","Phone":"800-828-6650","Company":null},"Comments":{"OrderComment":null,"OrderInternalComment":null,"OrderExternalComment":null},"PaymentMethod":"Online Credit Card","CardType":null,"Time":"12:44:37 PM","Transaction":null,"Discount":"0.00","Promotions":null,"GiftCertificatePurchased":null,"GiftCertificateUsed":null,"OrderStatus":"New","Referer":"http://www.google.com","SalesPerson":null,"IP":null,"DateStarted":"6/22/2009 10:23:09 AM","UserID":null,"LastUpdate":"6/22/2009","Weight":"1.00","AffiliateInformation":{"AffiliateID":"0","AffiliateCommission":"0","AffiliateApproved":null,"AffiliateApprovedreason":null},"ShippingInformation":{"Shipment":{"ShipmentID":"0","ShipmentDate":null,"Shipping":"0","Method":null,"FirstName":"Test","LastName":"Test","Company":null,"Address":"123 Street","Address2":null,"City":"Coral Springs","ZipCode":"33065","StateCode":"FL","CountryCode":"US","Phone":"800-828-6650","Weight":"1.00","Status":"New","InternalComment":null,"TrackingCode":null},"OrderItems":{"Item":{"ShipmentID":"0","ProductID":null,"ProductName":null,"Quantity":"1","UnitPrice":"1.00","UnitCost":"0.00","OptionPrice":"0.00","Weight":"3.00","Dimension":null,"WarehouseID":"0","DateAdded":"6/22/2009 12:05:07 PM","PageAdded":"Tote-Bag_p_3.html","ProdType":"Tangible","Taxable":"0","ItemPrice":"1.00","Total":"1.00","WarehouseLocation":null,"WarehouseBin":null,"WarehouseAisle":null,"WarehouseCustom":null}}},"CheckoutQuestions":null}';

        //$array = json_decode($json, true);
        //$this->parseValue($array);
    }

    public function parseValue($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                echo '/** @var string */' . "\n";
                echo 'private $' . $key . ';' . "\n";

                //echo 'class ' . $key . ' {' . "\n";
                //$this->parseValue($value);
                //echo '}';
                continue;
            }
            echo '/** @var string */' . "\n";
            echo 'private $' . $key . ';' . "\n";
        }
    }

    public function testGetResourceDataEmpty()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResource(new StringValueObject(Product::class), new ArrayValueObject([]));
    }

    public function testGetResourcesDataEmpty()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResources(new StringValueObject(Product::class), new ArrayValueObject([]));
    }

    public function testGetResourcesDataHalfEmpty()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResources(
            new StringValueObject(Product::class),
            new ArrayValueObject(['something' => []])
        );
    }

    public function testGetResourceDataNull()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResource(new StringValueObject(Product::class), new ArrayValueObject([null]));
    }

    public function testgetResourcesDataNull()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResources(new StringValueObject(Product::class), new ArrayValueObject([null]));
    }

    public function testGetResourceDataInvalid()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResource(new StringValueObject(Product::class), new ArrayValueObject([
            'some_not_available_field' => 'not available value',
        ]));
    }

    public function testGetResourcesDataInvalid()
    {
        $this->expectException(ParseException::class);
        $this->resourceParser->getResources(new StringValueObject(Product::class), new ArrayValueObject([
            [
                'some_not_available_field' => 'not available value',
            ],
        ]));
    }

    /**
     * @param SoapResource $expectedClass
     * @param string       $mock
     * @param string       $mockPart
     *
     * @dataProvider getResourceFromArrayProvider
     */
    public function testCreateResource($expectedClass, $mock, $mockPart)
    {
        $data = json_decode($this->loadMock($mock, $mockPart), true);
        $resource =
            $this->resourceParser->getResource(new StringValueObject($expectedClass), new ArrayValueObject($data));

        $this->assertInstanceOf($expectedClass, $resource);
    }

    /**
     * @param SoapResource $expectedClass
     * @param string       $mock
     * @param string       $mockPart
     *
     * @dataProvider getResourceFromArrayProvider
     */
    public function testCreateResources($expectedClass, $mock, $mockPart)
    {
        $data = json_decode($this->loadMock($mock, $mockPart), true);

        $multipleData = [
            $data,
            $data,
        ];

        $resources = $this->resourceParser->getResources(
            new StringValueObject($expectedClass),
            new ArrayValueObject($multipleData)
        );

        $this->assertEquals(2, count($resources));

        foreach ($resources as $resource) {
            $this->assertInstanceOf($expectedClass, $resource);
        }
    }

    public function getResourceFromArrayProvider()
    {
        return [
            'Product' => [
                Product::class,
                'Product',
                'Product.json',
            ],
            'Customer' => [
                Customer::class,
                'Customer',
                'Customer.json',
            ],
            'Customer - LoginToken' => [
                LoginToken::class,
                'CustomerLoginToken',
                'LoginToken.json',
            ],
            'Customer - Address' => [
                Address::class,
                'CustomerAddress',
                'Address.json',
            ],
            'Customer - AdditionalFields' => [
                AdditionalFields::class,
                'CustomerAdditionalFields',
                'AdditionalFields.json',
            ],
            'Product - Category' => [
                Category::class,
                'ProductCategory',
                'Category.json',
            ],
            'Product - EProduct' => [
                EProduct::class,
                'ProductEProduct',
                'EProduct.json',
            ],
            'Product - ExtraFields' => [
                ExtraFields::class,
                'ProductExtraFields',
                'ExtraFields.json',
            ],
            'Product - Image' => [
                Image::class,
                'ProductImage',
                'Image.json',
            ],
            'Product - Images' => [
                Images::class,
                'ProductImages',
                'Images.json',
            ],
            'Product - OptionValue' => [
                OptionValue::class,
                'ProductOptionValue',
                'OptionValue.json',
            ],
            'Product - Option' => [
                Option::class,
                'ProductOption',
                'Option.json',
            ],
            'Product - PriceLevel' => [
                PriceLevel::class,
                'ProductPriceLevel',
                'PriceLevel.json',
            ],
            'Product - RelatedProduct' => [
                RelatedProduct::class,
                'ProductRelatedProduct',
                'RelatedProduct.json',
            ],
            'Product - Reward' => [
                Reward::class,
                'ProductReward',
                'Reward.json',
            ],
            'Product - Inventory' => [
                ProductInventory::class,
                'ProductInventory',
                'Inventory.json',
            ],
            'Order' => [
                Order::class,
                'Order',
                'Order.json',
            ],
            'Order - Comments' => [
                Comments::class,
                'OrderComments',
                'Comments.json',
            ],
            'Order - AffiliateInformation' => [
                AffiliateInformation::class,
                'OrderAffiliateInformation',
                'AffiliateInformation.json',
            ],
            'Order - GiftCertificatePurchased' => [
                GiftCertificatePurchased::class,
                'OrderGiftCertificatePurchased',
                'GiftCertificatePurchased.json',
            ],
            'Order - GiftCertificateUsed' => [
                GiftCertificateUsed::class,
                'OrderGiftCertificateUsed',
                'GiftCertificateUsed.json',
            ],
            'Order - Item' => [
                Item::class,
                'OrderItem',
                'Item.json',
            ],
            'Order - Promotion' => [
                Promotion::class,
                'OrderPromotion',
                'Promotion.json',
            ],
            'Order - Shipment' => [
                Shipment::class,
                'OrderShipment',
                'Shipment.json',
            ],
            'Order - ShippingInformation' => [
                ShippingInformation::class,
                'OrderShippingInformation',
                'ShippingInformation.json',
            ],
            'Order - Transaction' => [
                Transaction::class,
                'OrderTransaction',
                'Transaction.json',
            ],
            'Order - OrderStatus' => [
                Status::class,
                'OrderStatus',
                'Status.json',
            ],
            'Order - CheckoutQuestion' => [
                CheckoutQuestion::class,
                'OrderCheckoutQuestion',
                'CheckoutQuestion.json',
            ],
        ];
    }
}
