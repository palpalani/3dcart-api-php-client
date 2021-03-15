<?php

namespace tests\Unit\Api\Rest\Request;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Request\HttpParameter;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class HttpParameterTest
 *
 * @package tests\Unit\Api\Rest\Request
 */
class HttpParameterTest extends ThreeDCartTestCase
{
    /** @var HttpParameter */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = new HttpParameter(
            new StringValueObject('key'),
            new StringValueObject('value')
        );
    }

    public function testGetter()
    {
        $this->assertEquals(new StringValueObject('key'), $this->subjectUnderTest->getParameterKey());
        $this->assertEquals(new StringValueObject('value'), $this->subjectUnderTest->getParameterValue());
    }

    public function testSetter()
    {
        $this->subjectUnderTest->setParameterKey(new StringValueObject('new key'));
        $this->subjectUnderTest->setParameterValue(new StringValueObject('new value'));

        $this->assertEquals(new StringValueObject('new key'), $this->subjectUnderTest->getParameterKey());
        $this->assertEquals(new StringValueObject('new value'), $this->subjectUnderTest->getParameterValue());
    }
}
