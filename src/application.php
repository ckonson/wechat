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

class Application extends Core\Container
{
    protected $appId;
    protected $secret;
    protected $access_token;

    public function __construct(array $config)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $this->getToken();
        $access_token = $this->access_token;
        $this->group = function () use ($access_token) {
          return new User\Group($access_token);
        };
        echo Service\GroupService::class;
    }

    public function register()
    {
        # code...
        $providers = array(Service\GroupService::class);
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
}
