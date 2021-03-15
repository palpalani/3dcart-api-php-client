<?php

namespace tests\Unit\Api\Soap;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Soap\Parameter\BatchSize;
use ThreeDCart\Api\Soap\Parameter\CallBackUrl;
use ThreeDCart\Api\Soap\Parameter\CustomerAction;
use ThreeDCart\Api\Soap\Parameter\StartNum;
use ThreeDCart\Api\Soap\Request\PhpDefaultClient;
use ThreeDCart\Api\Soap\Request\ResponseBodyEmptyException;
use ThreeDCart\Api\Soap\Request\ResponseHandler;
use ThreeDCart\Api\Soap\Request\Xml\SimpleXmlExceptionRenderer;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class PhpDefaultClientTest
 *
 * @package tests\Unit\Api\Soap
 */
class PhpDefaultClientTest extends ThreeDCartTestCase
{
    /** @var PhpDefaultClient */
    private $subjectUnderTest;

    public function setup(): void
    {
        $this->subjectUnderTest = $this->getMockBuilder(PhpDefaultClient::class)
                                       ->setMethods(null)
                                       ->setConstructorArgs([
                                           $this->getMockFromWsdl($this->getRootPath() . 'soap-api'
                                               . DIRECTORY_SEPARATOR . 'wsdl' . DIRECTORY_SEPARATOR . 'api.wsdl'),
                                           new ResponseHandler(new SimpleXmlExceptionRenderer()),
                                           new StringValueObject(''),
                                           new StringValueObject(''),
                                       ])
                                       ->getMock()
        ;
    }

    /**
     * @param string $method
     * @param string $soapMethodName
     * @param array  $parameters
     *
     * @dataProvider provideMethods
     */
    public function testEmptyRequest($method, $soapMethodName, $parameters)
    {
        $this->subjectUnderTest->setSoapClient($this->getSoapClientEmptyResponse($soapMethodName));

        $this->expectException(ResponseBodyEmptyException::class);
        call_user_func_array([$this->subjectUnderTest, $method], $parameters);
    }

    /**
     * @return array
     */
    public function provideMethods()
    {
        $emptyStringValueObject = new StringValueObject('');

        return [
            [
                'getProduct',
                'getProduct',
                [
                    new BatchSize(100),
                    new StartNum(1),
                    $emptyStringValueObject,
                    new CallBackUrl(''),
                ],
            ],
            [
                'getCustomers',
                'getCustomer',
                [
                    new BatchSize(100),
                    new StartNum(1),
                    $emptyStringValueObject,
                    new CallBackUrl(''),
                ],
            ],
            [
                'getOrderStatus',
                'getOrderStatus',
                [
                    new StringValueObject('123'),
                    new CallBackUrl(''),
                ],
            ],
            [
                'getProductCount',
                'getProductCount',
                [
                    new CallBackUrl(''),
                ],
            ],
            [
                'getProductInventory',
                'getProductInventory',
                [
                    new StringValueObject('123'),
                    new CallBackUrl(''),
                ],
            ],
            [
                'getCustomerLoginToken',
                'getCustomerLoginToken',
                [
                    new StringValueObject('test@test.com'),
                    new IntegerValueObject(86400),
                    new CallBackUrl(''),
                ],
            ],
            [
                'getCustomerCount',
                'getCustomerCount',
                [
                    new CallBackUrl(''),
                ],
            ],
            [
                'getOrderCount',
                'getOrderCount',
                [
                    new BooleanValueObject(true),
                    $emptyStringValueObject,
                    $emptyStringValueObject,
                    null,
                    null,
                    null,
                ],
            ],
            [
                'getOrders',
                'getOrder',
                [
                    new BatchSize(100),
                    new StartNum(100),
                    new BooleanValueObject(true),
                    $emptyStringValueObject,
                    $emptyStringValueObject,
                    null,
                    null,
                    null,
                ],
            ],
            [
                'updateProductInventory',
                'updateProductInventory',
                [
                    new StringValueObject('1234'),
                    new IntegerValueObject(3),
                    new BooleanValueObject(true),
                    new CallBackUrl(''),
                ],
            ],
            [
                'updateOrderStatus',
                'updateOrderStatus',
                [
                    new StringValueObject('123'),
                    new StringValueObject('new status'),
                    new CallBackUrl(''),
                ],
            ],
            [
                'updateOrderShipment',
                'updateOrderShipment',
                [
                    new StringValueObject('1234'),
                    new StringValueObject('shipmentid'),
                    new StringValueObject('tracking'),
                    new \DateTime('2017-03-10'),
                    new CallBackUrl(''),
                ],
            ],
            [
                'editCustomer',
                'editCustomer',
                [
                    new StringValueObject(''),
                    new CustomerAction(CustomerAction::INSERT),
                    new CallBackUrl(''),
                ],
            ],
        ];
    }

    /**
     * @param string $method
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\SoapClient
     */
    private function getSoapClientEmptyResponse($method)
    {
        $soapClientMock = $this->getSoapClient();
        $soapClientMock->method($method)->willReturn(new \stdClass());

        return $soapClientMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject | \SoapClient
     */
    private function getSoapClient()
    {
        $soapClientMock = $this->getMockFromWsdl($this->getRootPath() . 'soap-api'
            . DIRECTORY_SEPARATOR . 'wsdl' . DIRECTORY_SEPARATOR . 'api.wsdl');

        return $soapClientMock;
    }
}
