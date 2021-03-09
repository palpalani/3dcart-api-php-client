<?php

namespace ThreeDCart\Api\Soap\Resource\Product;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class Product
 *
 * @package ThreeDCart\Api\Soap\Resource\Product
 */
class Product extends SoapResource
{
    /** @var int */
    public $CatalogID;
    /** @var string */
    public $ProductID;
    /** @var string */
    public $ProductName;
    /** @var \ThreeDCart\Api\Soap\Resource\Product\Category[] */
    public $Categories;
    /** @var string */
    public $Mfgid;
    /** @var string */
    public $Manufacturer;
    /** @var string */
    public $Distributor;
    /** @var float */
    public $Cost;
    /** @var float */
    public $Price;
    /** @var float */
    public $RetailPrice;
    /** @var float */
    public $SalePrice;
    /** @var bool */
    public $OnSale;
    /** @var int */
    public $Stock;
    /** @var int */
    public $StockAlert;
    /** @var float */
    public $Weight;
    /** @var float */
    public $Width;
    /** @var float */
    public $Height;
    /** @var float */
    public $Depth;
    /** @var int */
    public $MinimumOrder;
    /** @var int */
    public $MaximumOrder;
    /** @var string format: MM/DD/YYYY */
    public $DateCreated;
    /** @var string */
    public $Description;
    /** @var string */
    public $ExtendedDescription;
    /** @var string */
    public $Keywords;
    /** @var RelatedProduct[] */
    public $RelatedProducts;
    /** @var float */
    public $ShipCost;
    /** @var string */
    public $Title;
    /** @var string */
    public $MetaTags;
    /** @var string */
    public $DisplayText;
    /** @var bool */
    public $HomeSpecial;
    /** @var bool */
    public $CategorySpecial;
    /** @var bool */
    public $Hide;
    /** @var bool */
    public $FreeShipping;
    /** @var bool */
    public $NonTax;
    /** @var bool */
    public $NotForsale;
    /** @var bool */
    public $GiftCertificate;
    /** @var string */
    public $UserId;
    /** @var string format MM/DD/YYYY */
    public $LastUpdate;
    /** @var ExtraFields */
    public $ExtraFields;
    /** @var string */
    public $WarehouseLocation;
    /** @var string */
    public $WarehouseBin;
    /** @var string */
    public $WarehouseAisle;
    /** @var string */
    public $WarehouseCustom;
    /** @var bool */
    public $UseCatoptions;
    /** @var string */
    public $QuantityOptions;
    /** @var PriceLevel */
    public $PriceLevel;
    /** @var int */
    public $MinOrder;
    /** @var int */
    public $ListingDisplayType;
    /** @var int */
    public $ShowOutStock;
    /** @var int */
    public $PricingGroupOpt;
    /** @var int */
    public $QuantityDiscountOpt;
    /** @var int */
    public $LoginLevel;
    /** @var string */
    public $RedirectTo;
    /** @var string */
    public $AccessGroup;
    /** @var bool */
    public $SelfShip;
    /** @var string */
    public $TaxCode;
    /** @var EProduct */
    public $eProduct;
    /** @var bool */
    public $NonSearchable;
    /** @var string */
    public $InstockMessage;
    /** @var string */
    public $OutOfStockMessage;
    /** @var string */
    public $BackOrderMessage;
    /** @var Reward */
    public $Rewards;
    /** @var string */
    public $FileName;
    /** @var float */
    public $ReviewAverage;
    /** @var int */
    public $ReviewCount;
    /** @var Images */
    public $Images;
    /** @var Option[] */
    public $Options;
    
    /**
     * @return int
     */
    public function getCatalogID()
    {
        return $this->CatalogID;
    }
    
    /**
     * @param int $CatalogID
     */
    public function setCatalogID($CatalogID)
    {
        $this->CatalogID = $CatalogID;
    }
    
    /**
     * @return string
     */
    public function getProductID()
    {
        return $this->ProductID;
    }
    
