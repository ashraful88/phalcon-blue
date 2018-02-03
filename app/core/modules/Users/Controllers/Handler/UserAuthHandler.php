<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;
use Blue\Modules\Users\Models\Users;

class UserReadHandler extends UserHandlerAbstract{

  public function __construct(UserController $controller)
  {
    parent::__construct($controller);
  }

 /**
 * Handel accounts login
 * TODO: add logging
 */
  public function handle()
  {
    if ($this->controller->request->isPost()) {
      // disable view rendering
      $this->controller->view->disable();
      // Access POST data
      $username = $this->controller->request->getPost("username");
      $password = $this->controller->request->getPost("password");

      if(!$username && !$password){
        return false;
      }

      $usersModel = new Users();
      if (($result = $usersModel->login($username, $password)) == null) {
        // login failed
        return false;
      }
      return $result;
    }
  }

}
