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
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'merchantBalance');

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
            "subscription_expiry": "2021-01-27T00:00:00+0000"
        }
    }
    */
?>