<?php

namespace ThreeDCart\Api\Rest\Resource;

use ThreeDCart\Api\Rest\Resource\Order\OrderItem;
use ThreeDCart\Api\Rest\Resource\Order\Promotion;
use ThreeDCart\Api\Rest\Resource\Order\Question;
use ThreeDCart\Api\Rest\Resource\Order\Shipment;
use ThreeDCart\Api\Rest\Resource\Order\Transaction;

/**
 * @package ThreeDCart\Api\Rest\Resource
 *
 * @method static Order fromArray(array $properties)
 * @method static Order[] fromList(array $list)
 */
class Order extends AbstractResource
{
    protected static $lists = [
        'ShipmentList' => Shipment::class,
        'OrderItemList' => OrderItem::class,
        'PromotionList' => Promotion::class,
        'TransactionList' => Transaction::class,
        'QuestionList' => Question::class,
    ];
    
    /** @var string */
    public $InvoiceNumberPrefix;
    
    /** @var int */
    public $InvoiceNumber;
    
    /** @var int */
    public $OrderID;
    
    /** @var int */
    public $CustomerID;
    
    /** @var string */
    public $OrderDate;
    
    /** @var int */
    public $OrderStatusID;
    
    /** @var string */
    public $LastUpdate;
    
    /** @var string */
    public $UserID;
    
    /** @var string */
    public $SalesPerson;
    
    /** @var string */
    public $ContinueURL;
    
    /** @var string */
    public $AlternateOrderID;
    
    /** @var string */
    public $BillingFirstName;
    
    /** @var string */
    public $BillingLastName;
    
    /** @var string */
    public $BillingCompany;
    
    /** @var string */
    public $BillingAddress;
    
    /** @var string */
    public $BillingAddress2;
    
    /** @var string */
    public $BillingCity;
    
    /** @var string */
    public $BillingState;
    
    /** @var string */
    public $BillingZipCode;
    
    /** @var string */
    public $BillingCountry;
    
    /** @var string */
    public $BillingPhoneNumber;
    
    /** @var string */
    public $BillingEmail;
    
    /** @var string */
    public $BillingPaymentMethod;
    
    /** @var bool */
    public $BillingOnLinePayment;
    
    /** @var string */
    public $BillingPaymentMethodID;
    
    /** @var Shipment[] */
    public $ShipmentList;
    
    /** @var OrderItem[] */
    public $OrderItemList;
    
    /** @var Promotion[] */
    public $PromotionList;
    
    /** @var float */
    public $OrderDiscount;
    
    /** @var float */
    public $SalesTax;
    
    /** @var float */
    public $SalesTax2;
    
    /** @var float */
    public $SalesTax3;
    
    /** @var float */
    public $OrderAmount;
    
    /** @var float */
    public $AffiliateCommission;
    
    /** @var Transaction[] */
    public $TransactionList;
    
    /** @var string */
    public $CardType;
    
    /** @var string */
    public $CardNumber;
    
    /** @var string */
    public $CardName;
    
    /** @var string */
    public $CardExpirationMonth;
    
    /** @var string */
    public $CardExpirationYear;
    
    /** @var string */
    public $CardIssueNumber;
    
    /** @var string */
    public $CardStartMonth;
    
    /** @var string */
    public $CardStartYear;
    
    /** @var string */
    public $CardAddress;
    
    /** @var string */
    public $CardVerification;
    
    /** @var string */
    public $RewardPoints;
    
    /** @var Question[] */
    public $QuestionList;
    
    /** @var string */
    public $Referer;
    
    /** @var string */
    public $IP;
    
    /** @var string */
    public $CustomerComments;
    
    /** @var string */
    public $InternalComments;
    
    /** @var string */
    public $ExternalComments;
}
