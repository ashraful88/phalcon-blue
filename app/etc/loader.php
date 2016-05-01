<?php
/**
 * Phalcon loader
 */
$loader = new Phalcon\Loader();

/**
 * We're a registering a set of directories
 */
$loader->registerNamespaces(array(
  'Blue\Plugins' => 'app/core/plugins'
));

$loader->register();
