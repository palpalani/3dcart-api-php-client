<?php

namespace tests\Unit\Api\Rest\Resource;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Resource\AbstractResource;
use ThreeDCart\Api\Rest\Resource\Category;
use ThreeDCart\Api\Rest\Resource\Customer;
use ThreeDCart\Api\Rest\Resource\CustomerGroup;
use ThreeDCart\Api\Rest\Resource\Order;
use ThreeDCart\Api\Rest\Resource\Product;

class AbstractResourceTest extends ThreeDCartTestCase
{
    /** @var AbstractResource */
    private $subjectUnderTest;
    
    public function setUp()
    {
        $this->subjectUnderTest = $this->getMockBuilder(AbstractResource::class)->getMockForAbstractClass();
    }
    
    /**
     * @param string $expectedResourceClass
     * @param string $jsonData
     *
     * @dataProvider provideResourcesForCreateResource
     */
    public function testCreateResource($expectedResourceClass, $jsonData)
    {
        /** @var AbstractResource $expectedResourceClass */
        $resourceClass = $expectedResourceClass::fromArray(json_decode($jsonData, true));
        
        $this->assertEquals($expectedResourceClass, get_class($resourceClass));
    }
    
    /**
     * @return array
     */
    public function provideResourcesForCreateResource()
    {
        return [
            'customer resource' => [
                Customer::class,
                $this->loadMock('getCustomer', 'response.json'),
            ],
            'category resource' => [
                Category::class,
                $this->loadMock('getCategory', 'response.json'),
            ],
            'product resource' => [
                Product::class,
                $this->loadMock('getProduct', 'response.json'),
            ],
            'customer group resource' => [
                CustomerGroup::class,
                $this->loadMock('getCustomerGroup', 'response.json'),
            ],
            'order resource' => [
                Order::class,
                $this->loadMock('getOrder', 'response.json'),
            ],
        ];
    }
    
    /**
     * @param string $expectedResourceClass
     * @param string $jsonData
     *
     * @dataProvider provideResourcesForCreateResources
     */
    public function testCreateResources($expectedResourceClass, $jsonData)
    {
        /** @var AbstractResource $expectedResourceClass */
        $resources = $expectedResourceClass::fromList(json_decode($jsonData, true));
        
        foreach ($resources as $resource) {
            $this->assertEquals($expectedResourceClass, get_class($resource));
        }
    }
    
    /**
     * @return array
     */
    public function provideResourcesForCreateResources()
    {
        return [
            'customer resources' => [
                Customer::class,
                $this->loadMock('getCustomers', 'response.json'),
            ],
            'category resources' => [
                Category::class,
                $this->loadMock('getCategories', 'response.json'),
            ],
            'product resources' => [
                Product::class,
                $this->loadMock('getProducts', 'response.json'),
            ],
            'customer group resources' => [
                CustomerGroup::class,
                $this->loadMock('getCustomerGroups', 'response.json'),
            ],
            'order resources' => [
                Order::class,
                $this->loadMock('getOrders', 'response.json'),
            ],
        ];
    }
}
