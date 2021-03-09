<?php

namespace tests\Unit\Api\Rest\Sort;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Sort\OrderByInterface;
use ThreeDCart\Api\Rest\Sort\SortList;
use ThreeDCart\Api\Rest\Sort\SortOrder;
use ThreeDCart\Primitive\StringValueObject;

/**
 * @package tests\Unit\Api\Rest\Sort
 */
class SortListTest extends ThreeDCartTestCase
{
    /** @var SortList */
    private $subjectUnderTest;
    
    public function setup()
    {
        $this->subjectUnderTest = new SortList();
    }
    
    public function testGenerationOfQueryStringOneEntry()
    {
        $this->subjectUnderTest->addOrderBy($this->getOrderByInterfaceMock(
            new StringValueObject('test'),
            new SortOrder(SortOrder::SORTING_ASC)
        ));
        
        $this->assertEquals(new StringValueObject('test asc'), $this->subjectUnderTest->getQueryString());
    }
    
    public function testGenerationOfQueryStringTwoEntries()
    {
        $this->subjectUnderTest->addOrderBy($this->getOrderByInterfaceMock(
            new StringValueObject('first_order_by'),
            new SortOrder(SortOrder::SORTING_ASC)
        ));
        
        $this->subjectUnderTest->addOrderBy($this->getOrderByInterfaceMock(
            new StringValueObject('second_order_by'),
            new SortOrder(SortOrder::SORTING_DESC)
        ));
        
        $this->assertEquals(
            new StringValueObject('first_order_by asc,second_order_by desc'),
            $this->subjectUnderTest->getQueryString()
        );
    }
    
    /**
     * @param StringValueObject $field
     * @param SortOrder         $sortOrder
     *
     * @return OrderByInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getOrderByInterfaceMock(StringValueObject $field, SortOrder $sortOrder)
    {
        /** @var OrderByInterface $sortOrderBy */
        $orderByInterfaceMock = $this->getMockBuilder(OrderByInterface::class)
                                     ->setConstructorArgs([
                                         $field,
                                         $sortOrder,
                                     ])
                                     ->getMockForAbstractClass();
        $orderByInterfaceMock->method('getOrderByField')->willReturn($field);
        $orderByInterfaceMock->method('getSortOrder')->willReturn($sortOrder);
        
        return $orderByInterfaceMock;
    }
}
