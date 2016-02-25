<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/24
 * Time: 17:27.
 */

namespace CkWechat\Core;

use CkWechat\Common\Common as Common;

class Base
{
    protected $appId;
    protected $secret;
    protected $access_token;
    public function __construct($appId, $secret)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $token_json = (new AccessToken($this->appId, $this->secret))->getToken();
        if (Common::checkJson($token_json)) {
            $access_token_arr = json_decode($token_json,true);
            $this->access_token = $access_token_arr['access_token'];
        }else{
            #TODO
        }
    }
}
?>
