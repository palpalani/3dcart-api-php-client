<?php

namespace ThreeDCart\Api\Soap;

use ThreeDCart\Api\Soap\Request\PhpDefaultAdvancedClient as AdvancedPhpDefault;
use ThreeDCart\Api\Soap\Request\PhpDefaultClient;
use ThreeDCart\Api\Soap\Request\ResponseHandler;
use ThreeDCart\Api\Soap\Request\Xml\SimpleXmlExceptionRenderer;
use ThreeDCart\Api\Soap\Resource\ResourceParser;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class Factory
 *
 * @package ThreeDCart\Api\Soap
 */
class Factory
{
    /**
     * @param StringValueObject $threeDCartApiKey
     * @param StringValueObject $threeDCartStoreUrl
     *
     * @return Client
     */
    public function getApiClient(StringValueObject $threeDCartApiKey, StringValueObject $threeDCartStoreUrl)
    {
        $responseHandler = new ResponseHandler(new SimpleXmlExceptionRenderer());
        
        $soapClient = new \SoapClient(
            Client::THREEDCART_SOAP_API_URL . '?WSDL',
            [
                'cache_wsdl' => WSDL_CACHE_MEMORY,
                'soap_version' => SOAP_1_2,
            ]
        );
        
        return new Client(
            new PhpDefaultClient($soapClient, $responseHandler, $threeDCartStoreUrl, $threeDCartApiKey),
            $responseHandler,
            new ResourceParser()
        );
    }
    
    /**
     * @param StringValueObject $threeDCartApiKey
     * @param StringValueObject $threeDCartStoreUrl
     *
     * @return AdvancedClient
     */
    public function getAdvancedApiClient(StringValueObject $threeDCartApiKey, StringValueObject $threeDCartStoreUrl)
    {
        $soapClient = new \SoapClient(
            AdvancedClient::THREEDCART_SOAP_API_URL . '?WSDL',
            [
                'cache_wsdl' => WSDL_CACHE_MEMORY,
                'soap_version' => SOAP_1_2,
            ]
        );
        
        return new AdvancedClient(
            new AdvancedPhpDefault($soapClient, $threeDCartStoreUrl, $threeDCartApiKey),
            new ResponseHandler(new SimpleXmlExceptionRenderer())
        );
    }
}
