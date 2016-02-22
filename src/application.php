<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51.
 */

namespace CkWechat;

use CkWechat\Cache\FileCache;

class Application
{
    protected $appId;
    protected $secret;
    protected $access_token;
    public function __construct($appId, $secret)
    {
        $this->appId = $appId;
        $this->secret = $secret;
    }
    public function getToken()
    {
        $result = '';
        $AccessToken_object = new Core\AccessToken($this->appId, $this->secret);
        $cache_key = md5($this->appId.$this->secret);
        $cache_obj = new FileCache();
        $cache_token = $cache_obj->getKey($cache_key);
        if (!$cache_token) {
            $result = $AccessToken_object->getToken();
            $cache_obj->setkey($cache_key, $result);
        } else {
            $result = $cache_token;
        }
        $temp_result = array();
        $temp_result = json_decode($result, true);
        $this->access_token = isset($temp_result['access_token']) ? $temp_result['access_token'] : '';

        return $result;
    }
    public function getWechatBackIps()
    {
        return (new Core\GetBackIps($this->access_token))->getIps();
    }
    public function createMenu($menu_data)
    {
        json_decode($menu_data);
        if ((json_last_error() == JSON_ERROR_NONE) == false) {
            #如果不是json 字符串 应为一个数组 并且 进行json_encode
          $menu_data = json_encode($menu_data, JSON_UNESCAPED_UNICODE);
        }
        #TODO create post data
        if (empty($this->access_token)) {
            $this->getToken();
        }

        return (new CustomMenu\createMenu($this->access_token))->add($menu_data);
    }
    public function getUserList()
    {
        return (new User\User($this->access_token))->get();
    }
    public function getUserInfo($openid)
    {
        return (new User\User($this->access_token))->getUserInfo();
    }
}
