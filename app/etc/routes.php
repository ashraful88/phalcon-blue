<?php /**Router */
use Phalcon\Mvc\Router;

$router = new Router();


$router->add(
    "/admin-backend",
    array(
        "controller" => "users",
        "action"     => "login"
    )
);
$router->add(
    "/login",
    array(
        "controller" => "users",
        "action"     => "login"
    )
);
$router->add(
    "/logout",
    array(
        "controller" => "users",
        "action"     => "logout"
    )
);
$router->add(
    "/users/change-password",
    array(
        "controller" => "users",
        "action"     => "changePassword"
    )
);


// Create a group with a common module and controller
$blog = new RouterGroup(
    array(
        'module'     => 'blog',
        'controller' => 'index'
    )
);

// All the routes start with /blog
$blog->setPrefix('/blog');
$blog->add('/save',array(
        'action' => 'save'
    )
);
$blog->add('/edit/{id}',array(
        'action' => 'edit',
        'd' => 1
    )
);
$blog->add('/blog',array(
        'controller' => 'blog',
        'action'     => 'index'
    )
);
// Add the group to the router
$router->mount($blog);



$router->handle();
