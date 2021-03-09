<?php

namespace ThreeDCart\Primitive;

/**
 * Class Enum
 *
 * @package ThreeDCart\Primitive
 */
abstract class Enum
{
    public static $allowedValues = [];
    
    /** @var mixed */
    private $value;
    
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (is_object($value)) {
            throw new \InvalidArgumentException(
                'passed a not valid argument of type: ' . gettype($value)
            );
        }
        
        if (! in_array($value, static::$allowedValues, true)) {
            throw new \InvalidArgumentException(
                'passed a not valid argument of type: ' . gettype($value)
            );
        }
        
        $this->value = $value;
    }
    
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
