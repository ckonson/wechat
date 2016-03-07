<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 13:46.
 */

namespace CkWechat\Core;

use CkWechat\Config\ApiUrl;
use CkWechat\Core;

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
        return Core\Http::get(ApiUrl::ACCESSTOKEN, $params);
    }
    private function checkSignature()
    {
            $signature = $_GET["signature"];
            $timestamp = $_GET["timestamp"];
            $nonce = $_GET["nonce"];

    	$token = TOKEN;
    	$tmpArr = array($token, $timestamp, $nonce);
    	sort($tmpArr, SORT_STRING);
    	$tmpStr = implode( $tmpArr );
    	$tmpStr = sha1( $tmpStr );

    	if( $tmpStr == $signature ){
    		return true;
    	}else{
    		return false;
    	}
    }
}
?>
