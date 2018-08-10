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
        "amount"=> 1000,
        "currency"=> "UGX",
        "merchant_reference"=> "MYREF",
        "timestamp"=> time(),
        "account_number"=> "256704543171",
        // "account_name"=> "(Optional)CustomerName. Will be indicated under your payments",
        // "success_url"=>"(optional)https://domain.com/myIPNCallbackURL",
        // "item_id"=> "(optional)ItemId from your system",
        // "item_name"=> "(optional)ItemName being paid for from your system",
        // "account_email"=> "(optional)CustomerEmail",
        // "simulatePayBill"=> true, // (Optional) - if set to true, use the completePaymentByNetworkId API to complete the transaction
    ];

    // Generate Request Signature
    $requestData['signature'] = $dusupay->getSignature($requestData,$dusupay->config['Key']);

    // Make api Request
    echo $dusupay->sendRequest($requestData, 'requestMobilePayment');

    /*

    {
        "response": {
            "id": "1180320085705256704543171",
            "amount": 1000,
            "currency": "UGX",
            "item_id": "1521579425",
            "merchant_reference": "MYREF",
            "charge": 750,
            "charge_currency": "UGX",
            "transaction_status": "PENDING",
            "date": "2018-03-20T20:57:05+0000",
            "status": true,
            "account_id": "150406101554-256704543171",
            "account_name": "Hillary Namanya NHills",
            "account_email": "namanyahillary@gmail.com",
            "account_number": "256704543171",
            "must_use_pay_bill_instructions": false,
            "pay_bill_instructions": [],
            "message": ""
        }
    }
    */

    // Request
    /**
     * `must_use_pay_bill_instructions` means that the customer can only complete the transaction using paybill instructions provided. False means that paying with paybill instructions is optional.
     */


    // Response
    /**
     * Note:
     * 1. Set simulatePayBill to create a pending transaction that can be completed by paybill
     * 2. When the customer follows the paybill instructions and make the payment,
     * 3. They will received a transaction id from their mobile money telecom network
     * 4. You will then call the completePaymentByNetworkId API to complete the payment using that network transaction id
     * 5. For the sandbox, Pass any value to the network transaction id.
     *
     */
?>
