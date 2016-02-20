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
    public function add()
    {
        # code...
      #
      # http_build_query($post_data)
    /*  $post_data = {
     "button":[
     {
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 };*/
      $post_data = array('button' => array(
        array('type' => 'click', 'name' => '今日歌曲', 'key' => 'V1001_TODAY_MUSIC'),
        array(
          'name' => '菜单',
          'sub_button' => array(
            'type' => 'view', 'name' => '搜索', 'url' => 'http://www.soso.com/',
        ),
      ),
    ));
        $params = array(
        'access_token' => $this->access_token,
      );
        $http = new Core\Http();

        return $http->post(ApiUrl::CreateMenu, $params, $post_data);
    }
}
