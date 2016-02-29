<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51.
 */

namespace CkWechat;

use CkWechat\Cache\FileCache;
use CkWechat\Common\Common as Common;

class Application
{
    protected $appId;
    protected $secret;
    protected $access_token;
    public function __construct($appId, $secret)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $this->getToken();
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
    public function createMenu($post_data)
    {
        $post_data = Common::toJsonStr($post_data);

        return (new CustomMenu\createMenu($this->access_token))->add($post_data);
    }
    public function getUserList()
    {
        return (new User\User($this->access_token))->get();
    }
    public function getUserInfo($openid)
    {
        return (new User\User($this->access_token))->getUserInfo($openid);
    }
    public function setUserMark($post_data)
    {
        $post_string = Common::toJsonStr($post_data);

        return (new User\User($this->access_token))->setUserMark($post_string);
    }
    public function getGroups()
    {
        return (new User\Group($this->access_token))->getGroups();
    }
    public function createGroups($post_data)
    {
        $post_string = Common::toJsonStr($post_data);

        return (new User\Group($this->access_token))->createGroups($post_string);
    }
    public function getUserGroups($post_data)
    {
        $post_string = Common::toJsonStr($post_data);

        return (new User\Group($this->access_token))->getUserGroups($post_string);
    }
    public function updateGroups($post_data)
    {
        $post_string = Common::toJsonStr($post_data);

        return (new User\Group($this->access_token))->updateGroups($post_string);
    }
    public function updateUserGroups($post_data)
    {
        $post_string = Common::toJsonStr($post_data);

        return (new User\Group($this->access_token))->updateUserGroups($post_string);
    }
    public function deleteGroups($group_id = 0)
    {
        $post_data = array('group' => array('id' => $group_id));
        $post_string = Common::toJsonStr($post_data);

        return (new User\Group($this->access_token))->deleteGroups($post_string);
    }
    public function __call($name, $arguments)
    {
        if ($name === 'call') {
            $count = substr_count($arguments[0], '\\');
            if ($count == 2) {
                $class_info = str_split($arguments[0], strrpos($arguments[0], '\\'));
                $class_name = __NAMESPACE__.'\\'.$class_info[0];
                $action_name = trim($class_info[1], '\\');

                return (new $class_name($this->appId, $this->secret))->$action_name(array_shift($arguments));
                #echo call_user_func_array(array(__NAMESPACE__."\User\Group", $action_name), array_shift($arguments));
            } else {
                # code...
            }
        }
    }
}
