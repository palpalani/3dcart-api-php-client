<?php

namespace ThreeDCart\Primitive;

/**
 * Class DateFormat
 *
 * @package ThreeDCart\Primitive
 */
class DateFormat extends Enum
{
    const AMERICAN_STANDARD = 'm/d/Y';
    const THREE_D_CART_API_DATE_FORMAT = self::AMERICAN_STANDARD;
    
    public static $allowedValues = [self::AMERICAN_STANDARD];
    
    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->getValue();
    }
}
