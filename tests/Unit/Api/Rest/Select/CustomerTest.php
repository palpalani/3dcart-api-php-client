<?php

namespace tests\Unit\Api\Rest\Request;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Field\Customer;
use ThreeDCart\Api\Rest\Select\Select;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class CustomerTest
 *
 * @package tests\Unit\Api\Rest\Select
 */
class CustomerTest extends ThreeDCartTestCase
{
    /** @var Select */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = new Select(
            new Customer(Customer::BILLINGCITY)
        );
    }

    public function testGetter()
    {
        $this->assertEquals(
            new StringValueObject(Customer::BILLINGCITY),
            $this->subjectUnderTest->getField()
        );
    }
}
