<?php

namespace ThreeDCart\Api\Rest\Field;

class Order extends AbstractField
{
    const INVOICENUMBERPREFIX = "InvoiceNumberPrefix";
    const INVOICENUMBER = "InvoiceNumber";
    const ORDERID = "OrderID";
    const CUSTOMERID = "CustomerID";
    const ORDERDATE = "OrderDate";
    const ORDERSTATUSID = "OrderStatusID";
    const LASTUPDATE = "LastUpdate";
    const USERID = "UserID";
    const SALESPERSON = "SalesPerson";
    const CONTINUEURL = "ContinueURL";
    const ALTERNATEORDERID = "AlternateOrderID";
    const BILLINGFIRSTNAME = "BillingFirstName";
    const BILLINGLASTNAME = "BillingLastName";
    const BILLINGCOMPANY = "BillingCompany";
    const BILLINGADDRESS = "BillingAddress";
    const BILLINGADDRESS2 = "BillingAddress2";
    const BILLINGCITY = "BillingCity";
    const BILLINGSTATE = "BillingState";
    const BILLINGZIPCODE = "BillingZipCode";
    const BILLINGCOUNTRY = "BillingCountry";
    const BILLINGPHONENUMBER = "BillingPhoneNumber";
    const BILLINGEMAIL = "BillingEmail";
    const BILLINGPAYMENTMETHOD = "BillingPaymentMethod";
    const BILLINGONLINEPAYMENT = "BillingOnLinePayment";
    const BILLINGPAYMENTMETHODID = "BillingPaymentMethodID";
    const SHIPMENTLIST = "ShipmentList";
    const ORDERITEMLIST = "OrderItemList";
    const PROMOTIONLIST = "PromotionList";
    const ORDERDISCOUNT = "OrderDiscount";
    const SALESTAX = "SalesTax";
    const SALESTAX2 = "SalesTax2";
    const SALESTAX3 = "SalesTax3";
    const ORDERAMOUNT = "OrderAmount";
    const AFFILIATECOMMISSION = "AffiliateCommission";
    const TRANSACTIONLIST = "TransactionList";
    const CARDTYPE = "CardType";
    const CARDNUMBER = "CardNumber";
    const CARDNAME = "CardName";
    const CARDEXPIRATIONMONTH = "CardExpirationMonth";
    const CARDEXPIRATIONYEAR = "CardExpirationYear";
    const CARDISSUENUMBER = "CardIssueNumber";
    const CARDSTARTMONTH = "CardStartMonth";
    const CARDSTARTYEAR = "CardStartYear";
    const CARDADDRESS = "CardAddress";
    const CARDVERIFICATION = "CardVerification";
    const REWARDPOINTS = "RewardPoints";
    const QUESTIONLIST = "QuestionList";
    const REFERER = "Referer";
    const IP = "IP";
    const CUSTOMERCOMMENTS = "CustomerComments";
    const INTERNALCOMMENTS = "InternalComments";
    const EXTERNALCOMMENTS = "ExternalComments";
    
    
    public static $allowedValues = [
        self::ORDERID,
        self::INVOICENUMBERPREFIX,
        self::INVOICENUMBER,
        self::ORDERID,
        self::CUSTOMERID,
        self::ORDERDATE,
        self::ORDERSTATUSID,
        self::LASTUPDATE,
        self::USERID,
        self::SALESPERSON,
        self::CONTINUEURL,
        self::ALTERNATEORDERID,
        self::BILLINGFIRSTNAME,
        self::BILLINGLASTNAME,
        self::BILLINGCOMPANY,
        self::BILLINGADDRESS,
        self::BILLINGADDRESS2,
        self::BILLINGCITY,
        self::BILLINGSTATE,
        self::BILLINGZIPCODE,
        self::BILLINGCOUNTRY,
        self::BILLINGPHONENUMBER,
        self::BILLINGEMAIL,
        self::BILLINGPAYMENTMETHOD,
        self::BILLINGONLINEPAYMENT,
        self::BILLINGPAYMENTMETHODID,
        self::SHIPMENTLIST,
        self::ORDERITEMLIST,
        self::PROMOTIONLIST,
        self::ORDERDISCOUNT,
        self::SALESTAX,
        self::SALESTAX2,
        self::SALESTAX3,
        self::ORDERAMOUNT,
        self::AFFILIATECOMMISSION,
        self::TRANSACTIONLIST,
        self::CARDTYPE,
        self::CARDNUMBER,
        self::CARDNAME,
        self::CARDEXPIRATIONMONTH,
        self::CARDEXPIRATIONYEAR,
        self::CARDISSUENUMBER,
        self::CARDSTARTMONTH,
        self::CARDSTARTYEAR,
        self::CARDADDRESS,
        self::CARDVERIFICATION,
        self::REWARDPOINTS,
        self::QUESTIONLIST,
        self::REFERER,
        self::IP,
        self::CUSTOMERCOMMENTS,
        self::INTERNALCOMMENTS,
        self::EXTERNALCOMMENTS,
    ];
}
