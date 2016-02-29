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

class Group extends Core\Base
{
    public function createGroups($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::CREATEGROUPS, $params, $post_data);
    }
    public function getGroups()
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->get(ApiUrl::GETGROUPS, $params);
    }
    public function getUserGroups($post_data)
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::GETUSERGROUPS, $params, $post_data);
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
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::UPDATEGROUPS, $params, $post_data);
    }
    public function updateUserGroups($post_data = '')
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::UPDATEUSERGROUPS, $params, $post_data);
    }
    public function batchUpdateUserGroups($post_data = '')
    {
        if (empty($post_data)) {
            #TODO
        }
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::BATCHUPDATEUSERSGROUPS, $params, $post_data);
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
        $params = array('access_token' => $this->access_token);
        $http = new Core\Http();

        return $http->post(ApiUrl::DELETEGROUPS, $params, $post_data);
    }
}
