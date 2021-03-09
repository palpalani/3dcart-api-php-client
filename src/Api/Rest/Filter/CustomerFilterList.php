<?php

namespace ThreeDCart\Api\Rest\Filter;

use ThreeDCart\Api\Rest\Filter\Customer\Limit;
use ThreeDCart\Primitive\BooleanValueObject;
use ThreeDCart\Primitive\StringValueObject;
use ThreeDCart\Primitive\UnsignedIntegerValueObject;

/**
 * @package ThreeDCart\Api\Rest\Filter
 */
class CustomerFilterList extends AbstractFilterList implements CustomerFilterListInterface
{
    const FILTER_LIMIT = 'limit';
    const FILTER_OFFSET = 'offset';
    const FILTER_EMAIL = 'email';
    const FILTER_FIRSTNAME = 'firstname';
    const FILTER_LASTNAME = 'lastname';
    const FILTER_COUNTRY = 'country';
    const FILTER_STATE = 'state';
    const FILTER_CITY = 'city';
    const FILTER_PHONE = 'phone';
    const FILTER_COUNTONLY = 'countronly';
    const FILTER_LASTUPDATESTART = 'lastupdatestart';
    const FILTER_LASTUPDATEEND = 'lastupdateend';
    
    public static $filter = [
        self::FILTER_LIMIT,
        self::FILTER_OFFSET,
        self::FILTER_EMAIL,
        self::FILTER_FIRSTNAME,
        self::FILTER_LASTNAME,
        self::FILTER_COUNTRY,
        self::FILTER_STATE,
        self::FILTER_CITY,
        self::FILTER_PHONE,
        self::FILTER_COUNTONLY,
        self::FILTER_LASTUPDATESTART,
        self::FILTER_LASTUPDATEEND,
    ];
    
    public function filterLimit(Limit $limit)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LIMIT),
            new StringValueObject($limit->getStringValue())
        );
    }
    
    public function filterOffset(UnsignedIntegerValueObject $offset)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_OFFSET),
            new StringValueObject((string)$offset->getIntValue())
        );
    }
    
    public function filterCountOnly(BooleanValueObject $countOnly)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_COUNTONLY),
            new StringValueObject((string)(int)$countOnly->getBoolValue())
        );
    }
    
    public function filterEmail(StringValueObject $email)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_EMAIL),
            $email
        );
    }
    
    public function filterFirstName(StringValueObject $firstName)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_FIRSTNAME),
            $firstName
        );
    }
    
    public function filterLastName(StringValueObject $lastName)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LASTNAME),
            $lastName
        );
    }
    
    public function filterCountry(StringValueObject $country)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_COUNTRY),
            $country
        );
    }
    
    public function filterState(StringValueObject $state)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_STATE),
            $state
        );
    }
    
    public function filterCity(StringValueObject $city)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_CITY),
            $city
        );
    }
    
    public function filterPhone(StringValueObject $phone)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_PHONE),
            $phone
        );
    }
    
    public function filterLastUpdateStart(StringValueObject $lastUpdateStart)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LASTUPDATESTART),
            $lastUpdateStart
        );
    }
    
    public function filterLastUpdateEnd(StringValueObject $lastUpdateEnd)
    {
        $this->addFilter(
            new StringValueObject(self::FILTER_LASTUPDATEEND),
            $lastUpdateEnd
        );
    }
}
