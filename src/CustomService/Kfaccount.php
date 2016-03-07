<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/7
 * Time: 18:06
 */

 namespace CkWechat\CustomService;
 use CkWechat\Core;
 use CkWechat\Config\ApiUrl;

 class Kfaccount extends Core\Base
 {
     /**
      * [add description]
      * @method add
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
     public function FunctionName($value='')
     {
       # code...
     }
 }
