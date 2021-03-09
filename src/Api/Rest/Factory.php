<?php

namespace ThreeDCart\Api\Rest;

use GuzzleHttp\Client;
use ThreeDCart\Api\Rest\Api\Service;
use ThreeDCart\Api\Rest\Api\Version;
use ThreeDCart\Api\Rest\Application\PrivateKey;
use ThreeDCart\Api\Rest\Request\Guzzle;
use ThreeDCart\Api\Rest\Service\Categories;
use ThreeDCart\Api\Rest\Service\CategoriesInterface;
use ThreeDCart\Api\Rest\Service\CustomerGroups;
use ThreeDCart\Api\Rest\Service\CustomerGroupsInterface;
use ThreeDCart\Api\Rest\Service\Customers;
use ThreeDCart\Api\Rest\Service\CustomersInterface;
use ThreeDCart\Api\Rest\Service\Orders;
use ThreeDCart\Api\Rest\Service\OrdersInterface;
use ThreeDCart\Api\Rest\Service\Products;
use ThreeDCart\Api\Rest\Service\ProductsInterface;
use ThreeDCart\Api\Rest\Shop\SecureUrl;
use ThreeDCart\Api\Rest\Shop\Token;

/**
 * Class Factory
 *
 * @package ThreeDCart\Api\Rest
 */
class Factory
{
    const THREEDCART_SOAP_API_URL = 'https://apirest.3dcart.com/3dCartWebAPI/';
    
    /**
     * @param PrivateKey $privateKey
     * @param Token      $token
     * @param SecureUrl  $secureUrl
     *
     * @return AuthenticationServiceInterface
     */
    public function getAuthenticationService(PrivateKey $privateKey, Token $token, SecureUrl $secureUrl)
    {
        return new AuthenticationService($privateKey, $token, $secureUrl);
    }
    
    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @param Version                        $apiVersion
     *
     * @return CustomersInterface
     */
    public function getCustomerService(AuthenticationServiceInterface $authenticationService, Version $apiVersion)
    {
        return new Customers(
            new Guzzle(
                new Client([
                    'base_uri' => self::THREEDCART_SOAP_API_URL . $apiVersion->getValue() . '/' . Service::CUSTOMERS
                        . '/',
                ]),
                $authenticationService
            )
        );
    }
    
    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @param Version                        $apiVersion
     *
     * @return CustomerGroupsInterface
     */
    public function getCustomerGroupService(AuthenticationServiceInterface $authenticationService, Version $apiVersion)
    {
        return new CustomerGroups(
            new Guzzle(
                new Client([
                    'base_uri' => self::THREEDCART_SOAP_API_URL . $apiVersion->getValue() . '/'
                        . Service::CUSTOMER_GROUPS
                        . '/',
                ]),
                $authenticationService
            )
        );
    }
    
    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @param Version                        $apiVersion
     *
     * @return CategoriesInterface
     */
    public function getCategoryService(AuthenticationServiceInterface $authenticationService, Version $apiVersion)
    {
        return new Categories(
            new Guzzle(
                new Client([
                    'base_uri' => self::THREEDCART_SOAP_API_URL . $apiVersion->getValue() . '/' . Service::CATEGORIES
                        . '/',
                ]),
                $authenticationService
            )
        );
    }
    
    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @param Version                        $apiVersion
     *
     * @return ProductsInterface
     */
    public function getProductService(AuthenticationServiceInterface $authenticationService, Version $apiVersion)
    {
        return new Products(
            new Guzzle(
                new Client([
                    'base_uri' => self::THREEDCART_SOAP_API_URL . $apiVersion->getValue() . '/' . Service::PRODUCTS
                        . '/',
                ]),
                $authenticationService
            )
        );
    }
    
    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @param Version                        $apiVersion
     *
     * @return OrdersInterface
     */
    public function getOrderService(AuthenticationServiceInterface $authenticationService, Version $apiVersion)
    {
        return new Orders(
            new Guzzle(
                new Client([
                    'base_uri' => self::THREEDCART_SOAP_API_URL . $apiVersion->getValue() . '/' . Service::ORDERS
                        . '/',
                ]),
                $authenticationService
            )
        );
    }
}
