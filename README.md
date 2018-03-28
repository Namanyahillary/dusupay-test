# Dusupay API Version 2
Note that these files are used for api version 2. 

You are recommended to use the same.

They show you the request parameters and responses expected 

such that you can try to get an idea on how to consume the api correclty


## requestMobilePayment
If the `Response` field; **`must_use_pay_bill_instructions`** is set to `true`, 

then the customer can only complete the transaction using paybill instructions provided. 

A push/prompt will not be sent to their phone.

You must **`call`** the **`completePaymentByNetworkId`** API to complete the payment for the customer.



If the `Response` field; **`must_use_pay_bill_instructions`** is set to `false`, then using `paybill` instructions is optional.


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



## get-sub-account-balance
set request parameter **`account_type`** to **`MOBILE`** to get mobile sub-account-balances or

set request parameter **`account_type`** to **`BANK`** to get bank sub-account-balances

#### Note
1. Before you request for the sub-account balances, make sure that the sub-accounts were actually created under your merchant account.

#### Creating Sub Accounts
1. Log-into your dusupay account.
2. Click on the desired merchant account from the side bar
3. Under the merchant account, click `SubAccounts` from the top menu bar.
3. You will then have access to the buttons to create the `Mobile Money Sub accounts` and the `Bank Sub Accounts` in seperate tabs

#### Mobile Money Sub Accounts
1. These are only used for withdrawing funds to a mobile money number or wallet.

If you want to send money to mobile money wallet in Uganda, create a UGX mobile money sub-account. XAF for Camerron, GHS for Ghana, e.tc

#### Bank Money Sub Accounts
1. These are only used for withdrawing funds to a Bank accounts number.

If you want to send money to a Bank in Nigeria, create a NGN bank money sub-account. KES for Kenya, UGX for Uganda, e.tc

#### Crediting/Re-charging Sub Accounts
1. Sub Accounts can only be credited from your main merchant account that they belong to.
2. You would have click the `SubAccounts` link from the top menu bar of your selected merchant account,
3. Then click the `Recharge` button that's right next to the sub-account that you want to recharge and follow prompts.


## Feedback and suggestions
Please send your feedback and suggestions to hillary@dusupay.com

Thanks
