<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Mailchimp Configuration
        |--------------------------------------------------------------------------
        |
        | This file is for storing the credentials and list details for Mailchimp.
        | The values are loaded from your .env file. Ensure you have added the
        | required keys: MAILCHIMP_API_KEY, MAILCHIMP_SERVER_PREFIX, MAILCHIMP_LIST_ID.
        |
        */

        'apiKey' => env('MAILCHIMP_API_KEY'),
        'serverPrefix' => env('MAILCHIMP_SERVER_PREFIX'),
        'listId' => env('MAILCHIMP_LIST_ID'),

    ];
