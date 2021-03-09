<?php

namespace tests\Unit\Primitive;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Primitive\IntegerValueObject;

/**
 * Class IntegerValueObjectTest
 *
 * @package tests\Unit\Primitive
 */
class IntegerValueObjectTest extends ThreeDCartTestCase
{
    /**
     * @param mixed $value
     *
     * @dataProvider provideNegativeCases
     */
    public function testNegativeCases($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        new IntegerValueObject($value);
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
        $int = new IntegerValueObject($value);
        
        $this->assertEquals($expectedResult, $int->getIntValue());
    }
    
    /**
     * @return array
     */
    public function providePositiveCases()
    {
        return [
            'int' => [
                5,
                5,
            ],
            'double' => [
                3,
                3.0,
            ],
            'string #number #1' => [
                5,
                '5',
            ],
            'string #number #2' => [
                0,
                '0',
            ],
            'string #number #3' => [
                3,
                '3.0',
            ],
        ];
    }
}
