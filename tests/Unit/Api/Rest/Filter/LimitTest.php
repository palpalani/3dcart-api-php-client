<?php

namespace tests\Unit\Api\Rest\Filter;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Filter\Customer\Limit;

class LimitTest extends ThreeDCartTestCase
{
    /**
     * @param int $unsignedIntegerValueObject
     *
     * @dataProvider provideWrongLimitCases
     */
    public function testInvalidParameters($unsignedIntegerValueObject)
    {
        $this->expectException(\InvalidArgumentException::class);
        new Limit($unsignedIntegerValueObject);
    }
    
    /**
     * @return array
     */
    public function provideWrongLimitCases()
    {
        return [
            'maximum limit exceeded' => [
                501,
            ],
        ];
    }
}
