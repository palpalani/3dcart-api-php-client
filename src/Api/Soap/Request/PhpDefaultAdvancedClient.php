<?php

namespace ThreeDCart\Api\Soap\Request;

use ThreeDCart\Api\Soap\Response\Xml;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class PhpDefaultAdvancedClient
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class PhpDefaultAdvancedClient implements AdvancedClientInterface
{
    const THREEDCART_RUN_QUERY_RESULT_FIELD = 'runQueryResult';
    
    /** @var StringValueObject */
    private $threeDCartApiKey;
    /** @var StringValueObject */
    private $threeDCartStoreUrl;
    /** @var \SoapClient */
    private $soapClient;
    
    /**
     * @param \SoapClient       $soapClient
     * @param StringValueObject $threeDCartStoreUrl
     * @param StringValueObject $threeDCartApiKey
     */
    public function __construct(
        \SoapClient $soapClient,
        StringValueObject $threeDCartStoreUrl,
        StringValueObject $threeDCartApiKey
    ) {
        $this->soapClient = $soapClient;
        $this->threeDCartStoreUrl = $threeDCartStoreUrl;
        $this->threeDCartApiKey = $threeDCartApiKey;
    }
    
    public function runQuery(StringValueObject $sql, StringValueObject $callBackUrl = null)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $soapResponse = $this->soapClient->runQuery([
            'storeUrl' => $this->threeDCartStoreUrl->getStringValue(),
            'userKey' => $this->threeDCartApiKey->getStringValue(),
            'sqlStatement' => $sql->getStringValue(),
            'callBackURL' => is_null($callBackUrl) ? '' : $callBackUrl->getStringValue(),
        ]);
        
        $this->checkEmptyResponse($soapResponse, new StringValueObject(self::THREEDCART_RUN_QUERY_RESULT_FIELD));
        
        return new Xml(new StringValueObject($soapResponse->{self::THREEDCART_RUN_QUERY_RESULT_FIELD}->any));
    }
    
    /**
     * @param \stdClass         $response
     * @param StringValueObject $field
     *
     * @throws ResponseBodyEmptyException
     */
    public function checkEmptyResponse(\stdClass $response, StringValueObject $field)
    {
        if (empty($response) || empty($response->{$field->getStringValue()}->any)) {
            throw new ResponseBodyEmptyException('response body is empty', null);
        }
    }
}
