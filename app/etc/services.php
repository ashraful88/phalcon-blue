<?php
/**
 * Services
 */
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Di\FactoryDefault;

/**
 * The FactoryDefault Dependency Injector automatically registers the
 * right services providing a full-stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of URLs in the application
 */
$di->set('url', function () use ($config) {
  $url = new UrlProvider();
  $url->setBaseUri($config->application->baseUri);
  return $url;
});

/**
 * Start the session the first time a component requests the session service
 */
$di->set('session', function () {
  $session = new Session();
  $session->start();
  return $session;
});

$di->setShared('logger', function () use ($globalLogger) {
	return $globalLogger;
});

/**
 * Database connection is created based on parameters defined in the configuration file
 */
/*$di->set('db', function () use ($config) {
  return new DbAdapter(
    array(
      "host"     => $config->database->host,
      "username" => $config->database->username,
      "password" => $config->database->password,
      "dbname"   => $config->database->name
    )
  );
});*/
