<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/23
 * Time: 18:25.
 */

namespace CkWechat\User;

use CkWechat\Config\ApiUrl;
use CkWechat\Core;
use CkWechat\Common\Common;

class Group extends Core\Base
{
    /**
     * [createGroups description].
     *
     * @method createGroups
     *
     * @param jsonstring/array $post_data {"group":{"name":"test"}}
     *
     * @return jsonstring {"group": {"id": 107, "name": "test"}}
     */
    public function createGroups($post_data = '')
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        $params = array('access_token' => $this->access_token);

        return $this->http->post(ApiUrl::CREATEGROUPS, $params, $post_data);
    }
    /**
     * [getGroups description].
     *
     * @method getGroups
     *
     * @return jsonstring {"groups": [{"id": 0, "name": "未分组", "count": 72596}]}
     */
    public function getGroups()
    {
        return $this->http->get($this->buildTokenUri(ApiUrl::GETGROUPS));
    }
    /**
     * [getUserGroups description].
     *
     * @method getUserGroups
     *
     * @param [type] $post_data [description]
     *
     * @return [type] [description]
     */
    public function getUserGroups($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        $params = array('access_token' => $this->access_token);

        return $this->http->post(ApiUrl::GETUSERGROUPS, $params, $post_data);
    }
    /**
     * call wechat api to update group name.
     *
     * @method updateUserGroups
     *
     * @param array $post_data {"group":{"id":108,"name":"test2_modify2"}}
     *
     * @return jsonstring {"errcode": 0, "errmsg": "ok"}
     */
    public function updateGroups($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        $params = array('access_token' => $this->access_token);

        return $this->http->post(ApiUrl::UPDATEGROUPS, $params, $post_data);
    }
    /**
     * updateUserGroups.
     *
     * @method updateUserGroups
     *
     * @param jsonstring/array $post_data {"openid":"xxxxxxx","to_groupid":108}
     *
     * @return jsonstring {"errcode": 0, "errmsg": "ok"}
     */
    public function updateUserGroups($post_data = '')
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        $params = array('access_token' => $this->access_token);

        return $this->http->post(ApiUrl::UPDATEUSERGROUPS, $params, $post_data);
    }
    /**
     * batchUpdateUserGroups.
     *
     * @method batchUpdateUserGroups
     *
     * @param jsonstring/array $post_data {"openid_list":["openid1","openid2"],"to_groupid":108}
     *
     * @return jsonstring {"errcode": 0, "errmsg": "ok"}
     */
    public function batchUpdateUserGroups($post_data = '')
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        $params = array('access_token' => $this->access_token);

        return $this->http->post(ApiUrl::BATCHUPDATEUSERSGROUPS, $params, $post_data);
    }
    /**
     * delete wechat user groups by id.
     *
     * @method deleteGroups
     *
     * @param string $value {"group":{"id":108}}
     *
     * @return jsonstring {"errcode": 0, "errmsg": "ok"}
     */
    public function deleteGroups($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        if (Common::checkJson($post_data) == false) {
            $post_data = Common::toJsonStr($post_data);
        }

        return $this->http->_post($this->buildTokenUri(ApiUrl::DELETEGROUPS), $post_data);
    }
}
