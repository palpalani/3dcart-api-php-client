<?php

namespace ThreeDCart\Api\Rest\Field;

class Product extends AbstractField
{
    const LIMIT = "limit";
    const OFFSET = "offset";
    const COUNTONLY = "countonly";
    const SKU = "sku";
    const NAME = "name";
    const COSTFROM = "costfrom";
    const COSTTO = "costto";
    const PRICEFROM = "pricefrom";
    const PRICETO = "priceto";
    const STOCKFROM = "stockfrom";
    const STOCKTO = "stockto";
    const HIDE = "hide";
    const FREESHIPPING = "freeshipping";
    const ONSALE = "onsale";
    const NONTAX = "nontax";
    const NOTFORSALE = "notforsale";
    const GIFTCERTIFICATE = "giftcertificate";
    const HOMESPECIAL = "homespecial";
    const CATEGORYSPECIAL = "categoryspecial";
    const NONSEARCHABLE = "nonsearchable";
    const SELFSHIP = "selfship";
    const REWARDDISABLE = "rewarddisable";
    const LASTUPDATESTART = "lastupdatestart";
    const LASTUPDATEEND = "lastupdateend";
    
    
    public static $allowedValues = [
        self::LIMIT,
        self::OFFSET,
        self::COUNTONLY,
        self::SKU,
        self::NAME,
        self::COSTFROM,
        self::COSTTO,
        self::PRICEFROM,
        self::PRICETO,
        self::STOCKFROM,
        self::STOCKTO,
        self::HIDE,
        self::FREESHIPPING,
        self::ONSALE,
        self::NONTAX,
        self::NOTFORSALE,
        self::GIFTCERTIFICATE,
        self::HOMESPECIAL,
        self::CATEGORYSPECIAL,
        self::NONSEARCHABLE,
        self::SELFSHIP,
        self::REWARDDISABLE,
        self::LASTUPDATESTART,
        self::LASTUPDATEEND,
    ];
}
