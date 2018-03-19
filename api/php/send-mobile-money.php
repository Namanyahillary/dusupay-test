<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);

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
?>