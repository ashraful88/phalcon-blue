<?php
namespace Blue\Plugins\Auth;


use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

class UserAuthorization extends Plugin
{

  /**
   * This will fire before action
   * @param Event $event
   * @param MvcDispatcher $dispatcher
   * @return boolean
   */
  public function beforeDispatch(Event $event, MvcDispatcher $dispatcher){
    $controller = $dispatcher->getControllerName();
    $action = $dispatcher->getActionName();

    //todo: acl for controller actions, may be we don't need acl now
    $isLoginRequired = false;
    if ($isLoginRequired) {
      $dispatcher->forward([
        'controller' => 'Users',
        'action'     => 'login'
      ]);
      return false;
    }
    $auth = $this->session->get("auth", false);
    $dispatcher->setParam('payload', $auth);
    if (empty($auth['user_id'])) {
      $dispatcher->setParam('payload', false);
    }

    return true;
  }

}
