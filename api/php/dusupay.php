<?php
    class Dusupay
    {
        # Set false for sandbox and true for live
        private $live = false;

        # Merchant Details
        public $config = [];


        # Api Endpoints
        public $api = [
            'sendMobileMoney'=> 'payout/v2/mobile/sendFromSubAccount.json',
            'sendBankMoney'=> 'payout/v2/bank/sendFromSubAccount.json',
            'merchantBalance'=> 'accounts/v2/merchant/balance.json',
            'subAccountBalance'=> 'accounts/v2/merchant/balanceSubAccount.json',
            'getMobileTransaction'=> 'payout/v2/mobile/getTransaction.json',
            'getBankTransaction'=> 'payout/v2/bank/getTransaction.json',
            'requestMobilePayment'=> 'collections/v2/mobile/requestPayment.json',
            'completePaymentByNetworkId'=> 'collections/v2/mobile/completePaymentByNetworkId.json',
        ];

        function __construct($config=[])
        {
            # Set the merchant details if passed through the constructor
            $this->config = array_merge($this->config, $config);

            # Ensure merchant details are set
            if(empty($config['MerchantId']) || empty($config['Key'])){
                 exit("Please set your merchant details");
            }

        }

        function getSignature($requestData, $merchantMackey){
            ksort($requestData);
            $stringData = '';
            foreach ($requestData as $key => $value) {
                if(in_array($key, ['signature'])) continue;
                $stringData .= $value;
            }
            return hash_hmac('sha1', $stringData, $merchantMackey);
        }


        function sendRequest($data,$action){

            # Set Endpoint
            $url = 'https://dusupay.com/merchant-api/' . $this->api[$action];
            if(!$this->live){
                // $url = 'http://sandbox.dusupay.com/merchant-api/' . $this->api[$action];
                $url = 'http://localhost/dusupays/merchant-api/' . $this->api[$action];
            }

            $ch = curl_init($url);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch,CURLOPT_POST, count($data));                            
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                   
            curl_setopt($ch, CURLOPT_TIMEOUT, 300);
            return $result = (curl_exec($ch));
        }
    }
?>