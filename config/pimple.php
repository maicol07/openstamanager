<?php

use Monolog\Handler\StreamHandler;
use Monolog\Handler\FilterHandler;
use Monolog\Handler\RotatingFileHandler;

/**
 * Get plugin's container.
 *
 * @return \Pimple\Container
 */
function container()
{
    static $container;

    if (!$container) {
        $container = new \Pimple\Container();
    }

    return $container;
}

$container = container();

$container['configuration'] = function ($c) {
    $config = App::getConfig();

    $config['lang'] = !empty($config['lang']) ? $config['lang'] : 'it';
    $config['formatter'] = !empty($config['formatter']) ? $config['formatter'] : [];

    return $config;
};

$container['session'] = function ($c) {
    // Sicurezza della sessioni
    ini_set('session.use_trans_sid', '0');
    ini_set('session.use_only_cookies', '1');

    session_set_cookie_params(0, $c['paths']['rootdir'], null, isHTTPS(true));
    session_start();

    return $_SESSION;
};

$container['auth'] = function ($c) {
    return new Auth($c['session']);
};

$container['api'] = function ($c) {
    return new API();
};

$container['flash'] = function ($c) {
    return new \Util\Messages($c['session'], 'messages');
};

$container['paths'] = function ($c) {
    return [
        'docroot' => DOCROOT,
        'rootdir' => ROOTDIR,
        'baseurl' => BASEURL,
    ];
};

$container['database'] = function ($c) {
    $config = $c['configuration'];

    return new Database($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']);
};

$container['translator'] = function ($c) {
    $config = $c['configuration'];

    $translator = new Translator($lang);
    $translator->addLocalePath($c['paths']['docroot'].'/locale');
    $translator->addLocalePath($c['paths']['docroot'].'/modules/*/locale');

    $translator->setFormatter($c['formatter']);

    return $translator;
};

$container['formatter'] = function ($c) {
    $config = $c['configuration'];

    $patterns = $config['formatter'];

    $formatter = new Intl\Formatter(
        $config['lang'],
        empty($patterns['timestamp']) ? 'd/m/Y H:i' : $patterns['timestamp'],
        empty($patterns['date']) ? 'd/m/Y' : $patterns['date'],
        empty($patterns['time']) ? 'H:i' : $patterns['time'],
        empty($patterns['number']) ? [
            'decimals' => ',',
            'thousands' => '.',
        ] : $patterns['number']
    );

    $formatter->setPrecision(auth()->check() ? setting('Cifre decimali per importi') : 2);

    return $formatter;
};

$container['builder'] = function ($c) {
    $config = $c['configuration'];

    $builder = new HTMLBuilder\HTMLBuilder();

    // Aggiunta del wrapper personalizzato per la generazione degli input
    if (!empty($config['HTMLWrapper'])) {
        $builder->setWrapper($config['HTMLWrapper']);
    }

    // Aggiunta dei gestori personalizzati per la generazione degli input
    foreach ((array) $config['HTMLHandlers'] as $key => $value) {
        $builder->setHandler($key, $value);
    }

    // Aggiunta dei gestori per componenti personalizzate
    foreach ((array) $config['HTMLManagers'] as $key => $value) {
        $builder->setManager($key, $value);
    }

    return $builder;
};

$container['logger'] = function ($c) {
    $logger = new Monolog\Logger('Logs');
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushProcessor(new Monolog\Processor\WebProcessor());

    $handlers = [];
    if (!API::isAPIRequest()) {
        // File di default
        $handlers[] = new StreamHandler($c['paths']['docroot'].'/logs/error.log', Monolog\Logger::ERROR);
        $handlers[] = new StreamHandler($c['paths']['docroot'].'/logs/setup.log', Monolog\Logger::EMERGENCY);

        // Impostazioni di debug
        if (!empty(App::debug())) {
            // Ignora gli avvertimenti e le informazioni relative alla deprecazione di componenti
            error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_USER_DEPRECATED);

            // File di log ordinato in base alla data
            $handlers[] = new RotatingFileHandler($c['paths']['docroot'].'/logs/error.log', 0, Monolog\Logger::ERROR);
            $handlers[] = new RotatingFileHandler($c['paths']['docroot'].'/logs/setup.log', 0, Monolog\Logger::EMERGENCY);
        }
    } else {
        $handlers[] = new StreamHandler($c['paths']['docroot'].'/logs/api.log', Monolog\Logger::ERROR);
    }

    // Disabilita la segnalazione degli errori (se il debug è disabilitato)
    if (empty(App::debug())) {
        error_reporting(0);
    }

    // Imposta il formato di salvataggio dei log
    $monologFormatter = new Monolog\Formatter\LineFormatter($c['log_pattern']);

    if (!empty(App::debug())) {
        $monologFormatter->includeStacktraces(true);
    }

    foreach ($handlers as $handler) {
        $handler->setFormatter($monologFormatter);
        $logger->pushHandler(new FilterHandler($handler, [$handler->getLevel()]));
    }

    return $logger;
};

$container['log_pattern'] = function ($c) {
    $pattern = '[%datetime%] %channel%.%level_name%: %message%';
    if (!empty(App::debug())) {
        $pattern .= ' %context%';
    }
    $pattern .= PHP_EOL.'%extra% '.PHP_EOL;

    return $pattern;
};

$container['whoops'] = function ($c) {
    $whoops = null;

    if (!API::isAPIRequest() && !empty(App::debug())) {
        $prettyPageHandler = new Whoops\Handler\PrettyPageHandler();

        // Imposta Whoops come gestore delle eccezioni di default
        $whoops = new Whoops\Run();
        $whoops->pushHandler($prettyPageHandler);

        // Abilita la gestione degli errori nel caso la richiesta sia di tipo AJAX
        if (Whoops\Util\Misc::isAjaxRequest()) {
            $whoops->pushHandler(new Whoops\Handler\JsonResponseHandler());
        }

        $whoops->register();
    }

    return $whoops;
};
