<?php
namespace Blue\Modules\Users\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Blue\Plugins\Auth\UserAuthorization;
use Blue\Modules\Users\Models\User as UserModel;
/**
 * Users Controller
 * register, login etc
 */
class UserController extends Controller
{

  public function indexAction()
  {
    echo 'Blue';
  }

  public function loginAction()
  {
    echo 'login here';
  }

  public function logoutAction()
  {

  }

  public function changePasswordAction()
  {

  }

}
