<?php

namespace ThreeDCart\Api\Soap\Resources\Customer;

use ThreeDCart\Api\Soap\Resources\SoapResource;
use ThreeDCart\Api\Soap\Resources\VisitorInterface;

class AdditionalFields extends SoapResource
{
    /** @var string */
    private $AdditionalField1 = '';
    /** @var string */
    private $AdditionalField2 = '';
    /** @var string */
    private $AdditionalField3 = '';
    
    /**
     * @return string
     */
    public function getAdditionalField1()
    {
        return $this->AdditionalField1;
    }
    
    /**
     * @param string $AdditionalField1
     */
    public function setAdditionalField1($AdditionalField1)
    {
        $this->AdditionalField1 = $AdditionalField1;
    }
    
    /**
     * @return string
     */
    public function getAdditionalField2()
    {
        return $this->AdditionalField2;
    }
    
    /**
     * @param string $AdditionalField2
     */
    public function setAdditionalField2($AdditionalField2)
    {
        $this->AdditionalField2 = $AdditionalField2;
    }
    
    /**
     * @return string
     */
    public function getAdditionalField3()
    {
        return $this->AdditionalField3;
    }
    
    /**
     * @param string $AdditionalField3
     */
    public function setAdditionalField3($AdditionalField3)
    {
        $this->AdditionalField3 = $AdditionalField3;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCustomerAdditionalFields($this);
    }
}
