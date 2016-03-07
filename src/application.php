<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51.
 */

namespace CkWechat;

use CkWechat\Cache\FileCache;

class Application extends Core\Container
{
    protected $appId;
    protected $secret;
    public $access_token;
    private $service_list = array(
      Service\UserService::class,
      Service\CustomerService::class,
    );

    public function __construct(array $config)
    {
        $this->appId = $config['appId'];
        $this->secret = $config['secret'];
        $this->cache_path = isset($config['cache_path']) ? $config['cache_path'] : '';
        $this->cache_time = isset($config['cache_time']) ? $config['cache_time'] : '';
        $this->getToken();
        $this->setServices();
    }
    public function addService($value = '')
    {
        $this->service_list[] = $value;
    }

    public function setServices()
    {
        foreach ($this->service_list as $service_name) {
            $this->register(new $service_name());
        }
    }

    public function register($service_obj)
    {
        $service_obj->register($this);

        return $this;
    }

    public function getToken()
    {
        $result = '';
        $AccessToken_object = new Core\AccessToken($this->appId, $this->secret);
        $cache_key = md5($this->appId.$this->secret);
        $conf = array(
          'cache_path' => $this->cache_path,
          'cache_time' => $this->cache_time,
        );
        $cache_obj = new FileCache($conf);
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
