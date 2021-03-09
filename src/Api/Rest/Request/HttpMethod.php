<?php

namespace ThreeDCart\Api\Rest\Request;

use ThreeDCart\Primitive\Enum;

class HttpMethod extends Enum
{
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_PUT = 'PUT';
    const HTTP_METHOD_DELETE = 'DELETE';
    
    public static $allowedValues = [
        self::HTTP_METHOD_GET,
        self::HTTP_METHOD_POST,
        self::HTTP_METHOD_PUT,
        self::HTTP_METHOD_DELETE,
    ];
    
    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getValue();
    }
}
