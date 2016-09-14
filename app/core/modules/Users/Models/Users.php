<?php
namespace Blue\Modules\Users\Models;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Model;
use Phalcon\Db;
use Phalcon\Config;
use Blue\Modules\Users\Models\Dao\User;

/**
 * User Model
 * @property FactoryDefault di
 */
class Users extends Model
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

  /**
   * @param $userId
   * @return mixed|null
   */
  public function getUserById($userId){
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT user_get(?);", [$userId]);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Get User Failed: %s error: %s", $userId, $this->error));
    }
    return null;
  }

  /**
   * @param $email
   * @return mixed|null
   */
  public function getUserByEmail($email){
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT user_get_by_email(?);", [$email]);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Get User by Email Failed: %s, error: %s", $email, $this->error));
    }
    return null;
  }

  /**
   * @param User $user
   * @return bool
   */
  public function updateUser(User $user){
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      //TODO: add parameters
      $set = $database->query("SELECT user_update(?);", [$user]);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("User update failed: error: %s", $this->error));
    }
    return null;
  }
}