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
    public function get()
    {
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();
        #fix wechat api rule post body is json string and JSON_UNESCAPED_UNICODE
        return $http->get(ApiUrl::GETUSERLIST, $params);
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
    public function getUserInfo($openid, $lang = 'zh_CN')
    {
        if (empty($openid)) {
            #TODO
        }
        $params = array(
          'access_token' => $this->access_token,
          'openid' => $openid,
          'lang' => $lang,
        );
        $http = new Core\Http();

        return $http->get(ApiUrl::GETUSERINFO, $params);
    }
    /**
     * setting user remark.
     *
     * @method      setUserMark
     *
     * @param string $openid user wechat openid
     * @param string $remark
     *
     * @return jsonstring  demo {"errcode":0,"errmsg":"ok"}
     */
    public function setUserMark($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::SETUSERMARK, $params, $post_data);
    }
}
?>
