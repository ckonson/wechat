<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/7
 * Time: 17:55.
 */

namespace CkWechat\CustomService;
use CkWechat\Core;
use CkWechat\Config\ApiUrl;

class Message extends Core\Base
{
    public function send($post_data)
    {
        return Core\Http::post($this->buildTokenUri(ApiUrl::MESSAGECUSTOMSEND), $post_data);
    }
}
