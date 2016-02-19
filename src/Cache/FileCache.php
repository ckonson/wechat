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
    protected $cache_file_name = '';
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
        } elseif (!is_dir($this->cache_path)) {
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
        $this->cache_file = $this->cache_path.DIRECTORY_SEPARATOR.$key;
        if (!empty($key) && file_exists($this->cache_file)) {
            $result = file_get_contents($this->cache_file);
        } else {
            #TODO
        }
    }
    public function setkey($key = '', $value = '')
    {
        if (empty($key) || empty($value)) {
           #TODO
        }
        $this->cache_file = $this->cache_path.DIRECTORY_SEPARATOR.$key;
        if (!is_writable(dirname($this->cache_file))) {
            #TODO
            echo "缓存文件写入失败";
        }else{
            $len = file_put_contents($this->cache_file, $value);
            if (strlen($value) == $len) {
              return true;
            }
            return false;
        }
    }
}
