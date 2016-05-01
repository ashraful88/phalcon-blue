<?php
namespace Blue\Modules\Blog;

use Blue\Plugins\Auth\UserAuthorization;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Events\Manager as EventsManager;

/**
 * Class Module
 * @package Blue\Modules\Blog
 */
class Module implements ModuleDefinitionInterface
{
  /**
   * Autoloader for the module
   * @param $di
   */
  public function registerAutoloaders(DiInterface $di = null)
  {
    $loader = new Loader();
    $loader->registerNamespaces(
      array(
        'Blue\Blog\Controllers' => '../app/core/modules/Blog/Controllers/',
        'Blue\Blog\Models'      => '../app/core/modules/Blog/Models/',
      )
    );
    $loader->register();
  }

  /**
   * Services for the module
   * @param $di
   */
  public function registerServices(DiInterface $di)
  {
    // Registering a dispatcher
    $di->set('dispatcher', function () {
      $eventsManager = new EventsManager();
      $eventsManager->attach('dispatch:beforeDispatch', new UserAuthorization());
      $dispatcher = new Dispatcher();
      $dispatcher->setDefaultNamespace('Blue\Blog\Controllers');
      $dispatcher->setEventsManager($eventsManager);
      return $dispatcher;
    });

    // Registering the view
    $di->set('view', function () {
      $view = new View();
      $view->setViewsDir(__DIR__ . '/Views/');
      return $view;
    });
  }
}
