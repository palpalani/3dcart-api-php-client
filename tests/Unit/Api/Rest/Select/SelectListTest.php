<?php

namespace tests\Unit\Api\Rest\Request;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Select\SelectInterface;
use ThreeDCart\Api\Rest\Select\SelectList;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class SelectListTest
 *
 * @package tests\Unit\Api\Rest\Select
 */
class SelectListTest extends ThreeDCartTestCase
{
    /** @var SelectList */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = new SelectList();
    }

    public function testGenerationOfQueryStringOneEntry()
    {
        $this->subjectUnderTest->addSelect($this->createSelectInterfaceMock(new StringValueObject('test')));

        $this->assertEquals(new StringValueObject('test'), $this->subjectUnderTest->getQueryString());
    }

    public function testGenerationOfQueryStringTwoEntries()
    {
        $this->subjectUnderTest->addSelect($this->createSelectInterfaceMock(
            new StringValueObject('first select')
        ));
        $this->subjectUnderTest->addSelect($this->createSelectInterfaceMock(
            new StringValueObject('second select')
        ));

        $this->assertEquals(
            new StringValueObject('first select,second select'),
            $this->subjectUnderTest->getQueryString()
        );
    }

    /**
     * @param StringValueObject $selectValue
     *
     * @return SelectInterface
     */
    private function createSelectInterfaceMock(StringValueObject $selectValue)
    {
        /** @var SelectInterface|\PHPUnit_Framework_MockObject_MockObject $select */
        $select = $this->getMockBuilder(SelectInterface::class)
                       ->getMockForAbstractClass();
        $select->method('getField')->willReturn($selectValue);

        return $select;
    }
}
