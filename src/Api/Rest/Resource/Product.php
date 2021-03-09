<?php

namespace ThreeDCart\Api\Rest\Resource;

use ThreeDCart\Api\Rest\Resource\Product\AdvancedOption;
use ThreeDCart\Api\Rest\Resource\Product\Discount;
use ThreeDCart\Api\Rest\Resource\Product\Distributor;
use ThreeDCart\Api\Rest\Resource\Product\EProduct;
use ThreeDCart\Api\Rest\Resource\Product\ExternalId;
use ThreeDCart\Api\Rest\Resource\Product\Feature;
use ThreeDCart\Api\Rest\Resource\Product\ImageGallery;
use ThreeDCart\Api\Rest\Resource\Product\OptionSet;
use ThreeDCart\Api\Rest\Resource\Product\ProductSKU;
use ThreeDCart\Api\Rest\Resource\Product\RelatedProduct;
use ThreeDCart\Api\Rest\Resource\Product\Serial;
use ThreeDCart\Api\Rest\Resource\Product\UpSellingItem;

/**
 * @package ThreeDCart\Api\Rest\Resource
 *
 * @method static Product fromArray(array $properties)
 * @method static Product[] fromList(array $list)
 */
class Product extends AbstractResource
{
    protected static $lists = [
        'DistributorList' => Distributor::class,
        'CategoryList' => Category::class,
        'ExternalIdsList' => ExternalId::class,
        'FeatureList' => Feature::class,
        'ImageGalleryList' => ImageGallery::class,
        'OptionSetList' => OptionSet::class,
        'AdvancedOptionList' => AdvancedOption::class,
        'RelatedProductList' => RelatedProduct::class,
        'UpSellingItemList' => UpSellingItem::class,
        'DiscountList' => Discount::class,
        'SerialList' => Serial::class,
        'EProductList' => EProduct::class,
    ];
    
    protected static $objects = [
        'SKUInfo' => ProductSKU::class,
    ];
    
    /** @var string */
    public $MFGID;
    
    /** @var string */
    public $ShortDescription;
    
    /** @var int */
    public $ManufacturerID;
    
    /** @var string */
    public $ManufacturerName;
    
    /** @var Distributor[] */
    public $DistributorList;
    
    /** @var string */
    public $LastUpdate;
    
    /** @var string */
    public $UserID;
    
    /** @var string */
    public $GTIN;
    
    /** @var \ThreeDCart\Api\Rest\Resource\Product\Category[] */
    public $CategoryList;
    
    /** @var ExternalId[] */
    public $ExternalIdsList;
    
    /** @var bool */
    public $NonTaxable;
    
    /** @var bool */
    public $NotForSale;
    
    /** @var bool */
    public $Hide;
    
    /** @var bool */
    public $GiftCertificate;
    
    /** @var bool */
    public $HomeSpecial;
    
    /** @var bool */
    public $CategorySpecial;
    
    /** @var bool */
    public $NonSearchable;
    
    /** @var bool */
    public $GiftWrapItem;
    
    /** @var float */
    public $ShipCost;
    
    /** @var float */
    public $Weight;
    
    /** @var float */
    public $Height;
    
    /** @var float */
    public $Width;
    
    /** @var float */
    public $Depth;
    
    /** @var bool */
    public $SelfShip;
    
    /** @var bool */
    public $FreeShipping;
    
    /** @var int */
    public $RewardPoints;
    
    /** @var int */
    public $RedeemPoints;
    
    /** @var bool */
    public $DisableRewards;
    
    /** @var int */
    public $StockAlert;
    
    /** @var int */
    public $ReorderQuantity;
    
    /** @var string */
    public $InStockMessage;
    
    /** @var string */
    public $OutOfStockMessage;
    
    /** @var string */
    public $BackOrderMessage;
    
    /** @var int */
    public $InventoryControl;
    
    /** @var string */
    public $WarehouseLocation;
    
    /** @var string */
    public $WarehouseBin;
    
    /** @var string */
    public $WarehouseAisle;
    
    /** @var string */
    public $WarehouseCustom;
    
    /** @var string */
    public $Description;
    
    /** @var string */
    public $Keywords;
    
    /** @var string */
    public $ExtraField1;
    
    /** @var string */
    public $ExtraField2;
    
    /** @var string */
    public $ExtraField3;
    
    /** @var string */
    public $ExtraField4;
    
    /** @var string */
    public $ExtraField5;
    
    /** @var string */
    public $ExtraField6;
    
    /** @var string */
    public $ExtraField7;
    
    /** @var string */
    public $ExtraField8;
    
    /** @var string */
    public $ExtraField9;
    
    /** @var string */
    public $ExtraField10;
    
    /** @var string */
    public $ExtraField11;
    
    /** @var string */
    public $ExtraField12;
    
    /** @var string */
    public $ExtraField13;
    
