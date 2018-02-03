<?php
/**
 * Services
 */
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Db\Adapter\Pdo\Postgresql as DbAdapter;

/**
 * Register the global configuration as config
 */
$di->set('config', $config);

/**
 * Start the session the first time a component requests the session service
 */
$di->setShared('session', function () {
  $session = new Session();
  $session->start();
  return $session;
});

/**
 * The URL component is used to generate all kind of URLs in the application
 */
$di->setShared('url', function () use ($config) {
  $url = new UrlProvider();
  $url->setBaseUri($config->application->baseUri);
  return $url;
});

$di->setShared('logger', function () use ($globalLogger) {
	return $globalLogger;
});

/**
 * Database connection
 */
$di->setShared('db', function () use ($config) {
  return new DbAdapter([
      "host"     => $config->database->host,
      "username" => $config->database->username,
      "password" => $config->database->password,
      "dbname"   => $config->database->dbname
    ]);
});
