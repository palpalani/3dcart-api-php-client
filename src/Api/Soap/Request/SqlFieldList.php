<?php

namespace ThreeDCart\Api\Soap\Request;

use ThreeDCart\Primitive\StringValueObject;

/**
 * Class SqlFieldList
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class SqlFieldList
{
    /** @var SqlField[] */
    private $list;
    
    public function __construct()
    {
        $this->list = [];
    }
    
    /**
     * @param SqlField $sqlField
     */
    public function addSqlField(SqlField $sqlField)
    {
        $this->list[] = $sqlField;
    }
    
    /**
     * @return SqlField[]
     */
    public function getList()
    {
        return $this->list;
    }
    
    /**
     * If the list is empty method will return wildcard string *
     *
     * @return StringValueObject
     */
    public function toString()
    {
        $fields = [];
        foreach ($this->list as $listEntry) {
            $fields[] = $listEntry->getName()->getStringValue();
        }
        
        if (empty($fields)) {
            return new StringValueObject('*');
        }
        
        return new StringValueObject(implode(', ', $fields));
    }
}
