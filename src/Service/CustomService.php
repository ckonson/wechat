<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/2
 * Time: 19:16.
 */

namespace CkWechat\Service;
use CkWechat\Core\Container as Container;
use CkWechat\CustomService;

class CustomService implements ServiceInterface
{
    public function register(Container $obj)
    {
        $obj->message = function ($obj) {
          return new CustomService\Message($obj->access_token);
      };
      $obj->kfaccount = function ($obj) {
        return new CustomService\Kfaccount($obj->access_token);
    };
    }
}
?>
