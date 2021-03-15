<?php

namespace ThreeDCart\Primitive;

/**
 * Class IntegerValueObject
 *
 * @package ThreeDCart\Primitive
 */
class IntegerValueObject
{
    /** @var int */
    private $value;

    /**
     * @param int|string $value
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

        $intValue = (int)$value;

        if (((String)$intValue) != (String)$value) {
            throw new \InvalidArgumentException(
                'parameter $value is not of type int. type is ' . gettype($value)
            );
        }

        $this->value = $intValue;
    }

    /**
     * @return int
     */
    public function getIntValue()
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
