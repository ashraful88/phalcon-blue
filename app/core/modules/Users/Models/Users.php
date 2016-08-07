<?php
namespace Blue\Modules\Users\Models;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Model;
use Phalcon\Db;
use Phalcon\Config;

/**
 * User Model
 * @property FactoryDefault di
 */
class User extends Model
{
  /** @var string */
  protected $error;

  /**
   * @return string
   */
  public function getError()
  {
    return $this->error;
  }

  /**
   * @return AdapterInterface
   */
  protected function getLogger()
  {
    return $this->di->get("logger");
  }
  /**
   * @param $email
   * @param $password
   * @return mixed|null
   */
  public function login($email, $password)
  {
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT user_login(?,?);", [$email, $password]);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Login Failed: %s  %s, error: %s", $email, $password, $this->error));
    }
    return null;
  }
}