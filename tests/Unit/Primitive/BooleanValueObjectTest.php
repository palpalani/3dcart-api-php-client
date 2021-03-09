<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\BooleanValueObject;

/**
 * Class BooleanValueObjectTest
 *
 * @package tests\Unit\Primitive
 */
class BooleanValueObjectTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new BooleanValueObject($value);
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
        $boolean = new BooleanValueObject($value);
        
        $this->assertEquals($expectedResult, $boolean->getBoolValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            'boolean #0' => [
                false,
                false,
            ],
            'boolean #1' => [
                true,
                true,
            ],
        ];
    }
}
