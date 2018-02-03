<?php /** Router */
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group as RouterGroup;


$di->set('router', function () {
  $router = new Router();
  $router->setDefaultModule("blog");

  $router->add("/", array(
    'module'     => 'blog',
    'controller' => 'blog',
    'action'     => 'index'
  ));

  // Create a group with a common module and controller
  $users = new RouterGroup(
    array(
      'module'     => 'users',
      'controller' => 'user'
    )
  );
  $users->setPrefix('/accounts');
  $users->add(
    "/create",
    array(
      "controller" => "user",
      "action"     => "accountCreate"
    )
  );
  $users->add(
    "/login",
    array(
      "controller" => "user",
      "action"     => "login"
    )
  );
  $users->add(
    "/logout",
    array(
      "controller" => "user",
      "action"     => "logout"
    )
  );
  $users->add(
    "/profile",
    array(
      "controller" => "user",
      "action"     => "profile"
    )
  );
  $users->add(
    "/users/change-password",
    array(
      "controller" => "user",
      "action"     => "changePassword"
    )
  );
  // Add the group to the router
  $router->mount($users);

  // Create a group with a common module and controller
  $blog = new RouterGroup(
    array(
      'module'     => 'blog',
      'controller' => 'index'
    )
  );

  // All the routes start with /blog
  $blog->setPrefix('/blog');
  $blog->add('/save', array(
    'action' => 'save'
  )
);
$blog->add('/edit/{id}', array(
  'action' => 'edit',
  'd'      => 1
)
);
$blog->add('/blog', array(
  'controller' => 'blog',
  'action'     => 'index'
)
);
// Add the group to the router
$router->mount($blog);

return $router;
//$router->handle();

});
