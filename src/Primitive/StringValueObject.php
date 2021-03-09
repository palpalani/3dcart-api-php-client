<?php

namespace ThreeDCart\Primitive;

/**
 * Class StringValueObject
 *
 * @package ThreeDCart\Primitive
 */
class StringValueObject
{
    /** @var string */
    private $value;
    
    /**
     * @param string $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        $this->validate($value);
        
        $this->value = $value;
    }
    
    /**
     * @param string $value
     */
    protected function validate($value)
    {
        if (! is_string($value)) {
            throw new \InvalidArgumentException(
                'parameter $value is not of type string. type is ' . gettype($value)
            );
        }
    }
    
    /**
     * @return string
     */
    public function getStringValue()
    {
        return $this->value;
    }
}
