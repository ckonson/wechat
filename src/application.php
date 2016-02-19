<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 15:51.
 */

namespace CkWechat;

use CkWechat\Core\AccessToken;
use CkWechat\Cache\FileCache;

class Application
{

    public function getToken($appId, $secret)
    {
        $result = '';
        $AccessToken_object = new AccessToken($appId, $secret);
        $cache_key = md5($appId.$secret);
        $cache_obj = new FileCache();
        $cache_token = $cache_obj->getKey($cache_key);
        if (!$cache_token) {
            $result = $AccessToken_object->getToken();
            $cache_obj->setkey($cache_key,$result);
        }else{
            $result = $cache_token;
        }

        return $result;
    }
}
