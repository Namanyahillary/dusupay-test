# Dusupay API Version 2
Note that these file are used for api version 2. 
You are recommended to use them.
They show you the request parameters and responses expected 
such that you can try to get an idea on how to consume the api correclty


## requestMobilePayment
`must_use_pay_bill_instructions` means that the customer can only complete the transaction using paybill instructions provided. 
You must use the `completePaymentByNetworkId` API to complete the payment for the customer.
If set to `false`, then using paybill instructions is optional.


## Test Paybill transaction
- To test the `completePaymentByNetworkId`, you must set `simulatePayBill` to true when calling the `requestMobilePayment` API.
This will create a pending transaction on dusupay which will complete when you call the `completePaymentByNetworkId` api

### Note:
0. When you call the requestMobilePayment api, 
1. Set simulatePayBill to create a pending transaction that can be completed by paybill
2. When the customer follows the paybill instructions and make the payment, 
3. They will received a transaction id from their mobile money telecom network
4. You will then call the completePaymentByNetworkId API to complete the payment using that network transaction id
5. For the sandbox, Pass any value to the network transaction id.