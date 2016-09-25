<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;
use Blue\Modules\Users\Models\Users;

class UserCreateHandler extends UserHandlerAbstract
{

  public function __construct(UserController $controller)
  {
    parent::__construct($controller);
  }

  public function handle()
  {
    if ($this->controller->request->isPost()) {
      $this->controller->view->disable();
      // Access POST data
      $userData = [
        'name'        => $this->controller->request->getPost("name"),
        'email'       => $this->controller->request->getPost("email"),
        'password'    => $this->controller->request->getPost("password"),
        'user_id'     => null,
        'status'      => 1,
        'params'      => null,
        'create_time' => date('Y-m-d H:i:s.uO')
      ];
      print_r($userData);
      /*$userDao = new User();
      $userDao->init($userData);

      $usersModel = new Users();
      if (($result = $usersModel->createUser($userDao)) == null) {
        return false;
      }
      return $result;*/

    } else {
      //echo 'login form';
      //todo:view here
    }

  }

}