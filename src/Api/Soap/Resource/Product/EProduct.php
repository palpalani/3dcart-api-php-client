<?php

namespace ThreeDCart\Api\Soap\Resource\Product;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class EProduct
 *
 * @package ThreeDCart\Api\Soap\Resource\Product
 */
class EProduct extends SoapResource
{
    /** @var string */
    private $eProductPassword;
    /** @var int */
    private $eProductRandom;
    /** @var string */
    private $eProductExpire;
    /** @var string */
    private $eProductPath;
    /** @var bool */
    private $eProductSerial;
    /** @var string */
    private $eProductInstructions;
    /** @var bool */
    private $eProductReuseSerial;
    
    /**
     * @return string
     */
    public function getEProductPassword()
    {
        return $this->eProductPassword;
    }
    
    /**
     * @param string $eProductPassword
     */
    public function setEProductPassword($eProductPassword)
    {
        $this->eProductPassword = $eProductPassword;
    }
    
    /**
     * @return int
     */
    public function getEProductRandom()
    {
        return $this->eProductRandom;
    }
    
    /**
     * @param int $eProductRandom
     */
    public function setEProductRandom($eProductRandom)
    {
        $this->eProductRandom = $eProductRandom;
    }
    
    /**
     * @return string
     */
    public function getEProductExpire()
    {
        return $this->eProductExpire;
    }
    
    /**
     * @param string $eProductExpire
     */
    public function setEProductExpire($eProductExpire)
    {
        $this->eProductExpire = $eProductExpire;
    }
    
    /**
     * @return string
     */
    public function getEProductPath()
    {
        return $this->eProductPath;
    }
    
    /**
     * @param string $eProductPath
     */
    public function setEProductPath($eProductPath)
    {
        $this->eProductPath = $eProductPath;
    }
    
    /**
     * @return bool
     */
    public function isEProductSerial()
    {
        return $this->eProductSerial;
    }
    
    /**
     * @param bool $eProductSerial
     */
    public function setEProductSerial($eProductSerial)
    {
        $this->eProductSerial = $eProductSerial;
    }
    
    /**
     * @return string
     */
    public function getEProductInstructions()
    {
        return $this->eProductInstructions;
    }
    
    /**
     * @param string $eProductInstructions
     */
    public function setEProductInstructions($eProductInstructions)
    {
        $this->eProductInstructions = $eProductInstructions;
    }
    
    /**
     * @return bool
     */
    public function isEProductReuseSerial()
    {
        return $this->eProductReuseSerial;
    }
    
    /**
     * @param bool $eProductReuseSerial
     */
    public function setEProductReuseSerial($eProductReuseSerial)
    {
        $this->eProductReuseSerial = $eProductReuseSerial;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitProductEProduct($this);
    }
}
