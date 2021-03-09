<?php

namespace ThreeDCart\Api\Rest\Request;

use ThreeDCart\Primitive\IntegerValueObject;
use ThreeDCart\Primitive\StringValueObject;

class RequestException extends \Exception
{
    /** @var IntegerValueObject|null */
    private $httpStatusCode;
    /** @var StringValueObject|null */
    private $responseBody;
    
    /**
     * @param StringValueObject|null  $message
     * @param IntegerValueObject|null $code
     * @param IntegerValueObject|null $httpStatusCode
     * @param StringValueObject|null  $responseBody
     */
    public function __construct(
        StringValueObject $message = null,
        IntegerValueObject $code = null,
        StringValueObject $responseBody = null,
        IntegerValueObject $httpStatusCode = null
    ) {
        parent::__construct(
            empty($message) ? '' : $message->getStringValue(),
            empty($code) ? 0 : $code->getIntValue()
        );
        
        $this->httpStatusCode = $httpStatusCode;
        $this->responseBody = $responseBody;
    }
    
    /**
     * @return null|IntegerValueObject
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
    
    /**
     * @return null|StringValueObject
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
