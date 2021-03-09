<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * Class UnsignedIntegerValueObjectTest
 *
 * @package tests\Unit\Primitive
 */
class UnsignedIntegerValueObjectTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new UnsignedIntegerValueObject($value, true);
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
            'non valid double' => [
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
            'negative int' => [
                -1,
            ],
            'negative double' => [
                -1.0,
            ],
            'negative string #number' => [
                '-1',
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
        $int = new UnsignedIntegerValueObject($value, true);
        
        $this->assertEquals($expectedResult, $int->getIntValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            'positive int' => [
                5,
                5,
            ],
            'positive double' => [
                3,
                3.0,
            ],
            'positive string #number' => [
                5,
                '5',
            ],
            'positive string zero #2' => [
                0,
                '0',
            ],
            'positive string double' => [
                3,
                '3.0',
            ],
            'negative int zero' => [
                0,
                -0,
            ],
        ];
    }
    
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeZeroNotAllowedCases
     */
    public function testNegativeZeroNotAllowedCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new UnsignedIntegerValueObject($value, false);
    }
    
    public function provideNegativeZeroNotAllowedCases()
    {
        return [
            'int zero' => [
                0,
            ],
            'double zero' => [
                0.0,
            ],
        ];
    }
}
