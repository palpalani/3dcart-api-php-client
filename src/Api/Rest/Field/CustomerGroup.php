<?php

namespace ThreeDCart\Api\Rest\Field;

class Customer extends AbstractField
{
    const CUSTOMERGROUPID = "CustomerGroupID";
    const NAME = "Name";
    const DESCRIPTION = "Description";
    const MINIMUMORDER = "MinimumOrder";
    const NONTAXABLE = "NonTaxable";
    const ALLOWREGISTRATION = "AllowRegistration";
    const DISABLEREWARDPOINTS = "DisableRewardPoints";
    const AUTOAPPROVE = "AutoApprove";
    const REGISTRATIONMESSAGE = "RegistrationMessage";
    const PRICELEVEL = "PriceLevel";
    
    public static $allowedValues = [
        self::CUSTOMERGROUPID,
        self::NAME,
        self::DESCRIPTION,
        self::MINIMUMORDER,
        self::NONTAXABLE,
        self::ALLOWREGISTRATION,
        self::DISABLEREWARDPOINTS,
        self::AUTOAPPROVE,
        self::REGISTRATIONMESSAGE,
        self::PRICELEVEL,
    ];
}
