<?php

namespace tests\Unit\Api\Rest\Service;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Request\RequestInterface;
use ThreeDCart\Api\Rest\Resource\Category;
use ThreeDCart\Api\Rest\Resource\Customer;
use ThreeDCart\Api\Rest\Resource\CustomerGroup;
use ThreeDCart\Api\Rest\Resource\Order;
use ThreeDCart\Api\Rest\Resource\Product;
use ThreeDCart\Api\Rest\Service\Categories;
use ThreeDCart\Api\Rest\Service\CustomerGroups;
use ThreeDCart\Api\Rest\Service\Customers;
use ThreeDCart\Api\Rest\Service\Orders;
use ThreeDCart\Api\Rest\Service\Products;
use ThreeDCart\Primitive\StringValueObject;

/**
 * @package tests\Unit\Api\Rest\Service
 */
class ServicesTest extends ThreeDCartTestCase
{
    /** @var RequestInterface|\PHPUnit_Framework_MockObject_MockObject */
    private $requestInterfaceMock;
    
    public function setUp()
    {
        $this->requestInterfaceMock = $this->getRequestInterfaceMock();
    }
    
    /**
     * @param string   $expectedObjectClass
     * @param array    $expectedValues
     * @param string   $serviceClass
     * @param string   $serviceMethod
     * @param object[] $methodParameters
     * @param string   $responseJson
     * @param string   $responseObjectFieldName
     *
     * @dataProvider provideServicesAndMethodsForResponseLists
     */
    public function testIsResponseProcessedCorrectForLists(
        $expectedObjectClass,
        $expectedValues,
        $serviceClass,
        $serviceMethod,
        array $methodParameters,
        $responseJson,
        $responseObjectFieldName
    ) {
        $this->requestInterfaceMock->method('send')->willReturn(
            new StringValueObject(
                $responseJson
            )
        );
        
        $subjectUnderTest = new $serviceClass(
            $this->requestInterfaceMock
        );
        
        $generatedObjects = $subjectUnderTest->{$serviceMethod}(
            ...$methodParameters
        );
        
        $this->assertInstanceOf($expectedObjectClass, $generatedObjects[0]);
        $this->assertInstanceOf($expectedObjectClass, $generatedObjects[1]);
        
        $this->assertEquals($expectedValues, [
            $generatedObjects[0]->{$responseObjectFieldName},
            $generatedObjects[1]->{$responseObjectFieldName},
        ]);
    }
    
    /**
     * @return array
     */
    public function provideServicesAndMethodsForResponseLists()
    {
        return [
            'Customer - getCustomers' => [
                Customer::class,
                [123, 234],
                Customers::class,
                'getCustomers',
                [
                    null,
                    null,
                    null,
                ],
                '[{"CustomerID" : 123}, {"CustomerID" : 234}]',
                'CustomerID',
            ],
            'Categories - getCategories' => [
                Category::class,
                [23, 45],
                Categories::class,
                'getCategories',
                [
                    null,
                    null,
                    null,
                ],
                '[{"CategoryID" : 23}, {"CategoryID" : 45}]',
                'CategoryID',
            ],
            'Product - getProducts' => [
                Product::class,
                ['MPNNUMBER11', 'MPNNUMBER12'],
                Products::class,
                'getProducts',
                [
                    null,
                    null,
                    null,
                ],
                '[{"MFGID" : "MPNNUMBER11"}, {"MFGID" : "MPNNUMBER12"}]',
                'MFGID',
            ],
            'CustomerGroups - getCustomerGroups' => [
                CustomerGroup::class,
                [1234, 321],
                CustomerGroups::class,
                'getCustomerGroups',
                [
                    null,
                    null,
                    null,
                ],
                '[{"CustomerGroupID" : 1234}, {"CustomerGroupID" : 321}]',
                'CustomerGroupID',
            ],
            'Orders - getOrders' => [
                Order::class,
                ['AB-', 'ABC-'],
                Orders::class,
                'getOrders',
                [
                    null,
                    null,
                    null,
                ],
                '[{"InvoiceNumberPrefix" : "AB-"}, {"InvoiceNumberPrefix" : "ABC-"}]',
                'InvoiceNumberPrefix',
            ],
        ];
    }
    
    /**
     * @return RequestInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getRequestInterfaceMock()
    {
        return $this->getMockBuilder(RequestInterface::class)->getMockForAbstractClass();
    }
}
