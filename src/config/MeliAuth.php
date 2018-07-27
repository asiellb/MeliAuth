<?php

return [
    'client_id' => env('MELI_CLIENT_ID',''),
    'client_secret' => env('MELI_CLIENT_SECRET',''),
    'callback_uri' => env('MELI_CALLBACK_URI',''),
    'success_redirect' => env('MELI_SUCCESS_REDIRECT','melisuccess'),
    'site' => env('MELI_SITE','MLA'),
];