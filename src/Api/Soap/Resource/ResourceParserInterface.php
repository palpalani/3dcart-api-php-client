<?php

namespace ThreeDCart\Api\Soap\Resource;

use ThreeDCart\Primitive\ArrayValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Interface ResourceParserInterface
 *
 * @package ThreeDCart\Api\Soap\Resource
 */
interface ResourceParserInterface
{
    /**
     * @param StringValueObject $className
     * @param ArrayValueObject  $resourceObjectData
     *
     * @return SoapResource
     *
     * @throws ParseException
     */
    public function getResource(StringValueObject $className, ArrayValueObject $resourceObjectData);
    
    /**
     * @param StringValueObject $className
     * @param ArrayValueObject  $resourcesData
     *
     * @return SoapResource[]
     *
     * @throws ParseException
     */
    public function getResources(StringValueObject $className, ArrayValueObject $resourcesData);
}
