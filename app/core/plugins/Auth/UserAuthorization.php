<?php
namespace Blue\Plugins\Auth\UserAuthorization


use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

class UserAuthorization extends extends Plugin
{

  /**
   * This will fire before action
   * @param Event         $event
   * @param MvcDispatcher $dispatcher
   * @return boolean
   */
  public function beforeDispatch(Event $event, MvcDispatcher $dispatcher)
  {
    $controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

    //todo: add acl for controller actions
    $isLoginRequired = false;
    if($isLoginRequired){
      $dispatcher->forward([
				'controller' => 'Users',
				'action'     => 'login'
			]);
			return false;
    }
    
    return true;
  }
}
