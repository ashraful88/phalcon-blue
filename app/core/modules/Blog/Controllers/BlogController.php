<?php
namespace Blue\Modules\Blog\Controller;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Blue\Plugins\Auth\UserAuthorization;
use Blue\Modules\Users\Models\User as UserModel;
use Blue\Modules\Blog\Models\Posts as PostsModel;
/**
 * Users Controller
 * register, login etc
 */
class BlogController extends Controller
{

  public function indexAction()
  {
    echo 'Blog index';
  }

  public function detailsAction()
  {
    echo 'Post details';
  }

  public function postsByCategoryAction()
  {

  }

  public function postsByTagAction()
  {

  }

}
