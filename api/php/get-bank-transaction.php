<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);

    // Create request data
    $requestData = [
        "id"=> 43, // Id of the transaction returned when pay out was made
        "merchant_id"=> $dusupay->config['MerchantId'],
        "timestamp"=> time(),
    ];


    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'getBankTransaction');

    /*    
    {
        "response": {
            "id": 43,
            "amount": 600,
            "charge": 100,
            "currency": "NGN",
            "rate": 1,
            "account_id": 19,
            "account_type": "BankPayoutAccount",
            "transfer_type": "WITHDRAW",
            "created": "2018-03-20T14:33:59+0000",
            "modified": "2018-03-20T14:33:59+0000",
            "transaction_status": "COMPLETE",
            "status": true,
            "merchant_id": 1383,
            "merchant_reference": "1496773894",
            "customer_phone": "256704543171",
            "customer_name": "AccountName",
            "customer_bank_account": "0044823848",
            "customer_bank_name": "GTBank Plc"
        }
    }
    */
?>