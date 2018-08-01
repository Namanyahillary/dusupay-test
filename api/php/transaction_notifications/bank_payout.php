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

    if($requestData['status']=="COMPLETE"){
      $orderId = $requestData['dusupay_transactionReference'];

      // 1. get the order from your system using the $orderId
        # Code misssing

      // 2. Complete order if it was pending/processing. It had failed, Debit the customer's account.
        # Code missing

    }elseif($requestData['status'] == "FAILED"){

      // 1. get the order from your system using the $orderId
        # Code misssing

      // 2. fail order if it's not yet or if it had been completed and Issue refund where necessary
        # Code missing

    }

    // Make sure you call this last
    echo $dusupay->ipnResponseMsg;


    /*
    Sample IPN data Payload

    {
      "id":49,
      "amount":1,
      "charge":100,
      "currency":"KES",
      "rate":1,
      "account_id":13,
      "account_type":"BankPayoutAccount",
      "transfer_type":"WITHDRAW",
      "created":"2018-07-16T13:43:15+0000",
      "modified":"2018-08-01T22:16:52+0000",
      "status":"COMPLETE",
      "merchant_id":1342,
      "merchant_reference":"ref",
      "customer_phone":"256704543171",
      "customer_name":"Hillary",
      "customer_bank_account":"154579",
      "customer_bank_name":"Kenya Commercial Bank Limited"
    }
    */
?>
