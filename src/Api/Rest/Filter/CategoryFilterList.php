<?php

namespace ThreeDCart\Api\Rest\Filter;

use ThreeDCart\Api\Rest\Filter\Category\Limit;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\StringValueObject;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * @package ThreeDCart\Api\Rest\Filter
 */
class CategoryFilterList extends AbstractFilterList implements CategoryFilterListInterface
{
    const FILTER_LIMIT = "limit";
    const FILTER_OFFSET = "offset";
    const FILTER_CATEGORYNAME = "category";
    const FILTER_COUNTONLY = "countonly";
    
    public static $filter = [
        self::FILTER_LIMIT,
        self::FILTER_OFFSET,
        self::FILTER_CATEGORYNAME,
        self::FILTER_COUNTONLY,
    ];
    
    public function filterLimit(Limit $limit)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LIMIT),
            new StringValueObject((string)$limit->getIntValue())
        );
    }
    
    public function filterOffset(UnsignedIntegerValueObject $offset)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_OFFSET),
            new StringValueObject((string)$offset->getIntValue())
        );
    }
    
    public function filterCategory(StringValueObject $categoryName)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_CATEGORYNAME),
            new StringValueObject((string)$categoryName->getStringValue())
        );
    }
    
    public function filterCountOnly(BooleanValueObject $countOnly)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_CATEGORYNAME),
            new StringValueObject((string)$countOnly->getBoolValue())
        );
    }
}
