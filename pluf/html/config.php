<?php
return array(
    'debug' => false,

    'general_domain' => 'viraweb123.ir',
    'general_admin_email' => array(
        'info@viraweb123.ir'
    ),

    'installed_apps' => array(
        'Pluf',
        'User',
        'Monitor',
        'Tenant',
        'SuperTenant',
        'Bank',
        'Backup',
        'CMS',
        'Seo',
        'RestLog',
        'Shop',
        'Sdp',
        'Exchange',
        'Marketplace',
        'Tms',
        'SuperTms',
        'Jms',
        'SuperJms'
    ),
    'middleware_classes' => array(
        '\Pluf\Middleware\Tenant',
        '\Pluf\Seo\Middleware\Render',
        'Tenant_Middleware_ResourceAccess',
        'Tenant_Middleware_Verifier', // It should be the last middleware about tenant.
        // Load user and session
        '\Pluf\Middleware\Session',
        'User_Middleware_BasicAuth',
        'User_Middleware_Session',
        '\Pluf\Captcha\Middleware\Verifier', // Must be affter session and tenant
        '\Pluf\Cache\Middleware\RFC7234'
    ),

    'mimetypes_db' => '/var/www/etc/mime.types',
    'languages' => array(
        'fa',
        'en'
    ),
    'tmp_folder' => '/tmp',
    'upload_path' => '/var/www/storage',
    'upload_max_size' => 524288000,
    'time_zone' => 'Asia/Tehran',
    'encoding' => 'UTF-8',
    'secret_key' => '5a8d7e0f2aad8bdab8f6eef725412850',
    'migrate_allow_web' => false,
    /*
     * Mail
     */
    'mail_backend' => 'mail',

    // -------------------------------------------------------------
    // View and REST API
    // -------------------------------------------------------------
    'view_api_prefix' => '/api/v2',
    'view_api_base' => '',

    // -------------------------------------------------------------
    // Template
    // -------------------------------------------------------------
    'template_folders' => array(
        '/var/www/storage/templates',
        '/var/www/vendor/pluf/seo/src/Seo/templates',
        '/var/www/vendor/pluf/bank/src/Bank/templates'
    ),
    'template_tags' => array(
        'now' => 'Pluf_Template_Tag_Now',
        'cfg' => 'Pluf_Template_Tag_Cfg',
        'tenant' => 'Pluf_Template_Tag_Tenant',
        'setting' => 'Tenant_Template_Tag_Setting'
    ),

    // -------------------------------------------------------------
    // Logger
    // -------------------------------------------------------------
    'log_level' => 'error',
    'log_delayed' => true,
    'log_formater' => '\Pluf\LoggerFormatter\Plain',
    'log_appender' => '\Pluf\LoggerAppender\Console',

    // -------------------------------------------------------------
    // DB and Data layer (ORM)
    // -------------------------------------------------------------
    'db_engine' => '\Pluf\Db\MySQLEngine',
    'db_schema' => '\Pluf\Db\MySQLSchema',
    'db_version' => '5.5.33',
    'db_login' => 'pluf',
    'db_password' => 'password',
    'db_server' => 'mysql',
    'db_database' => 'plufdb',
    'db_table_prefix' => '',

    // -------------------------------------------------------------
    // backup
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // Captcha
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // CMS
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // Bank & Disount
    // -------------------------------------------------------------

    'bank_debug' => false,

    // -------------------------------------------------------------
    // DM (Download manager)
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // marketplace
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // monitor
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // sdp
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // SEO
    // -------------------------------------------------------------
    'seo_prerender_global_url' => 'http://185.224.139.115:3000',
    'seo_prerender_global_token' => 'no-need',

    'seo_prerender_default_enable' => true,
    'seo_prerender_default_engine' => 'global',
    'seo_prerender_default_period' => '+7 days',
    'seo_prerender_default_pattern' => '.*',

    // -------------------------------------------------------------
    // shop
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // mall
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // jms
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // super-jms
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // tenant
    // -------------------------------------------------------------
    'tenant_spa_marketplace_backend' => 'https://marketplace.viraweb123.ir',
    'tenant_spa_marketplace_api_prefix' => '/api/v2',
    'tenant_spa_default' => array(
        'wb',
        'vw-studio',
        'vw-dashboard'
    ),
    'tenant_spa_config' => 'spa.json',
    'tenant_default' => 'www',

    'tenant_subdomains_min_length' => 5,
    'tenant_subdomains_reserved' => array(
        'www',
        'blog',
        'developer',
        'developers',
        'market',
        'marketplace'
    ),
    'tenant_notfound_url' => 'https://viraweb123.ir/wb/shop/how-config-notfound-tenant',

    // -------------------------------------------------------------
    // super-tenant
    // -------------------------------------------------------------
    'multitenant' => true,

    // -------------------------------------------------------------
    // tms
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // super-tms
    // -------------------------------------------------------------

    // -------------------------------------------------------------
    // user
    // -------------------------------------------------------------
    'user_account_auto_activate' => true,
    'user_avatra_max_size' => 2097152

    // 'user_profile_class' => 'User_Profile',
);

