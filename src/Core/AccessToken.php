<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 13:46.
 */

namespace CkWechat\Core;

use CkWechat\Cache\FileCache;
use CkWechat\Config\ApiUrl;

class AccessToken
{
    protected $appid;
    protected $secret;
    public function __construct($appId, $secret)
    {
        $this->appid = $appId;
        $this->secret = $secret;
    }
    public function getToken()
    {
        $params = array(
          'appid' => $this->appid,
          'secret' => $this->secret,
          'grant_type' => 'client_credential',
        );
        $http = new Http();
        return $http->get(ApiUrl::AccessToken, $params);
    }
}
