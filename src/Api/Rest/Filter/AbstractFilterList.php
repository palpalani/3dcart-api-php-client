<?php

namespace ThreeDCart\Api\Rest\Filter;

use ThreeDCart\Api\Rest\Request\HttpParameter;
use ThreeDCart\Api\Rest\Request\HttpParameterList;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * @package ThreeDCart\Api\Rest\Filter
 */
abstract class AbstractFilterList
{
    /** @var array this needs to be overwritten in the sub class */
    public static $filter = ['example'];
    
    /** @var [string, StringValueObject] */
    protected $list;
    
    public function __construct()
    {
        $this->list = [];
    }
    
    /**
     * @param StringValueObject $filterName
     * @param StringValueObject $filterValue
     */
    protected function addFilter(StringValueObject $filterName, StringValueObject $filterValue)
    {
        $this->list[$filterName->getStringValue()] = $filterValue;
    }
    
    /**
     * @return HttpParameterList
     */
    public function getHttpParameterList()
    {
        $httpPostList = new HttpParameterList();
        
        foreach ($this->list as $key => $value) {
            $httpPostList->addParameter(new HttpParameter(new StringValueObject($key), $value));
        }
        
        return $httpPostList;
    }
    
    public function clear()
    {
        $this->list = [];
    }
    
    /**
     * @return BooleanValueObject
     */
    public function isEmpty()
    {
        return new BooleanValueObject(empty($this->list));
    }
    
    /**
     * @return IntegerValueObject
     */
    public function count()
    {
        return new IntegerValueObject(count($this->list));
    }
}
