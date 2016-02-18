<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:41.
 */

namespace CkWechat\Cache;

class FileCache
{
    protected $cache_path = '';
    protected $cache_time = '';
    public function __construct(array $params = null)
    {
        $this->cache_path = $params['cache_path'];
        $this->cache_time = $params['cache_time'];
        $this->init();
    }
    public function init()
    {
        if (!empty($this->cache_path) && !is_dir($this->cache_path)) {
            mkdir($this->cache_path, 0755);
        } elseif (empty($this->cache_path)) {
            $this->cache_path = '_wechat_cache';
            mkdir($this->cache_path, 0755);
        }
    }
    public function getKey($key = '')
    {
        $result = '';
        if (empty($key)) {
            #TODO
        }
        $cache_file = $this->cache_path.$key;
        if (!empty($key) && file_exists($cache_file)) {
            $result = file_get_contents($cache_file);
        } else {
            #TODO
        }
    }
    public function setkey($key = '', $value = '')
    {
        if (empty($key) || empty($value)) {
           #TODO
        }
        $cache_file = $this->cache_path.$key
        if (!is_writable(dirname($cache_file))) {
            #TODO
        }else{
            $len = file_put_contents($cache_file, $value);
            if (strlen($value) == $len) {
              return true;
            }
            return false;
        }
    }
}
