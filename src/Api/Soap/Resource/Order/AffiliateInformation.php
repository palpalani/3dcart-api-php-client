<?php

namespace ThreeDCart\Api\Soap\Resource\Order;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class AffiliateInformation
 *
 * @package ThreeDCart\Api\Soap\Resource\Order
 */
class AffiliateInformation extends SoapResource
{
    /** @var string */
    private $AffiliateID;
    /** @var float */
    private $AffiliateCommission;
    /** @var bool */
    private $AffiliateApproved;
    /** @var string */
    private $AffiliateApprovedreason;
    
    /**
     * @return string
     */
    public function getAffiliateID()
    {
        return $this->AffiliateID;
    }
    
    /**
     * @param string $AffiliateID
     */
    public function setAffiliateID($AffiliateID)
    {
        $this->AffiliateID = $AffiliateID;
    }
    
    /**
     * @return float
     */
    public function getAffiliateCommission()
    {
        return $this->AffiliateCommission;
    }
    
    /**
     * @param float $AffiliateCommission
     */
    public function setAffiliateCommission($AffiliateCommission)
    {
        $this->AffiliateCommission = $AffiliateCommission;
    }
    
    /**
     * @return bool
     */
    public function isAffiliateApproved()
    {
        return $this->AffiliateApproved;
    }
    
    /**
     * @param bool $AffiliateApproved
     */
    public function setAffiliateApproved($AffiliateApproved)
    {
        $this->AffiliateApproved = $AffiliateApproved;
    }
    
    /**
     * @return string
     */
    public function getAffiliateApprovedreason()
    {
        return $this->AffiliateApprovedreason;
    }
    
    /**
     * @param string $AffiliateApprovedreason
     */
    public function setAffiliateApprovedreason($AffiliateApprovedreason)
    {
        $this->AffiliateApprovedreason = $AffiliateApprovedreason;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitOrderAffiliateInformation($this);
    }
}
