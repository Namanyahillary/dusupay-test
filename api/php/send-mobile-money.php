<?php
    require 'dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>1383,
        'Key'=>'QN5S8I5OOOJ2OHJ335JANHHDOASNC6A9SE773B1Q6JST7H39MLJF96R4GQQS267TKD7MO7J1QH1453CQO2C47A7N64L8AS8TCEM6LB7HR7K393T44C7BLE4RHP5QOCQ6QICHSI5QOOT4RS72',
    ]);

    // Create request data
    $requestData = [
        "merchant_id"=> $dusupay->config['MerchantId'],
        "amount"=> 3000,
        "account_number"=>  '256704543171',
        "account_name"=> "Hillary.N",
        "merchant_reference"=> $reference,
        "timestamp"=> time(),
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'sendMobileMoney');
?>