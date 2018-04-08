<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);
    $dusupay->live = false; // set false for sandbox.dusupay.com or true fro dusupay.com live

    // Create request data
    $requestData = [
        "merchant_id"=> $dusupay->config['MerchantId'],
        "amount"=> 3000,
        "account_number"=>  '256704543171',
        "account_name"=> "Hillary.N",
        "merchant_reference"=> '128323232',
        "timestamp"=> time(),
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'sendMobileMoney');

    /*
    {
        "response": {
            "id": 1783,
            "amount": 3000,
            "charge": 1000,
            "currency": "UGX",
            "account_id": 34,
            "account_type": "MobileMoneyPayoutAccount",
            "transfer_type": "WITHDRAW",
            "created": "2018-03-20T14:30:41+0000",
            "modified": "2018-03-20T14:30:41+0000",
            "transaction_status": "PENDING",
            "status": true,
            "message": "Request Succeeded"
        }
    }
    */
?>