<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51
 */

namespace CkWechat;

use CkWechat\Core;
use CkWechat\Cache\FileCache;

class application
{
  public function getToken($appId, $secret)
  {
    return (new AccessToken($appId, $secret))->getToken();
  }
}
