<?php

include __DIR__.'/../config.inc.php';

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/../update/migrations/*/',
        'migrations' => '%%PHINX_CONFIG_DIR%%/../modules/*/migrations/*/',
        'migrations' => '%%PHINX_CONFIG_DIR%%/../plugins/*/migrations/*/',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',

        'migration_base_class' => '\Util\Migration',

        'development' => [
            'adapter' => 'mysql',
            'host' => $db_host,
            'name' => $db_name,
            'user' => $db_username,
            'pass' => $db_password,
            'port' => '3306',
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation'
];
