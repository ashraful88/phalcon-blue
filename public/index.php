<?php
/**
 * Phalcon-Blue
 * Blogging script using Phalcon php Framework
 * https://github.com/ashraful88/phalcon-blue
 * 
 */

error_reporting(E_ALL);

$debug = new \Phalcon\Debug();
$debug->listen();

use Phalcon\Mvc\Application;

define('APP_PATH', realpath('..') . '/');

try {

  define('BASE_DIR', dirname(__DIR__));
  define('APP_DIR', BASE_DIR . '/app');

  $config = include APP_DIR . '/etc/Config.php';

  /**
   * Composer autoload 
   */
  require BASE_DIR . "/vendor/autoload.php";

  /**
   * Handle the request
   */
  $application = new Application($di);

  /**
   * Include modules
   */
  require APP_DIR . '/etc/Modules.php';

  /**
   * Include routes
   */
  require APP_DIR . '/etc/Routes.php';

  // Handle the request
  echo $application->handle()->getContent();

} catch (\Phalcon\Exception $e) {
  echo $e->getMessage();
  echo $e->getTraceAsString();
}

