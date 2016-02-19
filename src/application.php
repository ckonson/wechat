<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51.
 */

namespace CkWechat;

use CkWechat\Core;
use CkWechat\CustomMenu;
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
        $this->access_token = $result;
        return $result;
    }
    public function getWechatBackIps()
    {
        return (new Core\GetBackIps($this->access_token))->getIps();
    }
    public function createMenu()
    {
        return (new CustomMenu\createMenu($this->access_token))->add();
    }
}
