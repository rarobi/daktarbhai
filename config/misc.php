<?php

return [

    /*
     * In seconds
     * Default: 10 mins
     */
    'session_timeout_status' => env('SESSION_TIMEOUT_STATUS', true),
    'session_timeout'        => env('SESSION_TIMEOUT', 600),
    'force_https'            => env('FORCE_HTTPS', true),

    'app'                    => [
        'parent'        => [
            'company_name'  => 'Healthcare Information System Ltd.',
            'company_url'   => 'http://www.hislbd.com'
        ],
        'author_name'   => "Daktarbhai",
        'author_bio'    => "Daktarbhai is a groundbreaking initiative to facilitate the next generation of healthcare for Bangladesh. At Daktarbhai we offer an online based doctors’ appointment services.",
        'email'         => [
            'admin_mail'    => env('ADMIN_EMAIL', 'abrar.hc4u@gmail.com'),
            'contact_email' => 'info@daktarbhai.com',
        ],
        'android-native'    => [
            'package-name'  => 'com.hislbd.daktarbhai',
            'app_url'       => 'https://play.google.com/store/apps/details?id=com.hislbd.daktarbhai&hl=en',
        ],
        'ios'    => [
            'package-name'  => 'com.hislbd.daktarbhai.app.ios',
            'app_url'       => 'https://itunes.apple.com/us/app/daktarbhai/id1349150744?ls=1&mt=8',
        ],
        'social'    => [
            'facebook'  => 'https://www.facebook.com/mydaktarbhai',
            'twitter'   => 'https://twitter.com/daktarbhai',
            'youtube'   => 'https://www.youtube.com/channel/UCfnZR5v1hfiCN0_0my3ogxQ',
        ],

        'appointment'   => [
            'max_appointment_per_day'   => 10
        ],
        'subscription'  =>  [
            'robi'  =>  [
                'app_keyword'   =>  'daktarbhai'
            ]
        ]
    ],
    'web'                   =>[
        'facebook_app_id'           => env('FACEBOOK_APP_ID'),
        'fb_account_kit_version'    => env('FB_ACCOUNT_KIT_VERSION'),
        'fb_account_kit_secret'     => env('FB_ACCOUNT_KIT_SECRET'),
        'fb_account_kit_redirect'   => env('FB_ACCOUNT_KIT_REDIRECT'),
        'google_recapcha_sitekey'   => env('GOOGLE_RECAPTCHA_SITEKEY'),
        'google_map_key'            => env('GOOGLE_MAP_KEY'),
        'app_url'                   => env('APP_URL'),
        'app_env'                   => env('APP_ENV'),
        'subscription_active'       => env('SUBSCRIPTION_ACTIVE'),
        'api_call_timeout'          => env('API_CALL_TIMEOUT'),
        'api_domain_url'            => env('API_DOMAIN_URL', 'https://api.daktarbhai.com'),
        'agent_domain_url'          => env('AGENT_DOMAIN_URL','http://agent.daktarbhai.com/'),
        'blink_domain_url'          => env('BLINK_API_DOMAIN_URL', 'http://103.36.103.49/'),
    ],
    'site'                  => [
        'administration'    => 'administration.daktarbhai.com',
        'corporate_link'    => 'http://corporate.daktarbhai.com',
        'main_site'         => 'http://daktarbhai.com'
    ],
    'app_auth'                  => [
        'app_key'       => 'BUFWICFGGNILMSLIYUVH',
        'app_secret'    => 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE',
    ],
];
