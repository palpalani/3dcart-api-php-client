<?php

namespace ThreeDCart\Primitive;

/**
 * Class BooleanValueObject
 *
 * @package ThreeDCart\Primitive
 */
class BooleanValueObject
{
    /** @var bool */
    private $value;
    
    /**
     * @param bool $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (! is_bool($value)) {
            throw new \InvalidArgumentException(
                'parameter $value is not of type bool. type is ' . gettype($value)
            );
        }
        $this->value = $value;
    }
    
    /**
     * @return bool
     */
    public function getBoolValue()
    {
        return $this->value;
    }
}
