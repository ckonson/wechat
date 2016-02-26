<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/19
 * Time: 16:57
 */

namespace CkWechat\Core;

use CkWechat\Core\AccessToken;
use CkWechat\Config\ApiUrl;

class GetBackIps extends Base
{
    public function getIps()
    {
      $params = array(
        'access_token' => $this->access_token,
      );
      $http = new Http();
      return $http->get(ApiUrl::BACKIPS, $params);
    }
}
?>
