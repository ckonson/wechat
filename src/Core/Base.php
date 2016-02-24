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
    protected $appId;
    protected $secret;
    protected $access_token;
    public function __construct($appId, $secret)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $this->access_token = (new AccessToken($this->appId, $this->secret))->getToken();
    }
}
