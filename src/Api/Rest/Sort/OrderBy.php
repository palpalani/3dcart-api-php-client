<?php

namespace ThreeDCart\Api\Rest\Sort;

use ThreeDCart\Api\Rest\Field\FieldInterface;
use ThreeDCart\Primitive\StringValueObject;

class OrderBy implements OrderByInterface
{
    const DEFAULT_SORT_ORDER = SortOrder::SORTING_ASC;
    
    /** @var SortOrder */
    protected $sortOrder;
    
    /** @var FieldInterface */
    protected $orderBy;
    
    /**
     * @param FieldInterface $orderBy
     * @param SortOrder|null $sortOrder
     */
    public function __construct(FieldInterface $orderBy, SortOrder $sortOrder = null)
    {
        if ($sortOrder == null) {
            $sortOrder = new SortOrder(self::DEFAULT_SORT_ORDER);
        }
        
        $this->sortOrder = $sortOrder;
        $this->orderBy = $orderBy;
    }
    
    /**
     * @return StringValueObject
     */
    public function getOrderByField()
    {
        return $this->orderBy->getStringValueObject();
    }
    
    /**
     * @return SortOrder
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
