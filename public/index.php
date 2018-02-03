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
use Phalcon\Di\FactoryDefault;

$globalLogger = new \Phalcon\Logger\Adapter\Syslog(
	"phalcon-blue",
	array(
		'option'   => LOG_NDELAY,
		'facility' => LOG_LOCAL0
	)
);

define('APP_PATH', realpath('..') . '/');
define('BASE_DIR', dirname(__DIR__));
define('APP_DIR', BASE_DIR . '/app');

try {
	/** Composer autoload */
	require BASE_DIR . "/vendor/autoload.php";

	/** Load environment variables */
  $dotenv = new Dotenv\Dotenv(realpath(BASE_DIR));
  $dotenv->load();
  /**
   * The FactoryDefault Dependency Injector
	 * registers services for full-stack framework
   */
  $di = new FactoryDefault();

  include APP_DIR . '/etc/config.php';
  require APP_DIR . '/etc/loader.php';
  require APP_DIR . '/etc/services.php';

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
  $globalLogger->critical($e->getMessage());
	$globalLogger->critical($e->getTraceAsString());
	echo $e->getMessage();
	echo $e->getTraceAsString();
}

function handleError($errorNo, $errorStr, $errfile, $errline){
  $response = new \Phalcon\Http\Response();
  $response->setStatusCode(500, "Internal Server Error");
  $response->setHeader("Content-Type", "application/json");
  $json = [
    "errors" => [
      [
        "status"    => 500,
        "errorCode" => $errorNo,
        "title"     => "Internal Server Error",
        "detail"    => (($errorStr !== null) ? $errorStr." file: ".$errfile." line: ".$errline : "Unexpected error in server")
      ]
    ]
  ];
  $response->setContent(json_encode($json));
  $response->send();
}
