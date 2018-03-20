<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);

    // Create request data
    $requestData = [
        "merchant_id"=> $dusupay->config['MerchantId'],
        "timestamp"=> time(),
        "account_type"=> "MOBILE", // Change this to "BANK" to get for bank sub accounts
        // "account_id"=> 33, // Set the sub account it do get balance of only that sub account
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'subAccountBalance');

    /*    
    {
        "response": {
            "status": true,
            "message": "",
            "merchant_id": 1383,
            "balance": 1057555.5647,
            "currency": "EUR",
            "name": "EUR",
            "subscription": "corporate",
            "subscription_expiry": "2021-01-27T00:00:00+0000",
            "accounts": [
                {
                    "id": 33,
                    "currency": "XAF",
                    "balance": 2490851.6
                },
                {
                    "id": 34,
                    "currency": "UGX",
                    "balance": 388571.4286
                }
            ]
        }
    }
    */
?>