<?php

return [
    'timeout' => 30,
    'token' =>  env('PUSHE_TOKEN', null),
    'app_ids' => [env('PUSHE_APP_ID', null)],
    'retry_attempt' => 3,
    'retry_wait_milliseconds' => 100,
];