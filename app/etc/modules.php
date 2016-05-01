<?php
/** Module loader
 * installed modules */

$application->registerModules(
  array(
    'users' => array(
      'className' => 'Blue\Modules\Users\Module',
      'path'      => '../app/core/modules/Users/Module.php',
    ),
    'blog' => array(
      'className' => 'Blue\Modules\Blog\Module',
      'path'      => '../app/core/modules/Blog/Module.php',
    )
  )
);
