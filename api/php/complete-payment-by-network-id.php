<?php
    require 'dusupay.php';
    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);
    $dusupay->live = false; // set false for sandbox.dusupay.com or true fro dusupay.com live

    // Create request data
    $requestData = [
        'id'=> '1180320105912256704543171',
        "merchant_id"=> $dusupay->config['MerchantId'],
        "network_transaction_id"=> 'DSHDHSWEWEW',
        "account_number"=> "256704543171",
        "timestamp"=> time(),
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'completePaymentByNetworkId');

    /*
    {
        "response": {
            "status": true,
            "message": "Transaction has completed!"
        }
    }
    */
?>