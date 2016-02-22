<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/22
 * Time: 14:58
 */

namespace CkWechat\User;

use CkWechat\Config\ApiUrl;
use CkWechat\Core;

class User
{
  protected $access_token;
  public function __construct($access_token)
  {
      $this->access_token = $access_token;
  }
  public function get()
  {
    $params = array('access_token' => $this->access_token);
    $http = new Core\Http();
    #fix wechat api rule post body is json string and JSON_UNESCAPED_UNICODE
    return $http->get(ApiUrl::GetUserList, $params);
  }
}
