<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/2
 * Time: 19:16.
 */

namespace CkWechat\Service;
use CkWechat\Core\Container as Container;
use CkWechat\User;

class GroupService implements ServiceInterface
{
    public function register(Container $obj)
    {
        $obj->group = function ($obj) {
          return new User\Group($obj->access_token);
      };
    }
}
?>
