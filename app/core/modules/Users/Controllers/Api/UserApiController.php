<?php
namespace Blue\Modules\Users\Api\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Blue\Plugins\Auth\UserAuthorization;
use Blue\Modules\Users\Models\User as UserModel;
/**
 * Users Controller
 * register, login etc
 */
class UserApiController extends Controller
{

  public function indexAction()
  {
    echo 'Blue API';
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
