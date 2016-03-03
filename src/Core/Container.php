<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/2
 * Time: 16:21
 */

namespace CkWechat\Core;


class Container
{
    private $s = array();
    public $di_objects = array();
    private $cache_list = array();
    /**
     * [__set description]
     * @method __set
     * @param  [type] $k [description]
     * @param  [type] $c [description]
     */
    public function __set($k, $c)
    {
        if (!in_array($k, $this->di_objects)) {
            $this->di_objects[] = $k;
        }
        if (!is_object($c)) {
            $this->$k = $c;
        } else {
            $this->s[$k] = $c;
        }
    }
    /**
     * [__get description]
     * @method __get
     * @param  [type] $k [description]
     * @return [type]    [description]
     */
    public function __get($k)
    {
        if (empty($k)) {
            return;
        }
        if (isset($this->s[$k])) {
            #return $this->s[$k]($this);
            $temp_cache_obj = $this->getCache($k);
            if ($temp_cache_obj == false) {
                $obj = $this->s[$k]($this);
                $this->setCache($k, $obj);
                return $obj;
            } else {
                return $temp_cache_obj;
            }
        }

        return;
    }
    /**
     * [getCache description]
     * @method getCache
     * @param  [type]   $key [description]
     * @return [type]        [description]
     */
    public function getCache($key)
    {
        if (isset($this->cache_list[$key])) {
            return $this->cache_list[$key];
        }

        return false;
    }
    /**
     * [setCache description]
     * @method setCache
     * @param  [type]   $key   [description]
     * @param  [type]   $value [description]
     */
    public function setCache($key, $value)
    {
        $this->cache_list[$key] = $value;

        return true;
    }
}
