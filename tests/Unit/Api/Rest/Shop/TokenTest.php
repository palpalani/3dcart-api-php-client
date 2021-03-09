<?php

namespace tests\Unit\Api\Rest\Shop;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Shop\Token;

class TokenTest extends ThreeDCartTestCase
{
    public function testGetter()
    {
        $subjectUnderTest = new Token('ab12c3');
        
        $this->assertEquals('ab12c3', $subjectUnderTest->getStringValue());
    }
    
    /**
     * @param mixed $value
     *
     * @dataProvider provideInvalidValues
     */
    public function testEmptyConstructorParameter($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new Token($value);
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
