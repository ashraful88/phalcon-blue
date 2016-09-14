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
    if ($this->request->isPost()) {
      // Access POST data
      $customerName = $this->request->getPost("name");
      $customerBorn = $this->request->getPost("email");
    }else{
      //TODO: render view here, create form
    }
  }

  /**
   * Account update
   */
  public function accountUpdateAction()
  {

  }

}
