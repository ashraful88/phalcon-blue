<?php
namespace Blue\Modules\Users\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Blue\Plugins\Auth\UserAuthorization;
use Blue\Modules\Users\Models\User as UserModel;
use Blue\Modules\Users\Controllers\Handler\UserCreateHandler;

/**
 * Users Controller
 * register, login etc
 */
class UserController extends Controller
{
  /**
   * index
   */
  public function indexAction()
  {
    echo 'Blue';
  }

  /**
   * account login
   */
  public function loginAction()
  {
    echo 'login here';
  }

  /**
   * account logout
   */
  public function logoutAction()
  {

  }

  public function changePasswordAction()
  {

  }

  /**
   * user account registration
   */
  public function accountCreateAction()
  {
    $createHandler = new UserCreateHandler($this);
    return $createHandler->handle();
  }

  /**
   * Account update
   */
  public function accountUpdateAction()
  {

  }

}
