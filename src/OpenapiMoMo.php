<?php

namespace Escarter\OpenapiMoMo;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class OpenapiMoMo
{
    public function sandboxApiUserandKey(string $reference_id, string $ocp_apim_sub_key)
    {
        $sandbox_api_url = 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser/{X-Reference-Id}/apikey';
        $sandbox_user_url = 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser';

        $client = new Client();
        // try {
            $response = $client->request(
                'POST', $sandbox_user_url, [
                    'headers' => [
                        'X-Reference-Id' => $reference_id,
                        'Content-Type' => 'application/json',
                        'Ocp-Apim-Subscription-Key' => $ocp_apim_sub_key,
                    ]
                ]
            );
            $data =  json_decode($response->getBody(), true);
            return $data;


        // } catch (RequestException $ex) {
        //      abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get disbursement token.', 0, $ex);
        // }

    }
    /**
     * get collection token function
     *
     * @return string
     */
    public static function getCollectionToken()
    {
        if(config('openapimomo.environment') != 'sandbox') {
            $user_id = config('openapimomo.collection_user_id');
            $api_key = config('openapimomo.collection_api_key');
            $token_url =  config('openapimomo.collection_token_url');
            $ocp_apim_sub_key = config('openapimomo.collection_ocp_apim_sub_key');
        }else{
            $user_id = config('openapimomo.sandbox_collection_user_id');
            $api_key = config('openapimomo.sandbox_collection_api_key');
            $token_url =  config('openapimomo.sandbox_collection_token_url');
            $ocp_apim_sub_key = config('openapimomo.sandbox_collection_ocp_apim_sub_key');
        }

        $client = new Client();
        try {
            $response = $client->request(
                'POST', $token_url, [
                    'headers' => [
                        'Authorization' => 'Basic '.base64_encode($user_id.':'.$api_key),
                        'Ocp-Apim-Subscription-Key' => $ocp_apim_sub_key
                    ],
                    'json' => [
                        'grant_type' => 'client_credentials',
                    ],
                ]
            );

            $data =  json_decode($response->getBody(), true);
            return $data['access_token'];

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get token.', 0, $ex);
        }

    }

    /**
     * request collection function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $amount
     * @param  string $payer_message
     * @param  string $payee_note
     * @return void
     */
    public function requestPayment($party_id,$amount,$payer_message = '', $payee_note = '')
    {
        $momo_transaction_id = (string) Str::uuid();
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $collection_transaction_url = config('openapimomo.collection_transaction_url');
            $collection_ocp_apim_sub_key = config('openapimomo.collection_ocp_apim_sub_key');
            $collection_call_back_url = config('openapimomo.collection_call_back_url');
        }else{
            $collection_transaction_url = config('openapimomo.sandbox_collection_transaction_url');
            $collection_ocp_apim_sub_key = config('openapimomo.sandbox_collection_ocp_apim_sub_key');
            $collection_call_back_url = config('openapimomo.sandbox_collection_call_back_url');
        }
        $transaction_id = config('openapimomo.transaction_id');
        $currency = config('openapimomo.currency');
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        $headers = [
        'X-Reference-Id' => $momo_transaction_id,
        'X-Target-Environment' => $environment,
        'Authorization' => 'Bearer ' . $this::getCollectionToken(),
        'Content-Type' => 'application/json',
        'Ocp-Apim-Subscription-Key' => $collection_ocp_apim_sub_key
        ];

        if($collection_call_back_url != null) {
            $headers['X-Callback-Url'] = $collection_call_back_url;
        }

