<?php

include __DIR__.'/../config.inc.php';

return [
    'paths' => [
        'migrations' => [
            '%%PHINX_CONFIG_DIR%%/../update/migrations/*/',
            '%%PHINX_CONFIG_DIR%%/../modules/*/migrations/*/',
            '%%PHINX_CONFIG_DIR%%/../plugins/*/migrations/*/',
        ],
        'seeds' => '%%PHINX_CONFIG_DIR%%/../update/seeds/*/',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',

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
    'migration_base_class' => 'Update\Migration',
    'version_order' => 'creation'
];
