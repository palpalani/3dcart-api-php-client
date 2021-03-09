<?php

namespace ThreeDCart\Api\Soap\Resource\Customer;

use ThreeDCart\Api\Soap\Resource\SoapResource;
use ThreeDCart\Api\Soap\Resource\VisitorInterface;

/**
 * Class Customer
 *
 * @package ThreeDCart\Api\Soap\Resource\Customer
 */
class Customer extends SoapResource
{
    const EDIT_CUSTOMER_CONTACTID = 'contactid';
    const EDIT_CUSTOMER_COMMENTS = 'comments';
    const EDIT_CUSTOMER_LASTLOGINDATE = 'lastlogindate';
    const EDIT_CUSTOMER_WEBSITE = 'website';
    const EDIT_CUSTOMER_DISCOUNT = 'discount';
    const EDIT_CUSTOMER_ACCOUNTNO = 'accountno';
    const EDIT_CUSTOMER_MAILLIST = 'maillist';
    const EDIT_CUSTOMER_CUSTENABLED = 'custenabled';
    const EDIT_CUSTOMER_ALT_CONTACTID = 'alt_contactid';
    const EDIT_CUSTOMER_PASS = 'pass';
    
    const EDIT_CUSTOMER_BILLING_FIRSTNAME = 'billing_firstname';
    const EDIT_CUSTOMER_BILLING_LASTNAME = 'billing_lastname';
    const EDIT_CUSTOMER_BILLING_ADDRESS = 'billing_address';
    const EDIT_CUSTOMER_BILLING_ADDRESS2 = 'billing_address2';
    const EDIT_CUSTOMER_BILLING_CITY = 'billing_city';
    const EDIT_CUSTOMER_BILLING_STATE = 'billing_state';
    const EDIT_CUSTOMER_BILLING_ZIP = 'billing_zip';
    const EDIT_CUSTOMER_BILLING_COUNTRY = 'billing_country';
    const EDIT_CUSTOMER_BILLING_COMPANY = 'billing_company';
    const EDIT_CUSTOMER_BILLING_PHONE = 'billing_phone';
    const EDIT_CUSTOMER_EMAIL = 'email';
    
    const EDIT_CUSTOMER_SHIPPING_FIRSTNAME = 'shipping_firstname';
    const EDIT_CUSTOMER_SHIPPING_LASTNAME = 'shipping_lastname';
    const EDIT_CUSTOMER_SHIPPING_ADDRESS = 'shipping_address';
    const EDIT_CUSTOMER_SHIPPING_ADDRESS2 = 'shipping_address2';
    const EDIT_CUSTOMER_SHIPPING_CITY = 'shipping_city';
    const EDIT_CUSTOMER_SHIPPING_STATE = 'shipping_state';
    const EDIT_CUSTOMER_SHIPPING_ZIP = 'shipping_zip';
    const EDIT_CUSTOMER_SHIPPING_COUNTRY = 'shipping_country';
    const EDIT_CUSTOMER_SHIPPING_COMPANY = 'shipping_company';
    const EDIT_CUSTOMER_SHIPPING_PHONE = 'shipping_phone';
    
    public static $editCustomerMapping = [
        self::EDIT_CUSTOMER_CONTACTID => 'CustomerID',
        self::EDIT_CUSTOMER_COMMENTS => 'Comments',
        self::EDIT_CUSTOMER_LASTLOGINDATE => 'LastLoginDate',
        self::EDIT_CUSTOMER_WEBSITE => 'WebSite',
        self::EDIT_CUSTOMER_DISCOUNT => 'DiscountGroup',
        self::EDIT_CUSTOMER_ACCOUNTNO => 'AccountNumber',
        self::EDIT_CUSTOMER_MAILLIST => 'MailList',
        self::EDIT_CUSTOMER_CUSTENABLED => 'CustEnabled',
        self::EDIT_CUSTOMER_ALT_CONTACTID => 'UserID',
        self::EDIT_CUSTOMER_PASS => 'Pass',
        self::EDIT_CUSTOMER_ALT_CONTACTID => 'AltContactId',
    ];
    