        try {
            $client->request(
                'POST', $collection_transaction_url, [
                'headers' => $headers,
                'json' => [
                    'amount' => $amount,
                    'currency' => $currency,
                    'externalId' => $transaction_id,
                    'payer' => [
                        'partyIdType' => $party_id_type,
                        'partyId' => $party_id,
                    ],
                    'payerMessage' => $payer_message,
                    'payeeNote' => $payee_note,
                ],
                'verify' => false,
                'connect_timeout' => '259',
                'timeout ' => '259'
                ]
            );
            // returns the transaction id
            return $momo_transaction_id;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Request to pay transaction - unsuccessful.', 0, $ex);
        }
    }
    /**
     * get collection transaction status function
     *
     * @param  [string] $momoTransactionId
     * @param  [string] $token
     * @return [json] response
     */
    public function getCollectionTransactionStatus($momo_transaction_id)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $collection_transaction_status_url = config('openapimomo.collection_transaction_status_url');
            $collection_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $collection_transaction_status_url);
            $collection_ocp_apim_sub_key = config('openapimomo.collection_ocp_apim_sub_key');
        }else{
            $collection_transaction_status_url = config('openapimomo.sandbox_collection_transaction_status_url');
            $collection_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $collection_transaction_status_url);
            $collection_ocp_apim_sub_key = config('openapimomo.sandbox_collection_ocp_apim_sub_key');
        }
        $client = new Client();

        try {
            $response = $client->request(
                'GET', $collection_transaction_status_url, [
                'headers' => [
                    'X-Target-Environment' => $environment,
                    'Authorization' => 'Bearer ' .$this::getcOllectionToken(),
                    'Ocp-Apim-Subscription-Key' => $collection_ocp_apim_sub_key
                    ],
                'connect_timeout' => '259',
                'timeout ' => '259',
                'verify' => false
                ]
            );
            return json_decode($response->getBody(), true);

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get transaction status.', 0, $ex);
        }
    }

    /**
     * get collection account balance function
     *
     * @param  [type] $token
     * @return void
     */
    public function getCollectionAccountBalance()
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $collection_account_balance_url = config('openapimomo.collection_account_balance_url');
            $collection_ocp_apim_sub_key = config('openapimomo.collection_ocp_apim_sub_key');
        }else{
            $collection_account_balance_url = config('openapimomo.sandbox_collection_account_balance_url');
            $collection_ocp_apim_sub_key = config('openapimomo.sandbox_collection_ocp_apim_sub_key');
        }
        $client = new Client();
        try {
            $response = $client->request(
                'GET', $collection_account_balance_url, [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this::getCollectionToken(),
                        'X-Target-Environment' => $environment,
                        'Ocp-Apim-Subscription-Key' => $collection_ocp_apim_sub_key
                    ],
                ]
            );

            return json_decode($response->getBody(), true);
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
        }
    }

    /**
     * check collection account holder function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $party_id_type
     * @return void
     */
    public function checkCollectionAccountHolder($party_id, $party_id_type = null)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $collection_account_status_url = config('openapimomo.collection_account_status_url');
            $collection_ocp_apim_sub_key = config('openapimomo.collection_ocp_apim_sub_key');
        }else{
            $collection_account_status_url = config('openapimomo.sandbox_collection_account_status_url');
            $collection_ocp_apim_sub_key = config('openapimomo.sandbox_collection_ocp_apim_sub_key');
        }
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        if (is_null($party_id_type)) {
            $party_id_type = $party_id_type;
        }
        $patterns = $replacements = [];

        $patterns[] = '/(\{\bparty_id_type\b\})/';
        $replacements[] = strtolower($party_id_type);

        $patterns[] = '/(\{\bparty_id\b\})/';
        $replacements[] = urlencode($party_id);

        $account_status_uri = preg_replace($patterns, $replacements, $collection_account_status_url);

        try {
            $response = $client->request(
                'GET', $account_status_uri, [
                    'headers' => [
                        'X-Target-Environment' => $environment,
                        'Authorization' => 'Bearer ' . $this::getCollectionToken(),
                        'Ocp-Apim-Subscription-Key' =>  $collection_ocp_apim_sub_key
                    ],
                ]
            );

            $body = json_decode($response->getBody(), true);
            return $body;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get user account information.', 0, $ex);
        }
    }

    /**
     * get debursement token function
     *
     * @return string
     */
    public static function getDisbursementToken()
    {
        if(config('openapimomo.environment') != 'sandbox') {
            $user_id = config('openapimomo.disbursement_user_id');
            $api_key = config('openapimomo.disbursement_api_key');
            $token_url =  config('openapimomo.disbursement_token_url');
            $ocp_apim_sub_key = config('openapimomo.disbursement_ocp_apim_sub_key');
        }else{
            $user_id = config('openapimomo.sandbox_disbursement_user_id');
            $api_key = config('openapimomo.sandbox_disbursement_api_key');
            $token_url =  config('openapimomo.sandbox_disbursement_token_url');
            $ocp_apim_sub_key = config('openapimomo.sandbox_disbursement_ocp_apim_sub_key');
        }

        $client = new Client();
        try {
            $response = $client->request(
                'POST', $token_url, [
                    'headers' => [
                        'Authorization' => 'Basic '.base64_encode($user_id.':'.$api_key),
                        'Ocp-Apim-Subscription-Key' => $ocp_apim_sub_key
                    ],
                    'json' => [
                        'grant_type' => 'client_credentials',
                    ],
                ]
            );

            $data =  json_decode($response->getBody(), true);
            return $data['access_token'];

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get disbursement token.', 0, $ex);
        }

    }

    /**
     * transfer disbursement function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $amount
     * @param  string $payer_message
     * @param  string $payee_note
     * @return void
     */
    public function disbursementTransfer($party_id, $amount, $payer_message = '', $payee_note = '')
    {
        $momo_transaction_id = (string) Str::uuid();
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $disbursement_transaction_url = config('openapimomo.disbursement_transaction_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.disbursement_ocp_apim_sub_key');
            $disbursement_call_back_url = config('openapimomo.disbursement_call_back_url');
        }else{
            $disbursement_transaction_url = config('openapimomo.sandbox_disbursement_transaction_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.sandbox_disbursement_ocp_apim_sub_key');
            $disbursement_call_back_url = config('openapimomo.sandbox_disbursement_call_back_url');
        }
        $transaction_id = config('openapimomo.transaction_id');
        $currency = config('openapimomo.currency');
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        $headers = [
            'X-Reference-Id' => $momo_transaction_id,
            'X-Target-Environment' => $environment,
            'Authorization' => 'Bearer ' .$this::getDisbursementToken(),
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key' => $disbursement_ocp_apim_sub_key
        ];

        if($disbursement_call_back_url != null) {
            $headers['X-Callback-Url'] = $disbursement_call_back_url;
        }


        try {
            $response = $client->request(
                'POST', $disbursement_transaction_url, [
                'headers' => $headers,
                'json' => [
                    'amount' => $amount,
                    'currency' => $currency,
                    'externalId' => $transaction_id,
                    'payee' => [
                        'partyIdType' => $party_id_type,
                        'partyId' => $party_id,
                    ],
                    'payerMessage' => $payer_message,
                    'payeeNote' => $payee_note,
                ],
                'verify' => false,
                'connect_timeout' => '259',
                'timeout ' => '259'
                ]
            );

            // returns the transaction id
            return  (string) $momo_transaction_id;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Request to pay transaction - unsuccessful.', 0, $ex);
        }
    }
    /**
     * get disbursement transaction status function
     *
     * @param  [type] $momoTransactionId
     * @param  [type] $token
     * @return void
     */
    public function getDisbursementTransactionStatus($momo_transaction_id)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $disbursement_transaction_status_url = config('openapimomo.disbursement_transaction_status_url');
            $disbursement_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $disbursement_transaction_status_url);
            $disbursement_ocp_apim_sub_key = config('openapimomo.disbursement_ocp_apim_sub_key');
        }else{
            $disbursement_transaction_status_url = config('openapimomo.sandbox_disbursement_transaction_status_url');
            $disbursement_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $disbursement_transaction_status_url);
            $disbursement_ocp_apim_sub_key = config('openapimomo.sandbox_disbursement_ocp_apim_sub_key');
        }
        $client = new Client();

        try {
            $response = $client->request(
                'GET', $disbursement_transaction_status_url, [
                'headers' => [
                    'X-Target-Environment' => $environment,
                    'Authorization' => 'Bearer ' . $this::getDisbursementToken(),
                    'Ocp-Apim-Subscription-Key' => $disbursement_ocp_apim_sub_key
                    ],
                'connect_timeout' => '259',
                'timeout ' => '259',
                'verify' => false
                ]
            );
            return json_decode($response->getBody(), true);

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get transaction status.', 0, $ex);
        }
    }

    /**
     * get disbursement account balance function
     *
     * @param  [string] $token
     * @return void
     */
    public function getDisbursementAccountBalance()
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $disbursement_account_balance_url = config('openapimomo.disbursement_account_balance_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.disbursement_ocp_apim_sub_key');
        }else{
            $disbursement_account_balance_url = config('openapimomo.sandbox_disbursement_account_balance_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.sandbox_disbursement_ocp_apim_sub_key');
        }
        $client = new Client();
        try {
            $response = $client->request(
                'GET', $disbursement_account_balance_url, [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this::getDisbursementToken(),
                        'X-Target-Environment' => $environment,
                        'Ocp-Apim-Subscription-Key' => $disbursement_ocp_apim_sub_key
                    ],
                ]
            );

            return json_decode($response->getBody(), true);
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
        }
    }

    /**
     * check disbursement party account holder function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $party_id_type
     * @return void
     */
    public function checkDisbursementAccountHolder($party_id, $party_id_type = null)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $disbursement_account_status_url = config('openapimomo.disbursement_account_status_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.disbursement_ocp_apim_sub_key');
        }else{
            $disbursement_account_status_url = config('openapimomo.sandbox_disbursement_account_status_url');
            $disbursement_ocp_apim_sub_key = config('openapimomo.sandbox_disbursement_ocp_apim_sub_key');
        }
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        if (is_null($party_id_type)) {
            $party_id_type = $party_id_type;
        }
        $patterns = $replacements = [];

        $patterns[] = '/(\{\bparty_id_type\b\})/';
        $replacements[] = strtolower($party_id_type);

        $patterns[] = '/(\{\bparty_id\b\})/';
        $replacements[] = urlencode($party_id);

        $account_status_uri = preg_replace($patterns, $replacements, $disbursement_account_status_url);

        try {
            $response = $client->request(
                'GET', $account_status_uri, [
                    'headers' => [
                        'X-Target-Environment' => $environment,
                        'Authorization' => 'Bearer ' . $this::getDisbursementToken(),
                        'Ocp-Apim-Subscription-Key' =>  $disbursement_ocp_apim_sub_key
                    ],
                ]
            );

            $body = json_decode($response->getBody(), true);
            return $body;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get user account information.', 0, $ex);
        }
    }

    /**
     * get remittance token function
     *
     * @return string
     */
    public static function getRemittanceToken()
    {
        if(config('openapimomo.environment') != 'sandbox') {
            $user_id = config('openapimomo.remittance_user_id');
            $api_key = config('openapimomo.remittance_api_key');
            $token_url =  config('openapimomo.remittance_token_url');
            $ocp_apim_sub_key = config('openapimomo.remittance_ocp_apim_sub_key');
        }else{
            $user_id = config('openapimomo.sandbox_remittance_user_id');
            $api_key = config('openapimomo.sandbox_remittance_api_key');
            $token_url =  config('openapimomo.sandbox_remittance_token_url');
            $ocp_apim_sub_key = config('openapimomo.sandbox_remittance_ocp_apim_sub_key');
        }

        $client = new Client();
        try {
            $response = $client->request(
                'POST', $token_url, [
                    'headers' => [
                        'Authorization' => 'Basic '.base64_encode($user_id.':'.$api_key),
                        'Ocp-Apim-Subscription-Key' => $ocp_apim_sub_key
                    ],
                    'json' => [
                        'grant_type' => 'client_credentials',
                    ],
                ]
            );

            $data =  json_decode($response->getBody(), true);
            return $data['access_token'];

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get remittance token.', 0, $ex);
        }

    }
    /**
     * transfer remittance function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $amount
     * @param  string $payer_message
     * @param  string $payee_note
     * @return void
     */
    public function remittanceTransfer($party_id,$amount,$payer_message = '', $payee_note = '')
    {
        $momo_transaction_id = (string) Str::uuid();
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $remittance_transaction_url = config('openapimomo.remittance_transaction_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.remittance_ocp_apim_sub_key');
            $remittance_call_back_url = config('openapimomo.remittance_call_back_url');
        }else{
            $remittance_transaction_url = config('openapimomo.sandbox_remittance_transaction_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.sandbox_remittance_ocp_apim_sub_key');
            $remittance_call_back_url = config('openapimomo.sandbox_remittance_call_back_url');
        }
        $transaction_id = config('openapimomo.transaction_id');
        $currency = config('openapimomo.currency');;
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        $headers = [
        'X-Reference-Id' => $momo_transaction_id,
        'X-Target-Environment' => $environment,
        'Authorization' => 'Bearer ' . $this::getRemittanceToken(),
        'Content-Type' => 'application/json',
        'Ocp-Apim-Subscription-Key' => $remittance_ocp_apim_sub_key
        ];

        if($remittance_call_back_url != null) {
            $headers['X-Callback-Url'] = $remittance_call_back_url;
        }
        try {
            $response = $client->request(
                'POST', $remittance_transaction_url, [
                'headers' => $headers,
                'json' => [
                    'amount' => $amount,
                    'currency' => $currency,
                    'externalId' => $transaction_id,
                    'payer' => [
                        'partyIdType' => $party_id_type,
                        'partyId' => $party_id,
                    ],
                    'payerMessage' => $payer_message,
                    'payeeNote' => $payee_note,
                ],
                'verify' => false,
                'connect_timeout' => '259',
                'timeout ' => '259'
                ]
            );

            /**
             * To_do -- manage response
            */
            // returns the transaction id
            // return $momo_transaction_id;

            return  $response;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Request to pay transaction - unsuccessful.', 0, $ex);
        }
    }
    /**
     * get remittance transaction status function
     *
     * @param  [type] $momoTransactionId
     * @param  [type] $token
     * @return void
     */
    public function getRemittanceTransactionStatus($momo_transaction_id)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $remittance_transaction_status_url = config('openapimomo.remittance_transaction_status_url');
            $remittance_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $remittance_transaction_status_url);
            $remittance_ocp_apim_sub_key = config('openapimomo.remittance_ocp_apim_sub_key');
        }else{
            $remittance_transaction_status_url = config('openapimomo.sandbox_remittance_transaction_status_url');
            $remittance_transaction_status_url = str_replace('{momo_transaction_id}', $momo_transaction_id, $remittance_transaction_status_url);
            $remittance_ocp_apim_sub_key = config('openapimomo.sandbox_remittance_ocp_apim_sub_key');
        }
        $client = new Client();

        try {
            $response = $client->request(
                'GET', $remittance_transaction_status_url, [
                'headers' => [
                    'X-Target-Environment' => $environment,
                    'Authorization' => 'Bearer ' . $this::getRemittanceToken(),
                    'Ocp-Apim-Subscription-Key' => $remittance_ocp_apim_sub_key
                    ],
                'connect_timeout' => '259',
                'timeout ' => '259',
                'verify' => false
                ]
            );
            return json_decode($response->getBody(), true);

        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get transaction status.', 0, $ex);
        }
    }

    /**
     * get remittance account balance function
     *
     * @param  [string] $token
     * @return void
     */
    public function getRemittanceAccountBalance()
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $remittance_account_balance_url = config('openapimomo.remittance_account_balance_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.remittance_ocp_apim_sub_key');
        }else{
            $remittance_account_balance_url = config('openapimomo.sandbox_remittance_account_balance_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.sandbox_remittance_ocp_apim_sub_key');
        }
        $client = new Client();
        try {
            $response = $client->request(
                'GET', $remittance_account_balance_url, [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this::getRemittanceToken(),
                        'X-Target-Environment' => $environment,
                        'Ocp-Apim-Subscription-Key' => $remittance_ocp_apim_sub_key
                    ],
                ]
            );

            return json_decode($response->getBody(), true);
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
        }
    }

    /**
     * check remittance party account holder function
     *
     * @param  [type] $token
     * @param  [type] $party_id
     * @param  [type] $party_id_type
     * @return void
     */
    public function checkRemittanceAccountHolder($party_id, $party_id_type = null)
    {
        $environment = config('openapimomo.environment');
        if(config('openapimomo.environment') != 'sandbox') {
            $remittance_account_status_url = config('openapimomo.remittance_account_status_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.remittance_ocp_apim_sub_key');
        }else{
            $remittance_account_status_url = config('openapimomo.sandbox_remittance_account_status_url');
            $remittance_ocp_apim_sub_key = config('openapimomo.sandbox_remittance_ocp_apim_sub_key');
        }
        $party_id_type = config('openapimomo.party_id_type');
        $client = new Client();

        if (is_null($party_id_type)) {
            $party_id_type = $party_id_type;
        }
        $patterns = $replacements = [];

        $patterns[] = '/(\{\bparty_id_type\b\})/';
        $replacements[] = strtolower($party_id_type);

        $patterns[] = '/(\{\bparty_id\b\})/';
        $replacements[] = urlencode($party_id);

        $account_status_uri = preg_replace($patterns, $replacements, $remittance_account_status_url);

        try {
            $response = $client->request(
                'GET', $account_status_uri, [
                    'headers' => [
                        'X-Target-Environment' => $environment,
                        'Authorization' => 'Bearer ' . $this::getRemittanceToken(),
                        'Ocp-Apim-Subscription-Key' =>  $remittance_ocp_apim_sub_key
                    ],
                ]
            );

            $body = json_decode($response->getBody(), true);
            return $body;
        } catch (RequestException $ex) {
            abort(501, $ex->getMessage());
            // throw new CollectionRequestException('Unable to get user account information.', 0, $ex);
        }
    }
}