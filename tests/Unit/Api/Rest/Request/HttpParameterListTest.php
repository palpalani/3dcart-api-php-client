<?php

namespace tests\Unit\Api\Rest\Request;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Request\HttpParameter;
use ThreeDCart\Api\Rest\Request\HttpParameterList;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class HttpPostListTest
 *
 * @package tests\Unit\Api\Rest\Request
 */
class HttpParameterListTest extends ThreeDCartTestCase
{
    /** @var HttpParameterList */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = new HttpParameterList();
    }

    public function testCounting()
    {
        $this->assertEquals(0, $this->subjectUnderTest->count()->getIntValue());
        $this->subjectUnderTest->addParameter(
            new HttpParameter(
                new StringValueObject('testKey'),
                new StringValueObject('testValue')
            )
        );
        $this->assertEquals(1, $this->subjectUnderTest->count()->getIntValue());
    }

    public function testIsEmpty()
    {
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->subjectUnderTest->addParameter(
            new HttpParameter(
                new StringValueObject('testKey'),
                new StringValueObject('testValue')
            )
        );
        $this->assertEquals(false, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }

    public function testAddParameterAndGet()
    {
        $this->subjectUnderTest->addParameter(
            new HttpParameter(
                new StringValueObject('testKey'),
                new StringValueObject('testValue')
            )
        );

        $simpleArray = $this->subjectUnderTest->getSimpleParameterArray();

        $this->assertEquals(['testKey' => 'testValue'], $simpleArray);
    }

    public function testClear()
    {
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->subjectUnderTest->addParameter(
            new HttpParameter(
                new StringValueObject('testKey'),
                new StringValueObject('testValue')
            )
        );

        $this->assertEquals(false, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->subjectUnderTest->clear();
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }
}
