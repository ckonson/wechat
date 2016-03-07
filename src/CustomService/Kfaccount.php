<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/7
 * Time: 18:06.
 */

namespace CkWechat\CustomService;

use CkWechat\Core;
use CkWechat\Config\ApiUrl;

class Kfaccount extends Core\Base
{
    /**
      * [add description].
      *
      * @method add
      *
      * @param  jsonstring $post_data {"kf_account" : "test1@test","nickname" : "客服1","password" : "pswmd5",}
      */
     public function add($post_data)
     {
         return Core\Http::post($this->buildTokenUri(ApiUrl::KFACCOUNTADD), $post_data);
     }
    public function get()
    {
        $url = $this->buildTokenUri(ApiUrl::GETKFACCOUNT);

        return Core\Http::get($url);
    }
    public function update($post_data)
    {
        $url = $this->buildTokenUri(ApiUrl::UPDATEKFACCOUNT);

        return Core\Http::post($url, $post_data);
    }
    public function delete($post_data)
    {
        $url = $this->buildTokenUri(ApiUrl::DELKFACCOUNT);

        return Core\Http::post($url, $post_data);
    }
    public function uploadImg($kfaccount = '', $post_data)
    {
        $url = $this->buildTokenUri(ApiUrl::DELKFACCOUNT, array('kf_account' => $kfaccount));

        return Core\Http::post($url, $post_data);
    }
}
