<?php

return [

     /*
    |--------------------------------------------------------------------------
    | General configuration
    |--------------------------------------------------------------------------
    | This section contains general configurations parameters
    |
    |   environment           - specifies the api environment takes 'sandbox','mtncameroon'
    |   currency              - specifies the currency you are using. it takes 'XAF','USD'
    |   party_id_type         - 
    |   transaction_id        - specifies the transaction id -- you can change it to uuid 
    |   country_short_code    - specifies the country shortcode in which your api is launched it is appending to the party_id in the different calls
    | 
    */

    'environment' => 'sandbox',
    'currency' => 'EUR',
    'party_id_type' => 'MSISDN',
    'transaction_id' => Illuminate\Support\Str::uuid(), 
    'country_short_code'=>'237',

    /*
    |--------------------------------------------------------------------------
    |                        COLLECTION API SECTION
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | collection api user and key for sandbox and production environment
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_user_id              - collection user for production environment
    |   collection_api_key              - collection api key for production environemt
    |   sandbox_collection_user_id      - collection user for sandbox 
    |   sandbox_collection_api_key      - collection api key for sandbox 
    */

    'collection_user_id' => '338f36ef-1605-4c22-bf45-8f11e59ab4ba',
    'collection_api_key' => '55c2c76c60a3445ba31125578d986cb8',

    'sandbox_collection_user_id' => 'f0d016ad-542b-434b-9825-b9e4f05ed0f2',
    'sandbox_collection_api_key'=> '66de01dde86d4abb97302e6b0b8de337',

    /*
    |--------------------------------------------------------------------------
    | collection api token and ocp_apim_subscription_key for sandbox and production 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_ocp_apim_sub_key         - collection ocp_apim_subscription_key for production environment
    |   collection_token_url                - collection token url for production environemt
    |   sandbox_collection_ocp_apim_sub_key - collection ocp_apim_subscription_key for sandbox 
    |   sandbox_collection_token_url        - collection token url for sandbox 
    */

    'collection_ocp_apim_sub_key'=> 'bafb0c8076434928b36d83699e8fd2bd',
    'collection_token_url'=> 'https://ericssonbasicapi1.azure-api.net/collection/token/',
    
    'sandbox_collection_ocp_apim_sub_key'=>'8267b296fbd34901bb835e109836bbda',
    'sandbox_collection_token_url'=>'https://sandbox.momodeveloper.mtn.com/collection/token/',

    
    /*
    |--------------------------------------------------------------------------
    | collection api requesttopay endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_transaction_url          - collection requesttopay endpoint for production environment
    |   collection_call_back_url            - collection requesttopay call_back_url for production environemt
    |   sandbox_collection_transaction_url  - collection requesttopay endpoint for sandbox 
    |   sandbox_collection_call_back_url    - collection requesttopay call_back_url for sandbox 
    */
 
    'collection_transaction_url'=> 'https://ericssonbasicapi1.azure-api.net/collection/v1_0/requesttopay',
    'collection_call_back_url'=>'https://joballo.com',

    'sandbox_collection_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',
    'sandbox_collection_call_back_url'=>'',

    /*
    |--------------------------------------------------------------------------
    | collection api transaction status (requesttopay/{referenceid}) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_transaction_status_url           - collection requesttopay/{referenceid} endpoint for production 
    |   sandbox_collection_transaction_status_url   - collection requesttopay/{referenceid} endpoint for sandbox
    |
    */

    'collection_transaction_status_url' => 'https://ericssonbasicapi1.azure-api.net/collection/v1_0/requesttopay/{momo_transaction_id}',
    'sandbox_collection_transaction_status_url' =>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/{momo_transaction_id}',

    /*
    |--------------------------------------------------------------------------
    | collection api transaction status (/account/balance) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_account_balance_url           - collection /account/balance endpoint for production 
    |   sandbox_collection_account_balance_url   - collection /account/balance endpoint for sandbox
    |
    */
    
    'collection_account_balance_url'=>'https://ericssonbasicapi1.azure-api.net/collection/v1_0/account/balance',
    'sandbox_collection_account_balance_url'=>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/account/balance',

    /*
    |--------------------------------------------------------------------------
    | collection api transaction status (/accountholder/{party_id_type}/{party_id}/active) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for collection api
    |
    |   collection_account_status_url           - collection /accountholder/{party_id_type}/{party_id}/active endpoint for production 
    |   sandbox_collection_account_status_url   - collection /accountholder/{party_id_type}/{party_id}/active endpoint for sandbox
    |
    */

    'collection_account_status_url'=>'https://ericssonbasicapi1.azure-api.net/collection/v1_0/accountholder/{party_id_type}/{party_id}/active',
    'sandbox_collection_account_status_url'=>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/accountholder/{party_id_type}/{party_id}/active',

    /*
    |--------------------------------------------------------------------------
    |                        DISBURSEMENT API SECTION
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | disbursement api user and key for sandbox and production environment
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_user_id              - disbursement user for production environment
    |   disbursement_api_key              - disbursement api key for production environemt
    |   sandbox_disbursement_user_id      - disbursement user for sandbox 
    |   sandbox_disbursement_api_key      - disbursement api key for sandbox 
    */

    'disbursement_user_id' => '0bad5d1d-f042-4a3c-8147-0bfe019251cf', //change this to your disbursement user
    'disbursement_api_key' => 'd5d8fda3a15142a4a0957427d84f715b', //change this to your disbursement api key

    'sandbox_disbursement_user_id' => '26330c05-250a-498f-b22d-903487b6921c', //change this to your sandbox  disbursement user
    'sandbox_disbursement_api_key'=> '7f93a98bbd6b46f5b54b9cf513173434', //change this to your sandbox disbursement api key


    /*
    |--------------------------------------------------------------------------
    | disbursement api token and ocp_apim_subscription_key for sandbox and production 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_ocp_apim_sub_key         - disbursement ocp_apim_subscription_key for production environment
    |   disbursement_token_url                - disbursement token url for production environemt
    |   sandbox_disbursement_ocp_apim_sub_key - disbursement ocp_apim_subscription_key for sandbox 
    |   sandbox_disbursement_token_url        - disbursement token url for sandbox 
    */

    'disbursement_ocp_apim_sub_key'=> '8489a030eb8c436e849f63667c9492dc', //change this to your disbursement production  Ocp-Apim-Subscription-Key 
    'disbursement_token_url'=> 'https://ericssonbasicapi1.azure-api.net/disbursement/token/',

    'sandbox_disbursement_ocp_apim_sub_key'=> '8399f29854944b569f83b9238f055afe', //change this to your disbursement sandbox  Ocp-Apim-Subscription-Key 
    'sandbox_disbursement_token_url'=> 'https://sandbox.momodeveloper.mtn.com/disbursement/token/',

    /*
    |--------------------------------------------------------------------------
    | disbursement api transfer endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_transaction_url          - disbursement transfer endpoint for production environment
    |   disbursement_call_back_url            - disbursement transfer call_back_url for production environemt
    |   sandbox_disbursement_transaction_url  - disbursement transfer endpoint for sandbox 
    |   sandbox_disbursement_call_back_url    - disbursement transfer call_back_url for sandbox 
    */

    'disbursement_transaction_url'=> 'https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/transfer',
    'disbursement_call_back_url'=>'https://joballo.com',

    'sandbox_disbursement_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/transfer',
    'sandbox_disbursement_call_back_url'=>'',

    /*
    |--------------------------------------------------------------------------
    | disbursement api transaction status (transfer/{referenceid}) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_transaction_status_url           - disbursement transfer/{referenceid} endpoint for production 
    |   sandbox_disbursement_transaction_status_url   - disbursement transfer/{referenceid} endpoint for sandbox
    |
    */

    'disbursement_transaction_status_url' => 'https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/transfer/{momo_transaction_id}',
    'sandbox_disbursement_transaction_status_url' =>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/transfer/{momo_transaction_id}',

   /*
    |--------------------------------------------------------------------------
    | disbursement api transaction status (/account/balance) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_account_balance_url           - disbursement /account/balance endpoint for production 
    |   sandbox_disbursement_account_balance_url   - disbursement /account/balance endpoint for sandbox
    |
    */

    'disbursement_account_balance_url'=>'https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/account/balance',
    'sandbox_disbursement_account_balance_url'=>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/account/balance',

    /*
    |--------------------------------------------------------------------------
    | disbursement api transaction status (/accountholder/{party_id_type}/{party_id}/active) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for disbursement api
    |
    |   disbursement_account_status_url           - disbursement /accountholder/{party_id_type}/{party_id}/active endpoint for production 
    |   sandbox_disbursement_account_status_url   - disbursement /accountholder/{party_id_type}/{party_id}/active endpoint for sandbox
    |
    */

    'disbursement_account_status_url'=>'https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/accountholder/{party_id_type}/{party_id}/active',
    'sandbox_disbursement_account_status_url'=>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/accountholder/{party_id_type}/{party_id}/active',


    /*
    |--------------------------------------------------------------------------
    |                        REMITTANCE API SECTION
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | remittance api user and key for sandbox and production environment
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_user_id              - remittance user for production environment
    |   remittance_api_key              - remittance api key for production environemt
    |   sandbox_remittance_user_id      - remittance user for sandbox 
    |   sandbox_remittance_api_key      - remittance api key for sandbox 
    */

    'remittance_user_id' => '0bad5d1d-f042-4a3c-8147-0bfe019251cf', //change this to your remittance user
    'remittance_api_key' => 'd5d8fda3a15142a4a0957427d84f715b', //change this to your remittance api key

    'sandbox_remittance_user_id' => 'c50d30ab-c5dd-487a-bdc0-ab1235ba5995', //change this to your sandbox  remittance user
    'sandbox_remittance_api_key'=> '66de01dde86d4abb97302e6b0b8de337', //change this to your sandbox remittance api key


    /*
    |--------------------------------------------------------------------------
    | remittance api token and ocp_apim_subscription_key for sandbox and production 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_ocp_apim_sub_key         - remittance ocp_apim_subscription_key for production environment
    |   remittance_token_url                - remittance token url for production environemt
    |   sandbox_remittance_ocp_apim_sub_key - remittance ocp_apim_subscription_key for sandbox 
    |   sandbox_remittance_token_url        - remittance token url for sandbox 
    */

    'remittance_ocp_apim_sub_key'=> '8489a030eb8c436e849f63667c9492dc', //change this to your remittance production  Ocp-Apim-Subscription-Key -- make sure it has a value
    'remittance_token_url'=> 'https://ericssonbasicapi1.azure-api.net/remittance/token/',

    'sandbox_remittance_ocp_apim_sub_key'=> '8399f29854944b569f83b9238f055afe', //change this to your remittance sandbox  Ocp-Apim-Subscription-Key -- make sure it has a value
    'sandbox_remittance_token_url'=> 'https://sandbox.momodeveloper.mtn.com/remittance/token/',

    /*
    |--------------------------------------------------------------------------
    | remittance api transfer endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_transaction_url          - remittance transfer endpoint for production environment
    |   remittance_call_back_url            - remittance transfer call_back_url for production environemt
    |   sandbox_remittance_transaction_url  - remittance transfer endpoint for sandbox 
    |   sandbox_remittance_call_back_url    - remittance transfer call_back_url for sandbox 
    */

    'remittance_transaction_url'=> 'https://ericssonbasicapi1.azure-api.net/remittance/v1_0/transfer',
    'remittance_call_back_url'=>'https://joballo.com', // change this to your remittance production call back url -- make it's not blank

    'sandbox_remittance_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/transfer',
    'sandbox_remittance_call_back_url'=>'', // change this to your remittance sandbox call back url -- make it's not blank

    /*
    |--------------------------------------------------------------------------
    | remittance api transaction status (transfer/{referenceid}) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_transaction_status_url           - remittance transfer/{referenceid} endpoint for production 
    |   sandbox_remittance_transaction_status_url   - remittance transfer/{referenceid} endpoint for sandbox
    |
    */

    'remittance_transaction_status_url' => 'https://ericssonbasicapi1.azure-api.net/remittance/v1_0/transfer/{momo_transaction_id}',
    'sandbox_remittance_transaction_status_url' =>'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/transfer/{momo_transaction_id}',

    /*
    |--------------------------------------------------------------------------
    | remittance api transaction status (/account/balance) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_account_balance_url           - remittance /account/balance endpoint for production 
    |   sandbox_remittance_account_balance_url   - remittance /account/balance endpoint for sandbox
    |
    */

    'remittance_account_balance_url'=>'https://ericssonbasicapi1.azure-api.net/remittance/v1_0/account/balance',
    'sandbox_remittance_account_balance_url'=>'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/account/balance',

    /*
    |--------------------------------------------------------------------------
    | remittance api transaction status (/accountholder/{party_id_type}/{party_id}/active) endpoint configuration 
    |--------------------------------------------------------------------------
    | This section contains configuration parameters for remittance api
    |
    |   remittance_account_status_url           - remittance /accountholder/{party_id_type}/{party_id}/active endpoint for production 
    |   sandbox_remittance_account_status_url   - remittance /accountholder/{party_id_type}/{party_id}/active endpoint for sandbox
    |
    */

    'remittance_account_status_url'=>'https://ericssonbasicapi1.azure-api.net/remittance/v1_0/accountholder/{party_id_type}/{party_id}/active',
    'sandbox_remittance_account_status_url'=>'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/accountholder/{party_id_type}/{party_id}/active',

];