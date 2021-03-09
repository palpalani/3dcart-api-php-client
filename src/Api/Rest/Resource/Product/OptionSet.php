<?php

namespace ThreeDCart\Api\Rest\Resource\Product;

use ThreeDCart\Api\Rest\Resource\AbstractResource;

/**
 * @package ThreeDCart\Api\Rest\Resource\Product
 *
 * @method static OptionSet fromArray(array $properties)
 * @method static OptionSet[] fromList(array $list)
 */
class OptionSet extends AbstractResource
{
    protected static $lists = [
        'OptionList' => Option::class,
    ];
    
    /** @var int */
    public $OptionSetID;
    
    /** @var string */
    public $OptionSetName;
    
    /** @var float */
    public $OptionSorting;
    
    /** @var bool */
    public $OptionRequired;
    
    /** @var string */
    public $OptionType;
    
    /** @var string */
    public $OptionURL;
    
    /** @var string */
    public $OptionAdditionalInformation;
    
    /** @var int */
    public $OptionSizeLimit;
    
    /** @var Option[] */
    public $OptionList;
}