    /** @var Feature[] */
    public $FeatureList;
    
    /** @var array [string key, string value] */
    public $PluginList;
    
    /** @var bool */
    public $SampleEnable;
    
    /** @var string */
    public $SampleName;
    
    /** @var string */
    public $SampleSKUPrefix;
    
    /** @var float */
    public $SamplePrice;
    
    /** @var float */
    public $SampleWeight;
    
    /** @var float */
    public $ReviewAverage;
    
    /** @var int */
    public $ReviewCount;
    
    /** @var string */
    public $MainImageFile;
    
    /** @var string */
    public $MainImageCaption;
    
    /** @var string */
    public $ThumbnailFile;
    
    /** @var string */
    public $MediaFile;
    
    /** @var string */
    public $AdditionalImageFile2;
    
    /** @var string */
    public $AdditionalImageCaption2;
    
    /** @var string */
    public $AdditionalImageFile3;
    
    /** @var string */
    public $AdditionalImageCaption3;
    
    /** @var string */
    public $AdditionalImageFile4;
    
    /** @var string */
    public $AdditionalImageCaption4;
    
    /** @var ImageGallery[] */
    public $ImageGalleryList;
    
    /** @var OptionSet[] */
    public $OptionSetList;
    
    /** @var AdvancedOption[] */
    public $AdvancedOptionList;
    
    /** @var RelatedProduct[] */
    public $RelatedProductList;
    
    /** @var UpSellingItem[] */
    public $UpSellingItemList;
    
    /** @var Discount[] */
    public $DiscountList;
    
    /** @var bool */
    public $DoNotUseCategoryOptions;
    
    /** @var string */
    public $DateCreated;
    
    /** @var int */
    public $ListingTemplateID;
    
    /** @var string */
    public $ListingTemplateName;
    
    /** @var int */
    public $LoginRequiredOptionID;
    
    /** @var string */
    public $LoginRequiredOptionName;
    
    /** @var string */
    public $LoginRequiredOptionRedirectTo;
    
    /** @var int */
    public $AllowAccessCustomerGroupID;
    
    /** @var string */
    public $AllowAccessCustomerGroupName;
    
    /** @var string */
    public $RMAMaxPeriod;
    
    /** @var string */
    public $CanonicalUrl;
    
    /** @var string */
    public $TaxCode;
    
    /** @var string */
    public $DisplayText;
    
    /** @var float */
    public $MinimumQuantity;
    
    /** @var float */
    public $MaximumQuantity;
    
    /** @var bool */
    public $AllowOnlyMultiples;
    
    /** @var bool */
    public $AllowFractionalQuantity;
    
    /** @var string */
    public $QuantityOptions;
    
    /** @var bool */
    public $GroupOptionsForQuantityPricing;
    
    /** @var bool */
    public $ApplyQuantityDiscountToOptions;
    
    /** @var bool */
    public $EnableMakeAnOfferFeature;
    
    /** @var string */
    public $MinimumAcceptableOffer;
    
    /** @var float */
    public $PriceLevel1;
    
    /** @var bool */
    public $PriceLevel1Hide;
    
    /** @var float */
    public $PriceLevel2;
    
    /** @var bool */
    public $PriceLevel2Hide;
    
    /** @var float */
    public $PriceLevel3;
    
    /** @var bool */
    public $PriceLevel3Hide;
    
    /** @var float */
    public $PriceLevel4;
    
    /** @var bool */
    public $PriceLevel4Hide;
    
    /** @var float */
    public $PriceLevel5;
    
    /** @var bool */
    public $PriceLevel5Hide;
    
    /** @var float */
    public $PriceLevel6;
    
    /** @var bool */
    public $PriceLevel6Hide;
    
    /** @var float */
    public $PriceLevel7;
    
    /** @var bool */
    public $PriceLevel7Hide;
    
    /** @var float */
    public $PriceLevel8;
    
    /** @var bool */
    public $PriceLevel8Hide;
    
    /** @var float */
    public $PriceLevel9;
    
    /** @var bool */
    public $PriceLevel9Hide;
    
    /** @var float */
    public $PriceLevel10;
    
    /** @var bool */
    public $PriceLevel10Hide;
    
    /** @var string */
    public $BuyButtonLink;
    
    /** @var string */
    public $ProductLink;
    
    /** @var string */
    public $Title;
    
    /** @var string */
    public $CustomFileName;
    
    /** @var string */
    public $RedirectLink;
    
    /** @var string */
    public $MetaTags;
    
    /** @var string */
    public $SpecialInstructions;
    
    /** @var bool */
    public $AssignKey;
    
    /** @var bool */
    public $ReUseKeys;
    
    /** @var Serial[] */
    public $SerialList;
    
    /** @var EProduct[] */
    public $EProductList;
    
    /** @var ProductSKU */
    public $SKUInfo;
}
