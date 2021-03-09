<?php

namespace tests\Unit\Api\Rest\Shop;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Shop\SecureUrl;

class SecureUrlTest extends ThreeDCartTestCase
{
    public function testGetter()
    {
        $subjectUnderTest = new SecureUrl('https://myshop.3dcart.com');
        
        $this->assertEquals('https://myshop.3dcart.com', $subjectUnderTest->getStringValue());
    }
    
    /**
     * @param mixed $value
     *
     * @dataProvider provideInvalidValues
     */
    public function testEmptyConstructorParameter($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new SecureUrl($value);
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
