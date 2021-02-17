<?php

return [
    'sites' => [
        'default' => [
            'tracking_id' => env("PHPSA_SA_TRACKING_ID", null),
            'anonymize_ip' => env('PHPSA_SA_ANONYMIZE_IP', false),
            'async' => env('PHPSA_SA_ASYNC', false),
            'display_features' => env('PHPSA_SA_DISPLAY_FEATURES', false),
            'link_id' => env('PHPSA_SA_LINK_ID', false),
            'beacon' => env('PHPSA_SA_BEACON', false),
            'track_uid' => env('PHPSA_SA_TRACK_UID', false),
            'ignore_admins' => env('PHPSA_SA_IGNORE_ADMINS', true),
            'debug' => env('PHPSA_SA_DEBUG', false),
            'trace_debugging' => env('PHPSA_SA_TRACE_DEBUGGING', false),
            'disable_sending' => env('PHPSA_SA_DISABLE_SENDING', false),
        ]
    ]
];
