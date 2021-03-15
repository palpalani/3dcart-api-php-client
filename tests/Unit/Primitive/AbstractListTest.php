<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Request\HttpParameter;
use ThreeDCart\Primitive\AbstractList;
use ThreeDCart\Primitive\StringValueObject;

class AbstractListTest extends ThreeDCartTestCase
{
    /** @var AbstractList */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = $this->getMockBuilder(AbstractList::class)
                                       ->setMethods(null)
                                       ->getMock();
    }

    public function testCounting()
    {
        $this->assertEquals(0, $this->subjectUnderTest->count()->getIntValue());
        $this->invokeMethod(
            $this->subjectUnderTest,
            'addEntry',
            [
                new HttpParameter(
                    new StringValueObject('testKey'),
                    new StringValueObject('testValue')
                ),
            ]
        );
        $this->assertEquals(1, $this->subjectUnderTest->count()->getIntValue());
    }

    public function testIsEmpty()
    {
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->invokeMethod(
            $this->subjectUnderTest,
            'addEntry',
            [
                new HttpParameter(
                    new StringValueObject('testKey'),
                    new StringValueObject('testValue')
                ),
            ]
        );
        $this->assertEquals(false, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }

    public function testClear()
    {
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->invokeMethod(
            $this->subjectUnderTest,
            'addEntry',
            [
                new HttpParameter(
                    new StringValueObject('testKey'),
                    new StringValueObject('testValue')
                ),
            ]
        );

        $this->assertEquals(false, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->subjectUnderTest->clear();
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }
}
