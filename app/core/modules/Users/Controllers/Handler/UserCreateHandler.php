<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Blue\Modules\Users\Controllers\UserController;
use Blue\Modules\Users\Models\Dao\User;

class UserCreateHandler extends UserHandlerAbstract
{

  public function __construct(UserController $controller)
  {
    parent::__construct($controller);
  }

  public function handle()
  {
    if ($this->request->isPost()) {
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
      $user = new User();
      $user->init($userData);
    } else {
      //todo:view here
    }

  }

}