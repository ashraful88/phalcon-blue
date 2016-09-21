<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;
use Blue\Modules\Users\Models\Users;

class UserReadHandler extends UserHandlerAbstract{

  public function __construct(UserController $controller)
  {

  }

  public function handle()
  {
    //TODO: this is for user profile view
    $userData = $this->controller->request->getPost("id");
    $userDao = new User();
    $userDao->init($userData);

    $usersModel = new Users();
    if (($result = $usersModel->getUserById($userData)) == null) {
      return false;
    }
    return $result;
  }

}