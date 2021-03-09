<?php

namespace ThreeDCart\Api\Rest\Field;

class Customer extends AbstractField
{
    const CUSTOMERID = "CustomerID";
    const EMAIL = "Email";
    const PASSWORD = "Password";
    const BILLINGCOMPANY = "BillingCompany";
    const BILLINGFIRSTNAME = "BillingFirstName";
    const BILLINGLASTNAME = "BillingLastName";
    const BILLINGADDRESS1 = "BillingAddress1";
    const BILLINGADDRESS2 = "BillingAddress2";
    const BILLINGCITY = "BillingCity";
    const BILLINGSTATE = "BillingState";
    const BILLINGZIPCODE = "BillingZipCode";
    const BILLINGCOUNTRY = "BillingCountry";
    const BILLINGPHONENUMBER = "BillingPhoneNumber";
    const BILLINGTAXID = "BillingTaxID";
    const SHIPPINGCOMPANY = "ShippingCompany";
    const SHIPPINGFIRSTNAME = "ShippingFirstName";
    const SHIPPINGLASTNAME = "ShippingLastName";
    const SHIPPINGADDRESS1 = "ShippingAddress1";
    const SHIPPINGADDRESS2 = "ShippingAddress2";
    const SHIPPINGCITY = "ShippingCity";
    const SHIPPINGSTATE = "ShippingState";
    const SHIPPINGZIPCODE = "ShippingZipCode";
    const SHIPPINGCOUNTRY = "ShippingCountry";
    const SHIPPINGPHONENUMBER = "ShippingPhoneNumber";
    const SHIPPINGADDRESSTYPE = "ShippingAddressType";
    const CUSTOMERGROUPID = "CustomerGroupID";
    const ENABLED = "Enabled";
    const MAILLIST = "MailList";
    const NONTAXABLE = "NonTaxable";
    const DISABLEBILLINGSAMEASSHIPPING = "DisableBillingSameAsShipping";
    const COMMENTS = "Comments";
    const ADDITIONALFIELD1 = "AdditionalField1";
    const ADDITIONALFIELD2 = "AdditionalField2";
    const ADDITIONALFIELD3 = "AdditionalField3";
    const TOTALSTORECREDIT = "TotalStoreCredit";
    
    public static $allowedValues = [
        self::CUSTOMERID,
        self::EMAIL,
        self::PASSWORD,
        self::BILLINGCOMPANY,
        self::BILLINGFIRSTNAME,
        self::BILLINGLASTNAME,
        self::BILLINGADDRESS1,
        self::BILLINGADDRESS2,
        self::BILLINGCITY,
        self::BILLINGSTATE,
        self::BILLINGZIPCODE,
        self::BILLINGCOUNTRY,
        self::BILLINGPHONENUMBER,
        self::BILLINGTAXID,
        self::SHIPPINGCOMPANY,
        self::SHIPPINGFIRSTNAME,
        self::SHIPPINGLASTNAME,
        self::SHIPPINGADDRESS1,
        self::SHIPPINGADDRESS2,
        self::SHIPPINGCITY,
        self::SHIPPINGSTATE,
        self::SHIPPINGZIPCODE,
        self::SHIPPINGCOUNTRY,
        self::SHIPPINGPHONENUMBER,
        self::SHIPPINGADDRESSTYPE,
        self::CUSTOMERGROUPID,
        self::ENABLED,
        self::MAILLIST,
        self::NONTAXABLE,
        self::DISABLEBILLINGSAMEASSHIPPING,
        self::COMMENTS,
        self::ADDITIONALFIELD1,
        self::ADDITIONALFIELD2,
        self::ADDITIONALFIELD3,
        self::TOTALSTORECREDIT,
    ];
}
