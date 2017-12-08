<?php
/**
 * Phalcon-Blue
 * Blogging script using Phalcon php Framework
 * https://github.com/ashraful88/phalcon-blue
 *
 */

error_reporting(E_ALL);
set_error_handler("handleError");

$debug = new \Phalcon\Debug();
$debug->listen();

use Phalcon\Mvc\Application;

define('APP_PATH', realpath('..') . '/');

try {

  define('BASE_DIR', dirname(__DIR__));
  define('APP_DIR', BASE_DIR . '/app');
  
  $config = include APP_DIR . '/etc/config.php';
  require APP_DIR . '/etc/loader.php';
  require APP_DIR . '/etc/services.php';

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
  require APP_DIR . '/etc/modules.php';

  /**
   * Include routes
   */
  require APP_DIR . '/etc/routes.php';

  // Handle the request
  echo $application->handle()->getContent();

} catch (\Exception $e) {
  echo $e->getMessage();
  echo $e->getTraceAsString();
}

function handleError($errorNo, $errorStr){
  $response = new \Phalcon\Http\Response();
  $response->setStatusCode(500, "Internal Server Error");
  $response->setHeader("Content-Type", "application/json");
  $json = [
    "errors" => [
      [
        "status"    => 500,
        "errorCode" => $errorNo,
        "title"     => "Internal Server Error",
        "detail"    => (($errorStr !== null) ? $errorStr : "Unexpected error in server")
      ]
    ]
  ];
  $response->setContent(json_encode($json));
  $response->send();
}

