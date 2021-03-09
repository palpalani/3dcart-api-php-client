<?php

namespace tests\Unit\Api\Rest\Filter;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Filter\Customer\Limit;
use ThreeDCart\Api\Rest\Filter\CustomerFilterList;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\StringValueObject;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * Class CustomerFilterTest
 */
class CustomerFilterTest extends ThreeDCartTestCase
{
    /** @var CustomerFilterList */
    private $subjectUnderTest;
    
    public function setup()
    {
        $this->subjectUnderTest = new CustomerFilterList();
    }
    
    public function testSetFilterLimit()
    {
        $this->subjectUnderTest->filterLimit(new Limit(3));
        
        $httpPostList = $this->subjectUnderTest->getHttpParameterList();
        
        $this->assertEquals(1, $httpPostList->count()->getIntValue());
    }
    
    public function testSetFilterCountOnly()
    {
        $this->subjectUnderTest->filterCountOnly(new BooleanValueObject(true));
        
        $httpPostList = $this->subjectUnderTest->getHttpParameterList();
        
        $this->assertEquals([CustomerFilterList::FILTER_COUNTONLY => true], $httpPostList->getSimpleParameterArray());
    }
    
    public function testMultipleFilter()
    {
        $this->subjectUnderTest->filterCountOnly(new BooleanValueObject(true));
        $this->subjectUnderTest->filterLimit(new Limit(2));
        
        $httpPostList = $this->subjectUnderTest->getHttpParameterList();
        
        $this->assertEquals([
            CustomerFilterList::FILTER_COUNTONLY => true,
            CustomerFilterList::FILTER_LIMIT => 2,
        ], $httpPostList->getSimpleParameterArray());
    }
    
    /**
     * @param array  $expectedResult
     * @param string $method
     * @param mixed  $parameterValue
     *
     * @dataProvider provideFilterCases
     */
    public function testAllFilter($expectedResult, $method, $parameterValue)
    {
        $this->subjectUnderTest->{$method}($parameterValue);
        
        $httpPostList = $this->subjectUnderTest->getHttpParameterList();
        
        $this->assertEquals($expectedResult, $httpPostList->getSimpleParameterArray());
    }
    
    /**
     * @return array
     */
    public function provideFilterCases()
    {
        return [
            'limit' => [
                [CustomerFilterList::FILTER_LIMIT => 3],
                'filterLimit',
                new Limit(3),
            ],
            'offset' => [
                [CustomerFilterList::FILTER_OFFSET => 4],
                'filterOffset',
                new UnsignedIntegerValueObject(4),
            ],
            'email' => [
                [CustomerFilterList::FILTER_EMAIL => 'test'],
                'filterEmail',
                new StringValueObject('test'),
            ],
            'firstname' => [
                [CustomerFilterList::FILTER_FIRSTNAME => 'test'],
                'filterFirstName',
                new StringValueObject('test'),
            ],
            'lastname' => [
                [CustomerFilterList::FILTER_LASTNAME => 'test'],
                'filterLastName',
                new StringValueObject('test'),
            ],
            'country' => [
                [CustomerFilterList::FILTER_COUNTRY => 'test'],
                'filterCountry',
                new StringValueObject('test'),
            ],
            'state' => [
                [CustomerFilterList::FILTER_STATE => 'test'],
                'filterState',
                new StringValueObject('test'),
            ],
            'city' => [
                [CustomerFilterList::FILTER_CITY => 'test'],
                'filterCity',
                new StringValueObject('test'),
            ],
            'phone' => [
                [CustomerFilterList::FILTER_PHONE => 'test'],
                'filterPhone',
                new StringValueObject('test'),
            ],
            'countonly false' => [
                [CustomerFilterList::FILTER_COUNTONLY => 0],
                'filterCountOnly',
                new BooleanValueObject(false),
            ],
            'countonly true' => [
                [CustomerFilterList::FILTER_COUNTONLY => 1],
                'filterCountOnly',
                new BooleanValueObject(true),
            ],
            'lastupdatestart' => [
                [CustomerFilterList::FILTER_LASTUPDATESTART => 'test'],
                'filterLastUpdateStart',
                new StringValueObject('test'),
            ],
            'lastupdateend' => [
                [CustomerFilterList::FILTER_LASTUPDATEEND => 'test'],
                'filterLastUpdateEnd',
                new StringValueObject('test'),
            ],
        ];
    }
    
    public function testIsEmpty()
    {
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
        $this->subjectUnderTest->filterEmail(new StringValueObject('test'));
        $this->assertEquals(false, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }
    
    public function testCount()
    {
        $this->assertEquals(0, $this->subjectUnderTest->count()->getIntValue());
        $this->subjectUnderTest->filterEmail(new StringValueObject('test'));
        $this->assertEquals(1, $this->subjectUnderTest->count()->getIntValue());
    }
    
    public function testClear()
    {
        $this->subjectUnderTest->filterEmail(new StringValueObject('test'));
        $this->subjectUnderTest->clear();
        $this->assertEquals(true, $this->subjectUnderTest->isEmpty()->getBoolValue());
    }
}
