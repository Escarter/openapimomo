### OpenapiMoMo Documentation
This is a laravel package that helps you easily use the [MTN OpenAPI](https://momodeveloper.mtn.com) in your laravel project.
This package simplifies the integration of this API by providing simple methods which you can use when calling the different endpoints provided by this API. 
This package contains a configuration file that helps you easily manage your settings in a single location and permits you to swap between environments with a single value change.  

#### How to install?
You can install this package to your laravel application using composer as below

```php
composer require escarter/openapimomo 
```

After installation is complete, you will have to publish the configuration file by running the command below

```php
php artisan vendor:publish --provider="Escarter\Openapimomo\OpenapiMoMoServiceProvider"
```
This will move the **openapimomo.php** configuration file to your config folder. Open this file and update as required.

Before you start using this package, you need to update the configuration file appropriately.
##### General configuration

```php
  /*
    |--------------------------------------------------------------------------
    | General configuration
    |--------------------------------------------------------------------------
    | This section contains general configurations parameters
    |
    |   environment           - specifies the api environment. -- takes 'sandbox','mtncameroon'
    |   currency              - specifies the currency you are using. -- takes 'XAF','EUR','UGX'
    |   party_id_type         - specifies the party id type. -- takes 'MSISDN'
    |   transaction_id        - specifies the transaction id. 
    | 
    */

    'environment' => 'sandbox',
    'currency' => 'EUR',
    'party_id_type' => 'MSISDN',
    'transaction_id' => Illuminate\Support\Str::uuid(), 

```

##### Collection API configuration
This section contains configurations for the collection API. Ensure to replace the keys with their appropriate values

```php
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

    'collection_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 
    'collection_api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',

    'sandbox_collection_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
    'sandbox_collection_api_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',

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

    'collection_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'collection_token_url'=> 'https://ericssonbasicapi1.azure-api.net/collection/token/',
    
    'sandbox_collection_ocp_apim_sub_key'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
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
    'collection_call_back_url'=>'',

    'sandbox_collection_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',
    'sandbox_collection_call_back_url'=>'',

```
The other parts of the collection section stays untouched, only the section shown above should be updated. Same goes for the Disbursement and Remittance sections in the configuration file.

##### Disbursement API configuration
This section contains configurations for the disburement API. Ensure to replace the keys with their appropriate values

```php
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

    'disbursement_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your disbursement user
    'disbursement_api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement api key

    'sandbox_disbursement_user_id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', //change this to your sandbox  disbursement user
    'sandbox_disbursement_api_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your sandbox disbursement api key


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

    'disbursement_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement production  Ocp-Apim-Subscription-Key 
    'disbursement_token_url'=> 'https://ericssonbasicapi1.azure-api.net/disbursement/token/',

    'sandbox_disbursement_ocp_apim_sub_key'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //change this to your disbursement sandbox  Ocp-Apim-Subscription-Key 
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
    'disbursement_call_back_url'=>'https://call_back_url.com',

    'sandbox_disbursement_transaction_url' =>'https://sandbox.momodeveloper.mtn.com/disbursement/v1_0/transfer',
    'sandbox_disbursement_call_back_url'=>'',

```
The Remittance section is similar, so will leave it out from the documentation.

**Note:**
- Collection API user and Collection API key are different from disbursement and remittance. Each API has it's user and key
- You can generate sandbox user for these APIs here [Sandbox user provisioning](https://momodeveloper.mtn.com/docs/services/sandbox-provisioning-api/operations/post-v1_0-apiuser) 
- Here is a video showing you how you can provision a sandbox user and api key for each of the APIs how to generate sandbox users and api keys
  - [Generate a sandbox collection api user and key](https://youtu.be/sUbMLfel3AM)
  - [Generate a sandbox disbursement api user and key](https://youtu.be/1VYo45V6xaI)
  - [Generate a sandbox remittance api user and key](https://youtu.be/4B_Z6U29Lgo)

#### How to use this package ?
Below are sample codes showing how you can use this package.

##### 1. sample requesttopay and get transaction status (Collection API)
Once all your configurations are done, you can peform a requesttopay using the get transaction status method to check the transaction as show below.
Ensure that you have a correct collection 
- API user
- API key
- Ocp-Apim-Subscription-Key 

properly set in the config file

```php
<?php

namespace App\Http\Controllers;

use Escarter\Openapimomo\OpenapiMoMo;


class ProcessPaymentController extends Controller
{
    public function handlePayment(Request $request){
        .....

        $momoapi = new OpenapiMoMo();

        $trans_id = $momoapi->requestPayment('354660098865', '1', 'payer_message', 'payee_notes');

        $init_trans_status = $momoapi->getCollectionTransactionStatus($trans_id);

        $current_trans_status = $init_trans_status['status'];

        /** Note: when a request is made to the requesttopay endpoint its default status on success is 'PENDING' (waiting for user confirmation)
         * so you might want to write some logic that waits for user's confirmation before you proceed or peform this in the background depending on your application logic.
         * below is the sample code i use since i need to confirm payment before proceeding to next step in my application(this has it's drawbacks) :(
         * 
         *    while($current_trans_status == 'PENDING'){
         *          $init_trans_status = $momoapi->getCollectionTransactionStatus($trans_id);
         *          $current_trans_status = $init_trans_status['status'];
         *     }
        */

        if($current_trans_status == "SUCCESSFUL") {
            // persist some data in your application 
            return 'to some view with success message!';
        }else{
            // persist some data in your application
            return 'to some view with error message!';
        }
    }

    }
}

```


##### 2.  Check Collection account balance (Collection API)

The sample code below shows you how to get your collection account balance.

```php

$momoapi = new OpenapiMoMo();
$coll_acc_balance = $momoapi->getCollectionAccountBalance();
dd($coll_acc_balance);

```
##### 3. Sample transfer request (Disbursement API)

Before you can perform a transfer request, you should ensure that you have properly updated the disbursement section in the **openapimomo.php** configuration file with the correct
- API user
- API key
- Ocp-Apim-Subscription-Key 

```php
<?php

namespace App\Http\Controllers;

use Escarter\Openapimomo\OpenapiMoMo;


class ProcessPayoutController extends Controller
{
    public function handlePayout(Request $request){
        .....

        $momoapi = new OpenapiMoMo();

        $trans_id = $momoapi->disbursementTransfer('354660098865', '1', 'payer_message', 'payee_notes');

        $trans_status = $momoapi->getDisbursementTransactionStatus($trans_id);
        
        if($trans_status == "SUCCESSFUL") {
            // persist some data in your application 
            return 'to some view with success message!';
        }else{
            // persist some data in your application
            return 'to some view with error message!';
        }
    }

    }
}

```
##### 4.  Check Disbursement account balance (Disbursement API)

The sample code below shows you how to get your disburement account balance.

```php

$momoapi = new OpenapiMoMo();
$disburs_acc_balance = $momoapi->getDisbursementAccountBalance();
dd($disburs_acc_balance);

```

Thanks. 









