<?php

namespace ThreeDCart\Api\Soap\Parameter;

use ThreeDCart\Primitive\StringValueObject;

/**
 * Class CallBackUrl
 *
 * @package ThreeDCart\Api\Soap\Parameter
 */
class CallBackUrl extends StringValueObject
{
    /**
     * @param int $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        parent::__construct($value);
        
        if (! empty($value) && filter_var($this->getStringValue(), FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('passed $value is not a valid url: ' . $value);
        }
    }
}
