<?php

namespace ThreeDCart\Api\Rest\Sort;

use ThreeDCart\Primitive\StringValueObject;

interface OrderByInterface
{
    /**
     * @return StringValueObject
     */
    public function getOrderByField();
    
    /**
     * @return SortOrder
     */
    public function getSortOrder();
}
