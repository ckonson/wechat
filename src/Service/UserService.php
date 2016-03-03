<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/3
 * Time: 23:01
 */

namespace CkWechat\Service;
use CkWechat\Core\Container as Container;
use CkWechat\User;

class UserService implements ServiceInterface
{
    public function register(Container $obj)
    {
        $obj->user = function ($obj) {
          return new User\User($obj->access_token);
      };
    }
}
?>
