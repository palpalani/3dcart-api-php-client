<?php

namespace ThreeDCart\Api\Rest\Filter;

use ThreeDCart\Api\Rest\Filter\CustomerGroup\Limit;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\StringValueObject;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * @package ThreeDCart\Api\Rest\Filter
 */
class CustomerGroupFilterList extends AbstractFilterList implements CustomerGroupFilterListInterface
{
    const FILTER_LIMIT = "limit";
    const FILTER_OFFSET = "offset";
    const FILTER_COUNTONLY = "countonly";
    
    public static $filter = [
        self::FILTER_LIMIT,
        self::FILTER_OFFSET,
        self::FILTER_COUNTONLY,
    ];
    
    public function filterLimit(Limit $limit)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LIMIT),
            new StringValueObject($limit->getStringValue())
        );
    }
    
    public function filterOffset(UnsignedIntegerValueObject $offset)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_OFFSET),
            new StringValueObject((string)$offset->getIntValue())
        );
    }
    
    public function filterCountOnly(BooleanValueObject $countOnly)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_COUNTONLY),
            new StringValueObject((string)(int)$countOnly->getBoolValue())
        );
    }
}
