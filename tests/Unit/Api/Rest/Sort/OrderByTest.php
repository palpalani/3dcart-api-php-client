<?php

namespace tests\Unit\Api\Rest\Sort;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Field\FieldInterface;
use ThreeDCart\Api\Rest\Sort\OrderBy;
use ThreeDCart\Api\Rest\Sort\SortOrder;
use ThreeDCart\Primitive\StringValueObject;

/**
 * @package tests\Unit\Api\Rest\Sort
 */
class OrderByTest extends ThreeDCartTestCase
{
    /** @var OrderBy */
    private $subjectUnderTest;

    /** @var FieldInterface */
    private $fieldInterfaceMock;

    public function setup(): void
    {
        $this->fieldInterfaceMock = $this->getMockBuilder(FieldInterface::class)->getMockForAbstractClass();
        $this->fieldInterfaceMock->method('getStringValueObject')->willReturn(
            new StringValueObject('test')
        );

        $this->subjectUnderTest = new OrderBy(
            $this->fieldInterfaceMock,
            new SortOrder(SortOrder::SORTING_ASC)
        );
    }

    public function testGetter()
    {
        $this->assertEquals(new StringValueObject('test'), $this->subjectUnderTest->getOrderByField());
        $this->assertEquals(new SortOrder(SortOrder::SORTING_ASC), $this->subjectUnderTest->getSortOrder());
    }
}
