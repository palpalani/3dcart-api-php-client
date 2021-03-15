<?php

namespace tests\Integration\Api\Rest\Service;

use GuzzleHttp\Client;
use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Rest\Api\Service;
use ThreeDCart\Api\Rest\Application\PrivateKey;
use ThreeDCart\Api\Rest\AuthenticationService;
use ThreeDCart\Api\Rest\AuthenticationServiceInterface;
use ThreeDCart\Api\Rest\Factory;
use ThreeDCart\Api\Rest\Request\Guzzle;
use ThreeDCart\Api\Rest\Resource\Category;
use ThreeDCart\Api\Rest\Resource\Customer;
use ThreeDCart\Api\Rest\Resource\Product;
use ThreeDCart\Api\Rest\Service\Categories;
use ThreeDCart\Api\Rest\Service\Customers;
use ThreeDCart\Api\Rest\Service\Products;
use ThreeDCart\Api\Rest\Shop\SecureUrl;
use ThreeDCart\Api\Rest\Shop\Token;

/**
 * @package tests\Unit\Api\Rest\Service
 */
class ServicesTest extends ThreeDCartTestCase
{
    /** @var AuthenticationServiceInterface */
    private $authenticationService;

    public function setUp(): void
    {
        $credentials = [];

        include(__DIR__ . '/../../../../../integration_credentials.php');

        $this->authenticationService = new AuthenticationService(
            new PrivateKey($credentials['privateKey']),
            new Token($credentials['token']),
            new SecureUrl($credentials['secureUrl'])
        );
    }

    /**
     * @param string   $expectedObjectClass
     * @param string   $serviceClass
     * @param string   $serviceMethod
     * @param object[] $methodParameters
     *
     * @dataProvider provideServicesAndMethodsForResponseList
     */
    public function testIsResponseCorrect(
        $expectedObjectClass,
        $serviceClass,
        $serviceMethod,
        array $methodParameters
    ) {
        $subjectUnderTest = new $serviceClass(
            new Guzzle(
                new Client([
                    'base_uri' => Factory::THREEDCART_SOAP_API_URL . 'v1/' . Service::PRODUCTS
                        . '/',
                ]),
                $this->authenticationService
            )
        );
        $generatedObjects = $subjectUnderTest->{$serviceMethod}(
            ...$methodParameters
        );

        foreach ($generatedObjects as $generatedObject) {
            $this->assertInstanceOf($expectedObjectClass, $generatedObject);
        }
    }

    /**
     * @return array
     */
    public function provideServicesAndMethodsForResponseList()
    {
        return [
            'Customer - getCustomers' => [
                Customer::class,
                Customers::class,
                'getCustomers',
                [
                    null,
                    null,
                    null,
                ],
            ],
            'Categories - getCategories' => [
                Category::class,
                Categories::class,
                'getCategories',
                [
                    null,
                    null,
                    null,
                ],
            ],
            'Product - getProducts' => [
                Product::class,
                Products::class,
                'getProducts',
                [
                    null,
                    null,
                    null,
                ],
            ],
        ];
    }
}
