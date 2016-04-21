<?php
/**
* Phalcon loader
*/
$loader = new Phalcon\Loader();

/**
 * We're a registering a set of directories
 */
$loader->registerNamespaces(array(
    'Blue\Users\Controllers' => 'app/core/modules/users/controllers',
    'Blue\Users\Models' => 'app/core/modules/users/models'
));

$loader->register();
