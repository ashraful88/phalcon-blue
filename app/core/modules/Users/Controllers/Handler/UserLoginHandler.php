<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;
use Blue\Modules\Users\Models\Users;

class UserLoginHandler extends UserHandlerAbstract{

  public function __construct(UserController $controller)
  {
    parent::__construct($controller);
  }

  public function handle()
  {
    if ($this->controller->request->isPost()) {
      $username = $this->controller->request->getPost("username");
      $password = $this->controller->request->getPost("password");

      if(!$username && !$password){
        return false;
      }

      $usersModel = new Users();
      if (($result = $usersModel->login($username, $password)) == null) {
        return false;
      }
      //$userDao = new User();
      //$userDao->init($userData);
      if(empty($result['user_id']) && empty($result['name'])){
        return false;
      }
      $this->controller->session->set(
        "auth",
        [
          "user_id"   => $result['user_id'],
          "name" => $result['name'],
        ]
      );
      
      return $result;
    }

    return false;
  }

}
