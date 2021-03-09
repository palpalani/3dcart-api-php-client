<?php

namespace ThreeDCart\Api\Rest;

use ThreeDCart\Api\Rest\Application\PrivateKey;
use ThreeDCart\Api\Rest\Authentication\HttpHeader;
use ThreeDCart\Api\Rest\Shop\SecureUrl;
use ThreeDCart\Api\Rest\Shop\Token;

/**
 * Class AuthenticationService
 *
 * @package ThreeDCart\Api\Rest
 */
class AuthenticationService implements AuthenticationServiceInterface
{
    const HTTP_HEADER_SECURE_URL = 'SecureUrl';
    const HTTP_HEADER_PRIVATE_KEY = 'PrivateKey';
    const HTTP_HEADER_TOKEN = 'Token';
    
    /** @var PrivateKey */
    private $privateKey;
    
    /** @var Token */
    private $token;
    
    /** @var SecureUrl */
    private $secureUrl;
    
    /**
     * @param PrivateKey $privateKey
     * @param Token      $token
     * @param SecureUrl  $secureUrl
     */
    public function __construct(PrivateKey $privateKey, Token $token, SecureUrl $secureUrl)
    {
        $this->privateKey = $privateKey;
        $this->token = $token;
        $this->secureUrl = $secureUrl;
    }
    
    /**
     * @return HttpHeader
     */
    public function getHttpHeaders()
    {
        return new HttpHeader([
            self::HTTP_HEADER_SECURE_URL => $this->secureUrl->getStringValue(),
            self::HTTP_HEADER_PRIVATE_KEY => $this->privateKey->getStringValue(),
            self::HTTP_HEADER_TOKEN => $this->token->getStringValue(),
        ]);
    }
}