    /*    alt_contaactId
        pass

    contactid => CustomerID
    $BillingAddress =>
    $billing_firstname
    $billing_lastname
    $billing_address
    $billing_address2
    $billing_city
    $billing_state
    $billing_zip
    $billing_country
    $billing_company
    $billing_phone
    $email

    $shipping_firstname
    $shipping_lastname
    $shipping_address
    $shipping_address2
    $shipping_city
    $shipping_state
    $shipping_zip
    $shipping_country
    $shipping_company
    $shipping_phone
    (no email)

    $comments => $Comments
    $lastlogindate => $LastLoginDate
    $website => $WebSite
    discount => $DiscountGroup
    accountno => $AccountNumber
    maillist => $MailList
    custenabled => $CustEnabled
    additional_field1 => $AditionalFields
    additional_field2 => $AditionalFields
    additional_field3 => $AditionalFields

    $CustomerType missing
    */
    
    /** @var int */
    private $CustomerID;
    /** @var string */
    private $UserID;
    /** @var Address */
    private $BillingAddress;
    /** @var Address */
    private $ShippingAddress;
    /** @var string */
    private $Comments;
    /** @var string */
    private $LastLoginDate;
    /** @var string */
    private $WebSite;
    /** @var int */
    private $DiscountGroup;
    /** @var string */
    private $AccountNumber;
    /** @var bool */
    private $MailList;
    /** @var bool */
    private $CustomerType;
    /** @var string */
    private $LastUpdate;
    /** @var bool */
    private $CustEnabled;
    /** @var AdditionalFields The variable name is a typo in the ThreeDCart api object */
    private $AditionalFields;
    /** @var string */
    private $AdditionalField4;
    
    /**
     * Extra types for inserting a customer
     */
    
    /** @var string */
    private $Pass;
    /** @var string */
    private $AltContactId;
    
    /**
     * @return int
     */
    public function getCustomerID()
    {
        return $this->CustomerID;
    }
    
