<?php
/** Module loader
 * installed modules */

$application->registerModules(
  array(
    'users' => array(
      'className' => 'Blue\Users\Module',
      'path'      => '../app/code/modules/Users/Module.php',
    )
  )
);
