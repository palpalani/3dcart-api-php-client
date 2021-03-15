<?php

namespace ThreeDCart\Api\Soap\Request;

/**
 * Class ApiErrorException
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class ApiErrorException extends ResponseInvalidException
{
    const ERROR_CODES = [
        0 => 'XML FILE BAD FORMED',
        1 => 'UserIp Node Not Found / UserKey Node Not Found',
        2 => 'UserKey Node Not Found / UserIp Node Not Found',
        3 => 'ProductID Node Not Found',
        4 => 'Quantity Node Not Found',
        5 => 'BatchSize Node Not Found',
        6 => 'StartNum Node Not Found',
        7 => 'InvoiceNum Node Not Found',
        8 => 'NewStatus  Node Not Found',
        9 => 'Invalid Method',
        16 => 'Bad IP',
        17 => 'Bad Key',
        18 => 'API Settings Not Enabled',
        31 => 'Invalid Product Id',
        32 => 'Invalid Quantity ',
        33 => 'Invalid Batch',
        34 => 'Invalid Start Number',
        35 => 'Invalid Invoice Number',
        36 => 'Invalid Date',
        37 => 'Invalid Range Between Dates',
        38 => 'Invalid Order Start From',
        39 => 'Invalid Status',
        40 => 'Error posting to callbackurl',
        41 => 'Invalid customerData',
        42 => 'Invalid action',
        43 => 'Invalid data',
        46 => 'Product Not Found',
        47 => 'Customer Not Found',
        48 => 'Order Status Not Found',
        49 => 'Order Not Found',
    ];

    /**
     * @param string $message
     * @param int|string    $threeDCartSoapErrorCode
     */
    public function __construct($message, $threeDCartSoapErrorCode)
    {
        parent::__construct($message, $threeDCartSoapErrorCode);
    }
}
