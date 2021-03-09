<?php

namespace tests\Unit\Api\Rest\Application;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Application\PrivateKey;

class PrivateKeyTest extends ThreeDCartTestCase
{
    public function testGetter()
    {
        $subjectUnderTest = new PrivateKey('abc123');
        
        $this->assertEquals('abc123', $subjectUnderTest->getStringValue());
    }
    
    /**
     * @param mixed $value
     *
     * @dataProvider provideInvalidValues
     */
    public function testEmptyConstructorParameter($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new PrivateKey($value);
    }
    
    public function provideInvalidValues()
    {
        return [
            'empty string' => [
                '',
            ],
        ];
    }
}
