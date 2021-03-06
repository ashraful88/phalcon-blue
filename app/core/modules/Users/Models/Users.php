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
  public function getError(){
    return $this->error;
  }

  /**
   * @return mixed
   */
  protected function getLogger(){
    return $this->di->get("logger");
  }

  /**
   * @param User $user
   * @return mixed|null
   */
  public function createUser(User $user){
    $userData = [
      $user->getName(),
      $user->getEmail(),
      $user->getPhone(),
      $user->getPassword(),
      $user->getStatus(),
      $user->getParams()
    ];
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT o_user_id AS user_id FROM user_create(?,?,?,?,?,?);", $userData);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Create User Failed: %s, error: %s", $user->getEmail(), $this->error));
    }
    return null;
  }

  /**
   * @param $username
   * @param $password
   * @return mixed|null
   */
  public function login($username, $password)
  {
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query(
        "SELECT o_user_id AS user_id, o_name AS name, o_phone AS phone, o_email AS email, o_status AS status FROM user_login(?,?);",
        [$username, $password]
      );
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Login Failed: %s  %s, error: %s", $username, $password, $this->error));
    }
    return null;
  }

  /**
   * @param $userId
   * @return mixed|null
   */
  public function getUserById($userId)
  {
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT * FROM user_get(?);", [$userId]);
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
  public function getUserByEmail($email)
  {
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT * FROM user_get_by_email(?);", [$email]);
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
  public function updateUser(User $user)
  {
    $userData = [
      $user->getId(),
      $user->getEmail(),
      $user->getPassword(),
      $user->getParams(),
      $user->getStatus()
    ];
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT o_user_id AS user_id FROM user_update(?,?,?,?,?);", $userData);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("User update failed: userId %s error: %s", $user->getId(), $this->error));
    }
    return null;
  }

  /**
   * @param $userId
   * @return mixed|null
   */
  public function deleteUser($userId)
  {
    /** @var Db\AdapterInterface $database */
    $database = $this->di->get("db");
    try {
      $set = $database->query("SELECT * FROM user_delete(?);", [$userId]);
      $set->setFetchMode(Db::FETCH_ASSOC);
      $result = $set->fetch();
      return $result;
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
      $this->getLogger()->error(sprintf("Get delete user Failed: userId %s, error: %s", $userId, $this->error));
    }
    return null;
  }

}
