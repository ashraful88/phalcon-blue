<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;
use Blue\Modules\Users\Models\Users;

class UserUpdateHandler extends UserHandlerAbstract
{

  public function __construct(UserController $controller)
  {

  }

  public function handle()
  {
    if ($this->request->isPost()) {
      // Access POST data
      $userData = [
        'name'     => $this->controller->request->getPost("name"),
        'email'    => $this->controller->request->getPost("email"),
        'password' => $this->controller->request->getPost("password"),
        'user_id'  => $this->controller->request->getPost("user_id"),
        'status'   => $this->controller->request->getPost("status"),
        'params'   => $this->controller->request->getPost("params")
      ];
      $userDao = new User();
      $userDao->init($userData);

      $usersModel = new Users();
      if (($result = $usersModel->updateUser($userDao)) == null) {
        return false;
      }
      return $result;

    } else {
      //todo:view here
    }
  }

}