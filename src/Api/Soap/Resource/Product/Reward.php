<?php

namespace ThreeDCart\Api\Soap\Resource\Product;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class Reward
 *
 * @package ThreeDCart\Api\Soap\Resource\Product
 */
class Reward extends SoapResource
{
    /** @var float */
    private $RewardPoints;
    /** @var bool */
    private $RewardDisable;
    /** @var float */
    private $RewardRedeem;
    
    /**
     * @return float
     */
    public function getRewardPoints()
    {
        return $this->RewardPoints;
    }
    
    /**
     * @param float $RewardPoints
     */
    public function setRewardPoints($RewardPoints)
    {
        $this->RewardPoints = $RewardPoints;
    }
    
    /**
     * @return bool
     */
    public function isRewardDisable()
    {
        return $this->RewardDisable;
    }
    
    /**
     * @param bool $RewardDisable
     */
    public function setRewardDisable($RewardDisable)
    {
        $this->RewardDisable = $RewardDisable;
    }
    
    /**
     * @return float
     */
    public function getRewardRedeem()
    {
        return $this->RewardRedeem;
    }
    
    /**
     * @param float $RewardRedeem
     */
    public function setRewardRedeem($RewardRedeem)
    {
        $this->RewardRedeem = $RewardRedeem;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitProductReward($this);
    }
}
