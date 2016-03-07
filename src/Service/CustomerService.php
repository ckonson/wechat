<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/2
 * Time: 19:16.
 */

namespace CkWechat\Service;
use CkWechat\Core\Container as Container;
use CkWechat\CustomerService;

class CustomerService implements ServiceInterface
{
    public function register(Container $obj)
    {
        $obj->message = function ($obj) {
          return new CustomerService\Message($obj->access_token);
      };
    }
}
?>
