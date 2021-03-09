<?php

namespace ThreeDCart\Api\Rest\Request;

use ThreeDCart\Primitive\StringValueObject;

class HttpParameter
{
    /** @var StringValueObject */
    private $key;
    
    /** @var StringValueObject */
    private $value;
    
    /**
     * @param StringValueObject $key
     * @param StringValueObject $value
     */
    public function __construct(StringValueObject $key, StringValueObject $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
    
    /**
     * @return StringValueObject
     */
    public function getParameterKey()
    {
        return $this->key;
    }
    
    /**
     * @param StringValueObject $key
     */
    public function setParameterKey($key)
    {
        $this->key = $key;
    }
    
    /**
     * @return StringValueObject
     */
    public function getParameterValue()
    {
        return $this->value;
    }
    
    /**
     * @param StringValueObject $value
     */
    public function setParameterValue($value)
    {
        $this->value = $value;
    }
}
