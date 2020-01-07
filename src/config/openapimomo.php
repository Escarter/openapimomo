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

    'collection_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your production collection user -- required
    'collection_api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your production collection api key -- required

    'sandbox_collection_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your sandbox collection user -- required
    'sandbox_collection_api_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your sandbox collection api key -- required

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

    'collection_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your collection Ocp-Apim-Subscription-Key -- required
    'collection_token_url'=> 'https://ericssonbasicapi1.azure-api.net/collection/token/',
    
    'sandbox_collection_ocp_apim_sub_key'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your collection  Ocp-Apim-Subscription-Key -- required 
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
    'collection_call_back_url'=>'', // change this to your collection production call back url -- required

    'sandbox_collection_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',
    'sandbox_collection_call_back_url'=>'', // change this to your collection sandbox call back url 
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

    'disbursement_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your disbursement user -- required
    'disbursement_api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement api key -- required

    'sandbox_disbursement_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your sandbox  disbursement user -- required
    'sandbox_disbursement_api_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your sandbox disbursement api key -- required


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

    'disbursement_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement Ocp-Apim-Subscription-Key  -- required
    'disbursement_token_url'=> 'https://ericssonbasicapi1.azure-api.net/disbursement/token/',

    'sandbox_disbursement_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement Ocp-Apim-Subscription-Key -- required
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
    'disbursement_call_back_url'=>'', // change this to your disbursement production call back url -- required

    'sandbox_disbursement_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/transfer',
    'sandbox_disbursement_call_back_url'=>'', // change this to your disbursement sandbox call back url 

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

    'remittance_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your remittance user -- required
    'remittance_api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your remittance api key -- required

    'sandbox_remittance_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your sandbox  remittance user -- required
    'sandbox_remittance_api_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your sandbox remittance api key -- required


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

    'remittance_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your remittance  Ocp-Apim-Subscription-Key -- required
    'remittance_token_url'=> 'https://ericssonbasicapi1.azure-api.net/remittance/token/',

    'sandbox_remittance_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your remittance Ocp-Apim-Subscription-Key -- required
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
    'remittance_call_back_url'=>'', // change this to your remittance production call back url -- required

    'sandbox_remittance_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/transfer',
    'sandbox_remittance_call_back_url'=>'', // change this to your remittance sandbox call back url 

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
