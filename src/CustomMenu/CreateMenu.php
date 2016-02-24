<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/19
 * Time: 17:49.
 */

namespace CkWechat\CustomMenu;

use CkWechat\Config\ApiUrl;
use CkWechat\Core;

class CreateMenu
{
    protected $access_token;
    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }
    public function add($menu_data)
    {
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();
        #fix wechat api rule post body is json string and JSON_UNESCAPED_UNICODE
        return $http->post(ApiUrl::CREATEMENU, $params, $menu_data);
    }
    public function get()
    {
      $params = array('access_token' => $this->access_token);
      $http = new Core\Http();
      #fix wechat api rule post body is json string and JSON_UNESCAPED_UNICODE
      return $http->get(ApiUrl::GETMENU, $params);
    }
    public function delete()
    {
      $params = array('access_token' => $this->access_token);
      $http = new Core\Http();
      #fix wechat api rule post body is json string and JSON_UNESCAPED_UNICODE
      return $http->get(ApiUrl::DELETEMENU, $params);
    }
}
?>
