<?php
/**
 * Where on the filesystem this application is installed
 */
define('APPLICATION_HOME', __DIR__);
define('VERSION', trim(file_get_contents(APPLICATION_HOME.'/VERSION')));

/**
 * Multi-Site support
 *
 * To allow multiple sites to use this same install base,
 * define the SITE_HOME variable in the Apache config for each
 * site you want to host.
 *
 * SITE_HOME is the directory where all site-specific data and
 * configuration are stored.  For backup purposes, backing up this
 * directory would be sufficient for an easy full restore.
 */
define('SITE_HOME', !empty($_SERVER['SITE_HOME']) ? $_SERVER['SITE_HOME'] : __DIR__.'/data');
include SITE_HOME.'/site_config.inc';

//-------------------------------------------------------------------
// Bootstrap code
// No editing is usually needed after this point
//-------------------------------------------------------------------
/**
 * Enable autoloading for the PHP libraries
 */
$loader = require APPLICATION_HOME.'/vendor/autoload.php';
$loader->addPsr4('Site\\', SITE_HOME.'/src');

include APPLICATION_HOME.'/src/container/container.php';
include APPLICATION_HOME.'/routes.inc';
include APPLICATION_HOME.'/access_control.inc';

if (defined('GRAYLOG_DOMAIN') && defined('GRAYLOG_PORT')) {
    $graylog = new Application\GraylogWriter(GRAYLOG_DOMAIN, GRAYLOG_PORT);
    $logger  = new Zend\Log\Logger();
    $logger->addWriter($graylog);
    Zend\Log\Logger::registerErrorHandler($logger);
    Zend\Log\Logger::registerExceptionHandler($logger);
    Zend\Log\Logger::registerFatalErrorShutdownFunction($logger);
}
