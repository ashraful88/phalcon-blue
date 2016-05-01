<?php
/**
 * Global Configuratuion for phalcon
 */

$config = new \Phalcon\Config(array(
  "database" => array(
    "adapter"  => "Mysql",
    "host"     => "localhost",
    "username" => "root",
    "password" => "",
    "dbname"   => "phalcon-blue"
  )
));
