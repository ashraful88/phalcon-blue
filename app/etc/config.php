<?php
/**
 * Global Configuratuion for phalcon
 */

$config = new \Phalcon\Config(array(
  "database" => array(
    'adapter'  => 'Postgresql',
    'host'     => getenv("DB_HOST", "localhost"),
    'username' => getenv("DB_USER"),
    'password' => getenv("DB_PASSWORD", ''),
    'dbname'   => getenv("DB_NAME")
  )
));
