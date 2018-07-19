<?php

// Rimozione header X-Powered-By
header_remove('X-Powered-By');

// Impostazioni di configurazione PHP
date_default_timezone_set('Europe/Rome');

// Controllo sulla versione PHP
$minimum = '5.6.0';
if (version_compare(phpversion(), $minimum) < 0) {
    echo '
<p>Stai utilizzando la versione PHP '.phpversion().', non compatibile con OpenSTAManager.</p>

<p>Aggiorna PHP alla versione >= '.$minimum.'.</p>';
    exit();
}

// Caricamento delle impostazioni personalizzabili
if (file_exists(__DIR__.'/config.inc.php')) {
    include_once __DIR__.'/config.inc.php';
}

// Caricamento delle dipendenze e delle librerie del progetto
require_once __DIR__.'/vendor/autoload.php';

// Individuazione dei percorsi di base
App::definePaths(__DIR__);

$docroot = DOCROOT;
$rootdir = ROOTDIR;
$baseurl = BASEURL;

// Redirect al percorso HTTPS se impostato nella configurazione
if (!empty($redirectHTTPS) && !isHTTPS(true)) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit();
}

require_once __DIR__.'/config/pimple.php';

// Forza l'abilitazione del debug
// $debug = App::debug(true);

// Supporto grafico per il debug
$whoops = container()['whoops'];

// Logger per la segnalazione degli errori
$logger = container()['logger'];

// Registrazione globale del logger
Monolog\Registry::addLogger($logger, 'logs');

// Inizializzazione della sessione
if (!API::isAPIRequest()) {
    $session = container()['session'];
}

// Individuazione di versione e revisione del progetto
$version = Update::getVersion();
$revision = Update::getRevision();

$dbo = database();

// Controllo sulla presenza dei permessi di accesso basilari
$continue = $dbo->isInstalled() && !Update::isUpdateAvailable() && (Auth::check() || API::isAPIRequest());

if (!empty($skip_permissions)) {
    Permissions::skip();
}

if (!$continue && getURLPath() != slashes(ROOTDIR.'/index.php') && !Permissions::getSkip()) {
    if (Auth::check()) {
        Auth::logout();
    }

    redirect(ROOTDIR.'/index.php');
    exit();
}

// Operazione aggiuntive (richieste non API)
if (!API::isAPIRequest()) {
    // Impostazioni di Content-Type e Charset Header
    header('Content-Type: text/html; charset=UTF-8');

    // Controllo CSRF
    csrfProtector::init();

    // Registrazione globale del template per gli input HTML
    register_shutdown_function('translateTemplate');
    ob_start();

    // Retrocompatibilità
    $_SESSION['infos'] = isset($_SESSION['infos']) ? array_unique($_SESSION['infos']) : [];
    $_SESSION['warnings'] = isset($_SESSION['warnings']) ? array_unique($_SESSION['warnings']) : [];
    $_SESSION['errors'] = isset($_SESSION['errors']) ? array_unique($_SESSION['errors']) : [];

    // Impostazione del tema grafico di default
    $theme = !empty($theme) ? $theme : 'default';

    if ($continue) {
        $id_module = filter('id_module');
        $id_record = filter('id_record');
        $id_plugin = filter('id_plugin');
        $id_parent = filter('id_parent');

        // Periodo di visualizzazione dei record
        // Personalizzato
        if (!empty($_GET['period_start'])) {
            $_SESSION['period_start'] = $_GET['period_start'];
            $_SESSION['period_end'] = $_GET['period_end'];
        }
        // Dal 01-01-yyy al 31-12-yyyy
        elseif (!isset($_SESSION['period_start'])) {
            $_SESSION['period_start'] = date('Y').'-01-01';
            $_SESSION['period_end'] = date('Y').'-12-31';
        }

        $user = Auth::user();

        if (!empty($id_module)) {
            $module = Modules::get($id_module);

            $pageTitle = $module['title'];

            // Segmenti
            if (!isset($_SESSION['module_'.$id_module]['id_segment'])) {
                $segments = Modules::getSegments($id_module);
                $_SESSION['module_'.$id_module]['id_segment'] = isset($segments[0]['id']) ? $segments[0]['id'] : null;
            }

            Permissions::addModule($id_module);
        }

        if (!empty($skip_permissions)) {
            Permissions::skip();
        }

        Permissions::check();
    }

    // Retrocompatibilità
    $post = Filter::getPOST();
    $get = Filter::getGET();
}
