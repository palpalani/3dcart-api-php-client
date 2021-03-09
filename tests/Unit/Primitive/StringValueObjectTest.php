<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class StringValueObjectTest
 *
 * @package tests\Unit\Primitive
 */
class StringValueObjectTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new StringValueObject($value);
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
            'boolean #0' => [
                false,
            ],
            'boolean #1' => [
                true,
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
        $string = new StringValueObject($value);
        
        $this->assertEquals($expectedResult, $string->getStringValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            'string #valid' => [
                'valid argument',
                'valid argument',
            ],
            'string #number #1' => [
                '5',
                '5',
            ],
            'empty string' => [
                '',
                '',
            ],
        ];
    }
}
