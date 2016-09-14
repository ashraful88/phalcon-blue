<?php
namespace Blue\Modules\Users\Controllers\Handler;


abstract class UserHandlerAbstract implements UserHandlerInterface{

  protected $controller;

  public function __construct(UserController $controller)
  {
    $this->controller = $controller;

  }
}