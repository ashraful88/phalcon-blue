<?php
namespace Blue\Modules\Users\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Blue\Plugins\Auth\UserAuthorization;
use Blue\Modules\Users\Models\User as UserModel;
use Blue\Modules\Users\Controllers\Handler\UserCreateHandler;
use Blue\Modules\Users\Controllers\Handler\UserLoginHandler;
use Blue\Modules\Users\Controllers\Handler\UserReadHandler;

/**
* Users Controller
* register, login etc
*/
class UserController extends Controller
{
  /**
  * index
  */
  public function indexAction(){

  }

  /**
  * account login
  */
  public function loginAction(){
    $loggedIn = $this->dispatcher->getParam('payload');
    if($loggedIn !== false){
      $this->view->disable();
      $this->response->redirect("/accounts/profile");
    }

    $loginHandler = new UserLoginHandler($this);
    $res =  $loginHandler->handle();
    if($res !== false){
      //lOGIN SUCCESS !
      $this->view->disable();
      $this->flash->success("Welcome " . $res['name']);
      $this->response->redirect("/accounts/profile");
    }

  }

  /**
  * account logout
  */
  public function logoutAction(){
    $this->session->destroy();
    $this->response->redirect("/accounts/login");
  }

  public function changePasswordAction(){
    $loggedIn = $this->dispatcher->getParam('payload');
    if($loggedIn === false){
      $this->view->disable();
      $this->response->redirect("/accounts/logout");
    }
  }

  /**
  * user account registration
  */
  public function accountCreateAction(){
    $createHandler = new UserCreateHandler($this);
    $res =  $createHandler->handle();
    print_r($res);
  }

  /**
  * user profile and update form
  */
  public function profileAction(){
    //$readHandler = new UserReadHandler($this);
    // profile render here
    $loggedIn = $this->dispatcher->getParam('payload');
    if($loggedIn === false){
      $this->view->disable();
      $this->response->redirect("/accounts/logout");
    }
    $this->view->setVars($loggedIn);

  }

}
