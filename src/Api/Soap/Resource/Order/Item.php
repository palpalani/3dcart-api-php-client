<?php

namespace ThreeDCart\Api\Soap\Resource\Order;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class Item
 *
 * @package ThreeDCart\Api\Soap\Resource\Order
 */
class Item extends SoapResource
{
    /** @var int */
    private $ShipmentID;
    /** @var string */
    private $ProductID;
    /** @var string */
    private $ProductName;
    /** @var int */
    private $Quantity;
    /** @var float */
    private $UnitPrice;
    /** @var float */
    private $UnitCost;
    /** @var float */
    private $OptionPrice;
    /** @var float */
    private $Weight;
    /** @var string */
    private $Dimension;
    /** @var int */
    private $WarehouseID;
    /** @var string */
    private $DateAdded;
    /** @var string */
    private $PageAdded;
    /** @var string */
    private $ProdType;
    /** @var bool */
    private $Taxable;
    /** @var float */
    private $ItemPrice;
    /** @var float */
    private $Total;
    /** @var string */
    private $WarehouseLocation;
    /** @var string */
    private $WarehouseBin;
    /** @var string */
    private $WarehouseAisle;
    /** @var string */
    private $WarehouseCustom;
    
    /**
     * @return int
     */
    public function getShipmentID()
    {
        return $this->ShipmentID;
    }
    
    /**
     * @param int $ShipmentID
     */
    public function setShipmentID($ShipmentID)
    {
        $this->ShipmentID = $ShipmentID;
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
     * @return int
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }
    
    /**
     * @param int $Quantity
     */
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }
    
    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->UnitPrice;
    }
    
    /**
     * @param float $UnitPrice
     */
    public function setUnitPrice($UnitPrice)
    {
        $this->UnitPrice = $UnitPrice;
    }
    
    /**
     * @return float
     */
    public function getUnitCost()
    {
        return $this->UnitCost;
    }
    
    /**
     * @param float $UnitCost
     */
    public function setUnitCost($UnitCost)
    {
        $this->UnitCost = $UnitCost;
    }
    
    /**
     * @return float
     */
    public function getOptionPrice()
    {
        return $this->OptionPrice;
    }
    
    /**
     * @param float $OptionPrice
     */
    public function setOptionPrice($OptionPrice)
    {
        $this->OptionPrice = $OptionPrice;
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
     * @return string
     */
    public function getDimension()
    {
        return $this->Dimension;
    }
    
    /**
     * @param string $Dimension
     */
    public function setDimension($Dimension)
    {
        $this->Dimension = $Dimension;
    }
    
    /**
     * @return int
     */
    public function getWarehouseID()
    {
        return $this->WarehouseID;
    }
    
    /**
     * @param int $WarehouseID
     */
    public function setWarehouseID($WarehouseID)
    {
        $this->WarehouseID = $WarehouseID;
    }
    
    /**
     * @return string
     */
    public function getDateAdded()
    {
        return $this->DateAdded;
    }
    
    /**
     * @param string $DateAdded
     */
    public function setDateAdded($DateAdded)
    {
        $this->DateAdded = $DateAdded;
    }
    
    /**
     * @return string
     */
    public function getPageAdded()
    {
        return $this->PageAdded;
    }
    
    /**
     * @param string $PageAdded
     */
    public function setPageAdded($PageAdded)
    {
        $this->PageAdded = $PageAdded;
    }
    
    /**
     * @return string
     */
    public function getProdType()
    {
        return $this->ProdType;
    }
    
    /**
     * @param string $ProdType
     */
    public function setProdType($ProdType)
    {
        $this->ProdType = $ProdType;
    }
    
    /**
     * @return bool
     */
    public function isTaxable()
    {
        return $this->Taxable;
    }
    
    /**
     * @param bool $Taxable
     */
    public function setTaxable($Taxable)
    {
        $this->Taxable = $Taxable;
    }
    
    /**
     * @return float
     */
    public function getItemPrice()
    {
        return $this->ItemPrice;
    }
    
    /**
     * @param float $ItemPrice
     */
    public function setItemPrice($ItemPrice)
    {
        $this->ItemPrice = $ItemPrice;
    }
    
    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->Total;
    }
    
    /**
     * @param float $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
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
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitOrderItem($this);
    }
}
