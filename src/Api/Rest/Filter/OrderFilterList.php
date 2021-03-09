<?php

namespace ThreeDCart\Api\Rest\Filter;

use ThreeDCart\Api\Rest\Filter\Order\Limit;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * @package ThreeDCart\Api\Rest\Filter
 */
class OrderFilterList extends AbstractFilterList implements OrderFilterListInterface
{
    const FILTER_INVOICENUMBER = "invoicenumber";
    const FILTER_ORDERSTATUS = "orderstatus";
    const FILTER_DATESTART = "datestart";
    const FILTER_DATEEND = "dateend";
    const FILTER_LIMIT = "limit";
    const FILTER_OFFSET = "offset";
    const FILTER_COUNTONLY = "countonly";
    const FILTER_LASTUPDATESTART = "lastupdatestart";
    const FILTER_LASTUPDATEEND = "lastupdateend";
    
    public static $allowedValues = [
        self::FILTER_INVOICENUMBER,
        self::FILTER_ORDERSTATUS,
        self::FILTER_DATESTART,
        self::FILTER_DATEEND,
        self::FILTER_LIMIT,
        self::FILTER_OFFSET,
        self::FILTER_COUNTONLY,
        self::FILTER_LASTUPDATESTART,
        self::FILTER_LASTUPDATEEND,
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
    
    /**
     * @param IntegerValueObject $invoiceNumber
     */
    public function filterInvoiceNumber(IntegerValueObject $invoiceNumber)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_INVOICENUMBER),
            new StringValueObject((string)$invoiceNumber->getIntValue())
        );
    }
    
    /**
     * @param IntegerValueObject $orderStatus
     */
    public function filterOrderStatus(IntegerValueObject $orderStatus)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_ORDERSTATUS),
            new StringValueObject((string)$orderStatus->getIntValue())
        );
    }
    
    /**
     * @param StringValueObject $dateStart
     */
    public function filterDateStart(StringValueObject $dateStart)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_DATESTART),
            $dateStart
        );
    }
    
    /**
     * @param StringValueObject $dateEnd
     */
    public function filterDateEnd(StringValueObject $dateEnd)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_DATEEND),
            $dateEnd
        );
    }
    
    /**
     * @param BooleanValueObject $countOnly
     */
    public function filterCountOnly(BooleanValueObject $countOnly)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_COUNTONLY),
            new StringValueObject((string)$countOnly->getBoolValue())
        );
    }
    
    /**
     * @param StringValueObject $lastUpdateStart
     */
    public function filterLastUpdateStart(StringValueObject $lastUpdateStart)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LASTUPDATESTART),
            $lastUpdateStart
        );
    }
    
    /**
     * @param StringValueObject $lastUpdateEnd
     */
    public function filterLastUpdateEnd(StringValueObject $lastUpdateEnd)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LASTUPDATEEND),
            $lastUpdateEnd
        );
    }
}
