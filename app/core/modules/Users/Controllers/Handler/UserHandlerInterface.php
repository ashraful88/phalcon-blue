<?php
namespace Blue\Modules\Users\Controllers\Handler;

use Phalcon\Http\ResponseInterface;

interface UserHandlerInterface{
  /**
   * @return ResponseInterface
   */
  public function handle();
}