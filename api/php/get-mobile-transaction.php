<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);
    $dusupay->live = false; // set false for sandbox.dusupay.com or true fro dusupay.com live

    // Create request data
    $requestData = [
        "id"=> 1783, // Id of the transaction returned when pay out was made
        "merchant_id"=> $dusupay->config['MerchantId'],
        "timestamp"=> time(),
    ];


    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'getMobileTransaction');

    /*
    {
        "response": {
            "id": 1783,
            "amount": 3000,
            "charge": 1000,
            "currency": "UGX",
            "rate": 1,
            "account_id": 34,
            "account_type": "MobileMoneyPayoutAccount",
            "transfer_type": "WITHDRAW",
            "created": "2018-03-20T14:30:41+0000",
            "modified": "2018-03-20T14:30:41+0000",
            "transaction_status": "COMPLETE",
            "status": true,
            "merchant_id": 1383,
            "merchant_reference": "128323232",
            "customer_phone": "256704543171",
            "customer_name": "Hillary.N"
        }
    }
    */
?>
