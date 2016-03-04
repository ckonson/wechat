<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/23
 * Time: 18:25.
 */

namespace CkWechat\User;

use CkWechat\Core;
use CkWechat\Config\ApiUrl;

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
    public function createGroups($post_data)
    {
        $url = $this->buildTokenUri(ApiUrl::CREATEGROUPS);

        return Core\Http::post($url, $post_data);
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
        $url = $this->buildTokenUri(ApiUrl::GETGROUPS);

        return Core\Http::get($url);
    }
    /**
     * [getUserGroups description].
     *
     * @method getUserGroups
     *
     * @param jsonstring/array $post_data {"openid":"od8XIjsmk6QdVTETa9jLtGWA6KBc"}
     *
     * @return jsonstring {"groupid": 102} or {"errcode":40003,"errmsg":"invalid openid"}
     */
    public function getUserGroups($post_data)
    {
        $url = $this->buildTokenUri(ApiUrl::GETUSERGROUPS);

        return Core\Http::post($url, $post_data);
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
        return Core\Http::post($this->buildTokenUri(ApiUrl::UPDATEGROUPS), $post_data);
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
    public function updateUserGroups($post_data)
    {
        return Core\Http::post($this->buildTokenUri(ApiUrl::UPDATEUSERGROUPS), $post_data);
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
        return Core\Http::post($this->buildTokenUri(ApiUrl::BATCHUPDATEUSERSGROUPS), $post_data);
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
        return Core\Http::post($this->buildTokenUri(ApiUrl::DELETEGROUPS), $post_data);
    }
}
