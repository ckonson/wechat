<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/22
 * Time: 14:58.
 */

namespace CkWechat\User;

use CkWechat\Config\ApiUrl;
use CkWechat\Core;

class User extends Core\Base
{
    /**
     * 获取用户列表.
     *
     * @method      get
     *
     * @return jsonstring {"total":1,"count":1,"data":{"openid":["用户openid"]},"next_openid":"oY9n7vs-kSLoQz49KaL3jwY-t0hM"}
     */
    public function getUser($next_openid = null)
    {
        if (!empty($next_openid)) {
            $params = array('next_openid' => $next_openid, 'access_token' => $this->access_token);

            return Core\Http::get(ApiUrl::GETUSERS, $params);
        }

        return Core\Http::get($this->buildTokenUri(ApiUrl::GETUSERS));
    }
    /**
     * 通过openid获取用户基本信息.
     *
     * @method      getUserInfo
     *
     * @param string $openid 微信用户openid
     * @param string $lang   zh_CN 简体，zh_TW 繁体，en 英语
     *
     * @return [type] [description]
     */
    public function getUserInfo($openid = '', $lang = 'zh_CN')
    {
        $params = array(
          'access_token' => $this->access_token,
          'openid' => $openid,
          'lang' => $lang,
        );

        return Core\Http::get(ApiUrl::GETUSERINFO, $params);
    }
    /**
     * setting user remark.
     *
     * @method updateRemark
     *
     * @param jsonstring/array $post_data {"openid":"openid","remark":"pangzi"}
     *
     * @return jsonstring {"errcode":40013,"errmsg":"invalid appid"} or {"errcode":0,"errmsg":"ok"}
     */
    public function updateRemark($post_data)
    {
        return Core\Http::post($this->buildTokenUri(ApiUrl::UPDATEREMARK), $post_data);
    }
}
