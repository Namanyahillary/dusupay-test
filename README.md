# Dusupay API Version 2
Note that these files are using api version 2 and you are recommended to use the same.

They show you the request parameters and responses expected such that you can try to get an idea on how to consume the api correclty


## requestMobilePayment
If the `Response` field; **`must_use_pay_bill_instructions`** is set to `true`, 

then the customer can only complete the transaction using paybill instructions provided. 

A push/prompt will not be sent to their phone.

You must **`call`** the **`completePaymentByNetworkId`** API to complete the payment for the customer.



If the `Response` field; **`must_use_pay_bill_instructions`** is set to `false`, then using `paybill` instructions is optional.


## Test Paybill transaction
- To test, you must set `simulatePayBill` to true when calling the `requestMobilePayment` API.
- Then call the `completePaymentByNetworkId` api to claim the transaction and have it assigned to your merchant account.

This will create a pending transaction on dusupay which will complete when you call the `completePaymentByNetworkId` api

### Note:
- When you call the `requestMobilePayment` api and the customer follows the paybill instructions to complete the payment, 
- They will receive a transaction id from their mobile money telecom network
- You will then call the `completePaymentByNetworkId` API to complete the payment using that `network transaction id`
- For the sandbox, Pass any value to the network transaction id for test purposes.
- Remember that when making tests, set `simulatePayBill` to true when calling the `requestMobilePayment` API such that you 
are able to make a test `paybill` payment



## get-sub-account-balance
set request parameter **`account_type`** to **`MOBILE`** to get mobile sub-account-balances or

set request parameter **`account_type`** to **`BANK`** to get bank sub-account-balances

#### Note
- Before you request for the sub-account balances, make sure that the sub-accounts were actually created under your merchant account.

#### Creating Sub Accounts
1. Log-into your dusupay account.
2. Click on the desired merchant account from the side bar
3. Under the merchant account, click `SubAccounts` from the top menu bar.
3. You will then have access to the buttons to create the `Mobile Money Sub accounts` and the `Bank Sub Accounts` in seperate tabs

#### Mobile Money Sub Accounts
- These are only used for withdrawing funds to a mobile money number or wallet.

If you want to send money to mobile money wallet in Uganda, create a UGX mobile money sub-account. XAF for Camerron, GHS for Ghana, e.tc

#### Bank Money Sub Accounts
- These are only used for withdrawing funds to a Bank accounts number.

If you want to send money to a Bank in Nigeria, create a NGN bank money sub-account. KES for Kenya, UGX for Uganda, e.tc

#### Crediting/Re-charging Sub Accounts
- Sub Accounts can only be credited from your main merchant account that they belong to.
- You would have click the `SubAccounts` link from the top menu bar of your selected merchant account,
- Then click the `Recharge` button that's right next to the sub-account that you want to recharge and follow prompts.


## Feedback and suggestions
Please send your feedback and suggestions to hillary@dusupay.com

Thanks
