<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\DateFormat;

/**
 * Class DateFormatTest
 *
 * @package tests\Unit\Primitive
 */
class DateFormatTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new DateFormat($value);
    }
    
    /**
     * @return array
     */
    public function provideNegativeCases()
    {
        return [
            'object' => [
                new \stdClass(),
            ],
            'double' => [
                3.4,
            ],
            'array' => [
                [],
            ],
            'null' => [
                null,
            ],
            'int' => [
                5,
            ],
            'int zero' => [
                0,
            ],
            'int one' => [
                1,
            ],
            'double #0' => [
                0.0,
            ],
            'double #1' => [
                1.0,
            ],
            'string #invalid' => [
                'invalid',
            ],
            'string #0' => [
                '0',
            ],
            'string #1' => [
                '1',
            ],
            'string #true' => [
                'true',
            ],
            'string #false' => [
                'false',
            ],
            'boolean #0' => [
                false,
            ],
            'boolean #1' => [
                true,
            ],
            'empty string' => [
                '',
            ],
        ];
    }
    
    /**
     * @param int   $expectedResult
     * @param mixed $value
     *
     * @dataProvider providePositiveCases
     */
    public function testPositiveCases($expectedResult, $value)
    {
        $dateFormat = new DateFormat($value);
        
        $this->assertEquals($expectedResult, $dateFormat->getValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            [
                DateFormat::AMERICAN_STANDARD,
                DateFormat::AMERICAN_STANDARD,
            ],
            
            [
                DateFormat::THREE_D_CART_API_DATE_FORMAT,
                DateFormat::THREE_D_CART_API_DATE_FORMAT,
            ],
        ];
    }
}