    /**
     * @param int $CustomerID
     */
    public function setCustomerID($CustomerID)
    {
        $this->CustomerID = $CustomerID;
    }
    
    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->UserID;
    }
    
    /**
     * @param string $UserID
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }
    
    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->BillingAddress;
    }
    
    /**
     * @param Address $BillingAddress
     */
    public function setBillingAddress($BillingAddress)
    {
        $this->BillingAddress = $BillingAddress;
    }
    
    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->ShippingAddress;
    }
    
    /**
     * @param Address $ShippingAddress
     */
    public function setShippingAddress($ShippingAddress)
    {
        $this->ShippingAddress = $ShippingAddress;
    }
    
    /**
     * @return string
     */
    public function getComments()
    {
        return $this->Comments;
    }
    
    /**
     * @param string $Comments
     */
    public function setComments($Comments)
    {
        $this->Comments = $Comments;
    }
    
    /**
     * @return string
     */
    public function getLastLoginDate()
    {
        return $this->LastLoginDate;
    }
    
    /**
     * @param string $LastLoginDate
     */
    public function setLastLoginDate($LastLoginDate)
    {
        $this->LastLoginDate = $LastLoginDate;
    }
    
    /**
     * @return string
     */
    public function getWebSite()
    {
        return $this->WebSite;
    }
    
    /**
     * @param string $WebSite
     */
    public function setWebSite($WebSite)
    {
        $this->WebSite = $WebSite;
    }
    
    /**
     * @return int
     */
    public function getDiscountGroup()
    {
        return $this->DiscountGroup;
    }
    
    /**
     * @param int $DiscountGroup
     */
    public function setDiscountGroup($DiscountGroup)
    {
        $this->DiscountGroup = $DiscountGroup;
    }
    
    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }
    
    /**
     * @param string $AccountNumber
     */
    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
    }
    
    /**
     * @return bool
     */
    public function isMailList()
    {
        return $this->MailList;
    }
    
    /**
     * @param bool $MailList
     */
    public function setMailList($MailList)
    {
        $this->MailList = $MailList;
    }
    
    /**
     * @return bool
     */
    public function isCustomerType()
    {
        return $this->CustomerType;
    }
    
    /**
     * @param bool $CustomerType
     */
    public function setCustomerType($CustomerType)
    {
        $this->CustomerType = $CustomerType;
    }
    
    /**
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }
    
    /**
     * @param string $LastUpdate
     */
    public function setLastUpdate($LastUpdate)
    {
        $this->LastUpdate = $LastUpdate;
    }
    
    /**
     * @return bool
     */
    public function isCustEnabled()
    {
        return $this->CustEnabled;
    }
    
    /**
     * @param bool $CustEnabled
     */
    public function setCustEnabled($CustEnabled)
    {
        $this->CustEnabled = $CustEnabled;
    }
    
    /**
     * @return AdditionalFields
     */
    public function getAditionalFields()
    {
        return $this->AditionalFields;
    }
    
    /**
     * @param AdditionalFields $AditionalFields
     */
    public function setAditionalFields($AditionalFields)
    {
        $this->AditionalFields = $AditionalFields;
    }
    
    /**
     * @return string
     */
    public function getAdditionalField4()
    {
        return $this->AdditionalField4;
    }
    
    /**
     * @return string
     */
    public function getPass()
    {
        return $this->Pass;
    }
    
    /**
     * @param string $Pass
     */
    public function setPass($Pass)
    {
        $this->Pass = $Pass;
    }
    
    /**
     * @return string
     */
    public function getAltContactId()
    {
        return $this->AltContactId;
    }
    
    /**
     * @param string $AltContactId
     */
    public function setAltContactId($AltContactId)
    {
        $this->AltContactId = $AltContactId;
    }
    
    /**
     * @param string $AdditionalField4
     */
    public function setAdditionalField4($AdditionalField4)
    {
        $this->AdditionalField4 = $AdditionalField4;
    }
    
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCustomer($this);
    }
    
    /**
     * @param array $fieldList pass a list of parameter to define which fields should be generated.
     *                         Use the Customer::EDIT_CUSTOMER_* constants
     *
     * @return array
     *
     * @throw \InvalidArgumentException
     */
    public function getCustomerData(array $fieldList)
    {
        $alternativeData = $this->getAlternativeData();
        
        $customerData = [];
        foreach ($fieldList as $property) {
            if (! array_key_exists($property, $alternativeData)) {
                throw new \InvalidArgumentException('$property: ' . $property . ' is no valid parameter');
            }
            
            $customerData[$property] = $alternativeData[$property];
        }
        
        return $customerData;
    }
    
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    public function getAlternativeData()
    {
        $objectVars = get_object_vars($this);
        
        $reverseEditCustomerMapping = array_flip(self::$editCustomerMapping);
        
        $alternativeData = [];
        
        if ($this->BillingAddress) {
            $alternativeData = array_merge(
                $alternativeData,
                $this->BillingAddress->getAlternativeData(
                    Address::TYPE_BILLING
                )
            );
        }
        
        if ($this->ShippingAddress) {
            $alternativeData = array_merge(
                $alternativeData,
                $this->ShippingAddress->getAlternativeData(
                    Address::TYPE_SHIPPING
                )
            );
        }
        
        foreach ($objectVars as $objectVarName => $objectVarValue) {
            if (! isset($reverseEditCustomerMapping[$objectVarName])) {
                continue;
            }
            
            $alternativeData[$reverseEditCustomerMapping[$objectVarName]] = $objectVarValue;
        }
        
        return $alternativeData;
    }
}
