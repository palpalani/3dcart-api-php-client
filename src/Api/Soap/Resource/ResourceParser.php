<?php

namespace ThreeDCart\Api\Soap\Resource;

use ThreeDCart\Primitive\ArrayValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class ResourceParser
 *
 * @package ThreeDCart\Api\Soap\Resource
 */
class ResourceParser implements ResourceParserInterface
{
    /**
     * @param StringValueObject $className
     * @param ArrayValueObject  $objectData
     *
     * @return SoapResource
     *
     * @throws ParseException
     */
    public function getResource(StringValueObject $className, ArrayValueObject $objectData)
    {
        if ($objectData->isEmpty()) {
            throw new ParseException('unable to create resource. data empty');
        }
        
        $class = $className->getStringValue();
        
        /** @var SoapResource $resource */
        $resource = new $class();
        $visitor = new ResourceParserVisitor($objectData);
        $resource->accept($visitor);
        
        return $resource;
    }
    
    /**
     * @param StringValueObject $className
     * @param ArrayValueObject  $resourcesData
     *
     * @return SoapResource[]
     *
     * @throws ParseException
     */
    public function getResources(StringValueObject $className, ArrayValueObject $resourcesData)
    {
        if ($resourcesData->isEmpty()) {
            throw new ParseException('unable to create resource. data empty');
        }
        
        $resources = [];
        foreach ($resourcesData->getValue() as $resourceData) {
            if (empty($resourceData)) {
                throw new ParseException('unable to create resource. data empty');
            }
            $resources[] = $this->getResource($className, new ArrayValueObject($resourceData));
        }
        
        return $resources;
    }
}
