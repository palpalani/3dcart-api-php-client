<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\FloatValueObject;

/**
 * Class IntegerValueObjectTest
 *
 * @package tests\Unit\Primitive
 */
class FloatValueObjectTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new FloatValueObject($value);
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
            'string #invalid' => [
                'invalid argument',
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
        $int = new FloatValueObject($value);
        
        $this->assertEquals($expectedResult, $int->getFloatValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            'int' => [
                5.0,
                5,
            ],
            'double' => [
                3.0,
                3.0,
            ],
            'precision double' => [
                3.4,
                3.4,
            ],
            'string without precision' => [
                5.0,
                '5',
            ],
            'string zero' => [
                0.0,
                '0',
            ],
            'string with precision' => [
                3.3,
                '3.3',
            ],
        ];
    }
}