    /**
     * @param string $ProductID
     */
    public function setProductID($ProductID)
    {
        $this->ProductID = $ProductID;
    }
    
    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->ProductName;
    }
    
    /**
     * @param string $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }
    
    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->Categories;
    }
    
    /**
     * @param Category[] $Categories
     */
    public function setCategories(array $Categories)
    {
        $this->Categories = $Categories;
    }
    
    /**
     * @return string
     */
    public function getMfgid()
    {
        return $this->Mfgid;
    }
    
    /**
     * @param string $Mfgid
     */
    public function setMfgid($Mfgid)
    {
        $this->Mfgid = $Mfgid;
    }
    
    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->Manufacturer;
    }
    
    /**
     * @param string $Manufacturer
     */
    public function setManufacturer($Manufacturer)
    {
        $this->Manufacturer = $Manufacturer;
    }
    
    /**
     * @return string
     */
    public function getDistributor()
    {
        return $this->Distributor;
    }
    
    /**
     * @param string $Distributor
     */
    public function setDistributor($Distributor)
    {
        $this->Distributor = $Distributor;
    }
    
    /**
     * @return float
     */
    public function getCost()
    {
        return $this->Cost;
    }
    
    /**
     * @param float $Cost
     */
    public function setCost($Cost)
    {
        $this->Cost = $Cost;
    }
    
    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->Price;
    }
    
    /**
     * @param float $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
    
    /**
     * @return float
     */
    public function getRetailPrice()
    {
        return $this->RetailPrice;
    }
    
    /**
     * @param float $RetailPrice
     */
    public function setRetailPrice($RetailPrice)
    {
        $this->RetailPrice = $RetailPrice;
    }
    
    /**
     * @return float
     */
    public function getSalePrice()
    {
        return $this->SalePrice;
    }
    
    /**
     * @param float $SalePrice
     */
    public function setSalePrice($SalePrice)
    {
        $this->SalePrice = $SalePrice;
    }
    
    /**
     * @return bool
     */
    public function isOnSale()
    {
        return $this->OnSale;
    }
    
    /**
     * @param bool $OnSale
     */
    public function setOnSale($OnSale)
    {
        $this->OnSale = $OnSale;
    }
    
    /**
     * @return int
     */
    public function getStock()
    {
        return $this->Stock;
    }
    
    /**
     * @param int $Stock
     */
    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }
    
    /**
     * @return int
     */
    public function getStockAlert()
    {
        return $this->StockAlert;
    }
    
    /**
     * @param int $StockAlert
     */
    public function setStockAlert($StockAlert)
    {
        $this->StockAlert = $StockAlert;
    }
    
    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->Weight;
    }
    
    /**
     * @param float $Weight
     */
    public function setWeight($Weight)
    {
        $this->Weight = $Weight;
    }
    
    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->Width;
    }
    
    /**
     * @param float $Width
     */
    public function setWidth($Width)
    {
        $this->Width = $Width;
    }
    
    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->Height;
    }
    
    /**
     * @param float $Height
     */
    public function setHeight($Height)
    {
        $this->Height = $Height;
    }
    
    /**
     * @return float
     */
    public function getDepth()
    {
        return $this->Depth;
    }
    
    /**
     * @param float $Depth
     */
    public function setDepth($Depth)
    {
        $this->Depth = $Depth;
    }
    
    /**
     * @return int
     */
    public function getMinimumOrder()
    {
        return $this->MinimumOrder;
    }
    
    /**
     * @param int $MinimumOrder
     */
    public function setMinimumOrder($MinimumOrder)
    {
        $this->MinimumOrder = $MinimumOrder;
    }
    
    /**
     * @return int
     */
    public function getMaximumOrder()
    {
        return $this->MaximumOrder;
    }
    
    /**
     * @param int $MaximumOrder
     */
    public function setMaximumOrder($MaximumOrder)
    {
        $this->MaximumOrder = $MaximumOrder;
    }
    
    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->DateCreated;
    }
    
    /**
     * @param string $DateCreated
     */
    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }
    
    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
    
    /**
     * @return string
     */
    public function getExtendedDescription()
    {
        return $this->ExtendedDescription;
    }
    
    /**
     * @param string $ExtendedDescription
     */
    public function setExtendedDescription($ExtendedDescription)
    {
        $this->ExtendedDescription = $ExtendedDescription;
    }
    
    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->Keywords;
    }
    
    /**
     * @param string $Keywords
     */
    public function setKeywords($Keywords)
    {
        $this->Keywords = $Keywords;
    }
    
    /**
     * @return RelatedProduct[]
     */
    public function getRelatedProducts()
    {
        return $this->RelatedProducts;
    }
    
    /**
     * @param RelatedProduct[] $RelatedProducts
     */
    public function setRelatedProducts(array $RelatedProducts)
    {
        $this->RelatedProducts = $RelatedProducts;
    }
    
    /**
     * @return float
     */
    public function getShipCost()
    {
        return $this->ShipCost;
    }
    
    /**
     * @param float $ShipCost
     */
    public function setShipCost($ShipCost)
    {
        $this->ShipCost = $ShipCost;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }
    
    /**
     * @param string $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }
    
    /**
     * @return string
     */
    public function getMetaTags()
    {
        return $this->MetaTags;
    }
    
    /**
     * @param string $MetaTags
     */
    public function setMetaTags($MetaTags)
    {
        $this->MetaTags = $MetaTags;
    }
    
    /**
     * @return string
     */
    public function getDisplayText()
    {
        return $this->DisplayText;
    }
    
    /**
     * @param string $DisplayText
     */
    public function setDisplayText($DisplayText)
    {
        $this->DisplayText = $DisplayText;
    }
    
    /**
     * @return bool
     */
    public function isHomeSpecial()
    {
        return $this->HomeSpecial;
    }
    
    /**
     * @param bool $HomeSpecial
     */
    public function setHomeSpecial($HomeSpecial)
    {
        $this->HomeSpecial = $HomeSpecial;
    }
    
    /**
     * @return bool
     */
    public function isCategorySpecial()
    {
        return $this->CategorySpecial;
    }
    
    /**
     * @param bool $CategorySpecial
     */
    public function setCategorySpecial($CategorySpecial)
    {
        $this->CategorySpecial = $CategorySpecial;
    }
    
    /**
     * @return bool
     */
    public function isHide()
    {
        return $this->Hide;
    }
    
    /**
     * @param bool $Hide
     */
    public function setHide($Hide)
    {
        $this->Hide = $Hide;
    }
    
    /**
     * @return bool
     */
    public function isFreeShipping()
    {
        return $this->FreeShipping;
    }
    
    /**
     * @param bool $FreeShipping
     */
    public function setFreeShipping($FreeShipping)
    {
        $this->FreeShipping = $FreeShipping;
    }
    
    /**
     * @return bool
     */
    public function isNonTax()
    {
        return $this->NonTax;
    }
    
    /**
     * @param bool $NonTax
     */
    public function setNonTax($NonTax)
    {
        $this->NonTax = $NonTax;
    }
    
    /**
     * @return bool
     */
    public function isNotForsale()
    {
        return $this->NotForsale;
    }
    
    /**
     * @param bool $NotForsale
     */
    public function setNotForsale($NotForsale)
    {
        $this->NotForsale = $NotForsale;
    }
    
    /**
     * @return bool
     */
    public function isGiftCertificate()
    {
        return $this->GiftCertificate;
    }
    
    /**
     * @param bool $GiftCertificate
     */
    public function setGiftCertificate($GiftCertificate)
    {
        $this->GiftCertificate = $GiftCertificate;
    }
    
    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }
    
    /**
     * @param string $UserId
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }
    
    /**
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }
    
    /**
     * @param string $LastUpdate
     */
    public function setLastUpdate($LastUpdate)
    {
        $this->LastUpdate = $LastUpdate;
    }
    
    /**
     * @return ExtraFields
     */
    public function getExtraFields()
    {
        return $this->ExtraFields;
    }
    
    /**
     * @param ExtraFields $ExtraFields
     */
    public function setExtraFields($ExtraFields)
    {
        $this->ExtraFields = $ExtraFields;
    }
    
    /**
     * @return string
     */
    public function getWarehouseLocation()
    {
        return $this->WarehouseLocation;
    }
    
    /**
     * @param string $WarehouseLocation
     */
    public function setWarehouseLocation($WarehouseLocation)
    {
        $this->WarehouseLocation = $WarehouseLocation;
    }
    
    /**
     * @return string
     */
    public function getWarehouseBin()
    {
        return $this->WarehouseBin;
    }
    
    /**
     * @param string $WarehouseBin
     */
    public function setWarehouseBin($WarehouseBin)
    {
        $this->WarehouseBin = $WarehouseBin;
    }
    
    /**
     * @return string
     */
    public function getWarehouseAisle()
    {
        return $this->WarehouseAisle;
    }
    
    /**
     * @param string $WarehouseAisle
     */
    public function setWarehouseAisle($WarehouseAisle)
    {
        $this->WarehouseAisle = $WarehouseAisle;
    }
    
    /**
     * @return string
     */
    public function getWarehouseCustom()
    {
        return $this->WarehouseCustom;
    }
    
    /**
     * @param string $WarehouseCustom
     */
    public function setWarehouseCustom($WarehouseCustom)
    {
        $this->WarehouseCustom = $WarehouseCustom;
    }
    
    /**
     * @return bool
     */
    public function isUseCatoptions()
    {
        return $this->UseCatoptions;
    }
    
    /**
     * @param bool $UseCatoptions
     */
    public function setUseCatoptions($UseCatoptions)
    {
        $this->UseCatoptions = $UseCatoptions;
    }
    
    /**
     * @return string
     */
    public function getQuantityOptions()
    {
        return $this->QuantityOptions;
    }
    
    /**
     * @param string $QuantityOptions
     */
    public function setQuantityOptions($QuantityOptions)
    {
        $this->QuantityOptions = $QuantityOptions;
    }
    
    /**
     * @return PriceLevel
     */
    public function getPriceLevel()
    {
        return $this->PriceLevel;
    }
    
    /**
     * @param PriceLevel $PriceLevel
     */
    public function setPriceLevel($PriceLevel)
    {
        $this->PriceLevel = $PriceLevel;
    }
    
    /**
     * @return int
     */
    public function getMinOrder()
    {
        return $this->MinOrder;
    }
    
    /**
     * @param int $MinOrder
     */
    public function setMinOrder($MinOrder)
    {
        $this->MinOrder = $MinOrder;
    }
    
    /**
     * @return int
     */
    public function getListingDisplayType()
    {
        return $this->ListingDisplayType;
    }
    
    /**
     * @param int $ListingDisplayType
     */
    public function setListingDisplayType($ListingDisplayType)
    {
        $this->ListingDisplayType = $ListingDisplayType;
    }
    
    /**
     * @return int
     */
    public function getShowOutStock()
    {
        return $this->ShowOutStock;
    }
    
    /**
     * @param int $ShowOutStock
     */
    public function setShowOutStock($ShowOutStock)
    {
        $this->ShowOutStock = $ShowOutStock;
    }
    
    /**
     * @return int
     */
    public function getPricingGroupOpt()
    {
        return $this->PricingGroupOpt;
    }
    
    /**
     * @param int $PricingGroupOpt
     */
    public function setPricingGroupOpt($PricingGroupOpt)
    {
        $this->PricingGroupOpt = $PricingGroupOpt;
    }
    
    /**
     * @return int
     */
    public function getQuantityDiscountOpt()
    {
        return $this->QuantityDiscountOpt;
    }
    
    /**
     * @param int $QuantityDiscountOpt
     */
    public function setQuantityDiscountOpt($QuantityDiscountOpt)
    {
        $this->QuantityDiscountOpt = $QuantityDiscountOpt;
    }
    
    /**
     * @return int
     */
    public function getLoginLevel()
    {
        return $this->LoginLevel;
    }
    
    /**
     * @param int $LoginLevel
     */
    public function setLoginLevel($LoginLevel)
    {
        $this->LoginLevel = $LoginLevel;
    }
    
    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->RedirectTo;
    }
    
    /**
     * @param string $RedirectTo
     */
    public function setRedirectTo($RedirectTo)
    {
        $this->RedirectTo = $RedirectTo;
    }
    
    /**
     * @return string
     */
    public function getAccessGroup()
    {
        return $this->AccessGroup;
    }
    
    /**
     * @param string $AccessGroup
     */
    public function setAccessGroup($AccessGroup)
    {
        $this->AccessGroup = $AccessGroup;
    }
    
    /**
     * @return bool
     */
    public function isSelfShip()
    {
        return $this->SelfShip;
    }
    
    /**
     * @param bool $SelfShip
     */
    public function setSelfShip($SelfShip)
    {
        $this->SelfShip = $SelfShip;
    }
    
    /**
     * @return string
     */
    public function getTaxCode()
    {
        return $this->TaxCode;
    }
    
    /**
     * @param string $TaxCode
     */
    public function setTaxCode($TaxCode)
    {
        $this->TaxCode = $TaxCode;
    }
    
    /**
     * @return EProduct
     */
    public function getEProduct()
    {
        return $this->eProduct;
    }
    
    /**
     * @param EProduct $eProduct
     */
    public function setEProduct($eProduct)
    {
        $this->eProduct = $eProduct;
    }
    
    /**
     * @return bool
     */
    public function isNonSearchable()
    {
        return $this->NonSearchable;
    }
    
    /**
     * @param bool $NonSearchable
     */
    public function setNonSearchable($NonSearchable)
    {
        $this->NonSearchable = $NonSearchable;
    }
    
    /**
     * @return string
     */
    public function getInstockMessage()
    {
        return $this->InstockMessage;
    }
    
    /**
     * @param string $InstockMessage
     */
    public function setInstockMessage($InstockMessage)
    {
        $this->InstockMessage = $InstockMessage;
    }
    
    /**
     * @return string
     */
    public function getOutOfStockMessage()
    {
        return $this->OutOfStockMessage;
    }
    
    /**
     * @param string $OutOfStockMessage
     */
    public function setOutOfStockMessage($OutOfStockMessage)
    {
        $this->OutOfStockMessage = $OutOfStockMessage;
    }
    
    /**
     * @return string
     */
    public function getBackOrderMessage()
    {
        return $this->BackOrderMessage;
    }
    
    /**
     * @param string $BackOrderMessage
     */
    public function setBackOrderMessage($BackOrderMessage)
    {
        $this->BackOrderMessage = $BackOrderMessage;
    }
    
    /**
     * @return Reward
     */
    public function getRewards()
    {
        return $this->Rewards;
    }
    
    /**
     * @param Reward $Rewards
     */
    public function setRewards($Rewards)
    {
        $this->Rewards = $Rewards;
    }
    
    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->FileName;
    }
    
    /**
     * @param string $FileName
     */
    public function setFileName($FileName)
    {
        $this->FileName = $FileName;
    }
    
    /**
     * @return float
     */
    public function getReviewAverage()
    {
        return $this->ReviewAverage;
    }
    
    /**
     * @param float $ReviewAverage
     */
    public function setReviewAverage($ReviewAverage)
    {
        $this->ReviewAverage = $ReviewAverage;
    }
    
    /**
     * @return int
     */
    public function getReviewCount()
    {
        return $this->ReviewCount;
    }
    
    /**
     * @param int $ReviewCount
     */
    public function setReviewCount($ReviewCount)
    {
        $this->ReviewCount = $ReviewCount;
    }
    
    /**
     * @return Images
     */
    public function getImages()
    {
        return $this->Images;
    }
    
    /**
     * @param Images $Images
     */
    public function setImages($Images)
    {
        $this->Images = $Images;
    }
    
    /**
     * @return Option[]
     */
    public function getOptions()
    {
        return $this->Options;
    }
    
    /**
     * @param Option[] $Options
     */
    public function setOptions(array $Options)
    {
        $this->Options = $Options;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitProduct($this);
    }
}
