<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);

    // Create request data
    $requestData = [
        "merchant_id"=> $dusupay->config['MerchantId'],
        "amount"=> 600,
        "currency"=> "NGN",
        "account_number"=> "0044823848",
        "account_name"=> "AccountName",
        "bank_code"=> "058",
        "country"=> "NG",
        "phone"=> "256704543171",
        "merchant_reference"=> "1496773894",
        "timestamp"=> time()
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'sendBankMoney');

    /*
    {
        "response": {
            "id": 43,
            "transaction_id": 43,
            "amount": 600,
            "charge": 100,
            "currency": "NGN",
            "account_id": 19,
            "account_type": "BankPayoutAccount",
            "transfer_type": "WITHDRAW",
            "created": "2018-03-20T14:33:59+0000",
            "modified": "2018-03-20T14:33:59+0000",
            "transaction_status": "COMPLETE",
            "status": true,
            "message": "Request Sent"
        }
    }
    */
?>