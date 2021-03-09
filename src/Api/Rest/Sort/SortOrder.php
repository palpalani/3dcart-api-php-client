<?php

namespace ThreeDCart\Api\Rest\Sort;

use ThreeDCart\Primitive\Enum;

class SortOrder extends Enum
{
    const SORTING_DESC = 'desc';
    const SORTING_ASC = 'asc';
    
    public static $allowedValues = [self::SORTING_ASC, self::SORTING_DESC];
}
