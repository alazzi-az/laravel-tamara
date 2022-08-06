<?php

// config for AlazziAz/Tamara
return [
    'uri' => env('TAMARA_URI', 'https://api-sandbox.tamara.co'),
    'token' => env('TAMARA_TOKEN', ''),
    'notification_token' => env('TAMARA_NOTIFICATION_TOKEN', ''),
    'request_timeout' => env('TAMARA_REQUEST_TIMEOUT', 10),
    'transport' => null,
    'success_url' => '',
    'failure_url' => '',
    'cancel_url' => '',
    'notification_url' => '',

];
