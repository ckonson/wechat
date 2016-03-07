<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/24
 * Time: 17:27.
 */

namespace CkWechat\Core;

class Base
{
    protected $access_token;
    protected $http;
    public function __construct($access_token)
    {
        $this->access_token = $access_token;
        $this->http = new Http();
    }
    public function buildTokenUri(string $url,$uri_params=array)
    {
        $params = array('access_token' => $this->access_token);
        if (!empty($uri_params)) {
          $params = array_merge($params,$uri_params);
        }
        return $url.'?'.http_build_query($params);
    }
}
