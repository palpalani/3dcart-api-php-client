<?php

namespace ThreeDCart\Api\Rest\Resource;

abstract class AbstractResource
{
    /** @var array(string, string) */
    protected static $lists = [];
    /** @var array(string, bool) string is the field name */
    protected static $objects = [];
    
    /**
     * @param array $properties
     *
     * @return AbstractResource
     */
    public static function fromArray(array $properties)
    {
        $self = new static();
        
        foreach ($properties as $field => $value) {
            if (isset(static::$lists[$field])) {
                $listClass = static::$lists[$field];
                /** @var AbstractResource $listClass */
                $self->{$field} = $listClass::fromList($value);

                continue;
            }
            
            if (isset(static::$objects[$field])) {
                $listClass = static::$objects[$field];
                /** @var AbstractResource $listClass */
                $self->{$field} = $listClass::fromArray($value);

                continue;
            }
            
            $self->{$field} = $value;
        }
        
        return $self;
    }
    
    /**
     * @param array $list
     *
     * @return AbstractResource[]
     */
    public static function fromList(array $list)
    {
        $resources = [];
        
        foreach ($list as $item) {
            $resources[] = self::fromArray($item);
        }
        
        return $resources;
    }
}
