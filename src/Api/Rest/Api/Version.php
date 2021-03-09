<?php

namespace ThreeDCart\Api\Rest\Api;

use ThreeDCart\Primitive\Enum;
use ThreeDCart\Primitive\StringValueObject;

class Version extends Enum
{
    const VERSION_1 = 'v1';
    
    public static $allowedValues = [self::VERSION_1];
    
    /**
     * @return StringValueObject
     */
    public function getStringValue()
    {
        return $this->getValue();
    }
}
