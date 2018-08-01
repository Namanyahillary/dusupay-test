<?php
    require '../dusupay.php';

    $dusupay = new Dusupay([
        'MerchantId'=>'',
        'Key'=>'',
    ]);


    //  If you want to recieve IPNs as json,
    //  Go to your dusupay merchant account settings
    //  > Under the Security and Notification tab
    //  > Set Webhook/Callback/IPN Content Type to application/json
    // default is multipart/form-data

    $requestData = $_POST; // multipart/form-data
    if(empty($requestData)){
      $requestData = json_decode(file_get_contents('php://input'), true); // application/json
      if(empty($requestData)){
        $dusupay->ipnResponse("IPN Data is empty!");
        exit($dusupay->ipnResponseMsg);
      }
    }

    if($dusupay->ipnCollectionCompleted($requestData)){
      $orderId = $requestData['dusupay_transactionReference'];

      // 1. get the order from your system using the $orderId
        # Code misssing

      // 2. Complete order if it's not
        # Code missing

    }else{
      // that's upto you.
      // You will only receive collection notifications for successful transactions
    }

    // Make sure you call this last
    echo $dusupay->ipnResponseMsg;










    /*
    Sample IPN Data Payload

    {
      "dusupay_transactionId":"1180110094007256704543171",
      "dusupay_amount":5000,
      "dusupay_currency":"UGX",
      "dusupay_itemId":"Item1",
      "dusupay_transactionReference":"112410",
      "dusupay_timestamp":1533137624,
      "dusupay_charge":1000,
      "dusupay_chargeCurrency":"UGX",
      "dusupay_transactionStatus":"COMPLETE",
      "delivery_code_half":null,
      "dusupay_date":"2018-01-10T21:40:07+0000",
      "customer_id":"150406101554-256704543171",
      "customer_name":"Hillary Namanya NHills",
      "customer_email":"namanyahillary@gmail.com",
      "customer_phone":"256704543171",
      "hash":"29b2f15d87d38805f3e828df485789567ebc6939"
    }
    */
?>
