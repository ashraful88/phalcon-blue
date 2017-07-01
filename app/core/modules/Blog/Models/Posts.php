<?php
namespace Blue\Modules\Blog\Models;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Model;
use Phalcon\Db;
use Phalcon\Config;
use Phalcon\Http\Request;
use Blue\Modules\Blog\Models\PostDAO;
/**
 * Posts Model
 */
class Posts extends Model
{
  public function getPosts(){

  }
  public function getPostById(){

  }
  public function getPostBySlug(){

  }
  public function createPost($request){
    $dao = new PostDAO();
    $dao->setTitle($request->getPost('title'));
    $dao->setBody($request->getPost('body'));
    
  }
  public function deletePost(){

  }



}
