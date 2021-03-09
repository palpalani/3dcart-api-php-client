<?php

namespace ThreeDCart\Primitive;

/**
 * @package ThreeDCart\Primitive
 */
class FloatValueObject
{
    /** @var float */
    private $value;
    
    /**
     * @param float $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (! is_int($value) && ! is_float($value) && ! is_string($value)) {
            throw new \InvalidArgumentException(
                'parameter $value is not of type int. type is ' . gettype($value)
            );
        }
        
        $floatValue = (float)$value;
        
        if (((String)$floatValue) != (String)$value) {
            throw new \InvalidArgumentException(
                'parameter $value is not of type int. type is ' . gettype($value)
            );
        }
        
        $this->value = $floatValue;
    }
    
    /**
     * @return int
     */
    public function getFloatValue()
    {
        return $this->value;
    }
    
    /**
     * @return string
     */
    public function getStringValue()
    {
        return (string)$this->value;
    }
}
