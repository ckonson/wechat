<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 13:50.
 */

namespace CkWechat\Config;

class ApiUrl
{
    const ACCESSTOKEN = 'https://api.weixin.qq.com/cgi-bin/token';
    const BACKIPS = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';
    const CREATEMENU = 'https://api.weixin.qq.com/cgi-bin/menu/create';
    const GETMENU = 'https://api.weixin.qq.com/cgi-bin/menu/get';
    const DELETEMENU = 'https://api.weixin.qq.com/cgi-bin/menu/delete';
    const GETUSERLIST = 'https://api.weixin.qq.com/cgi-bin/user/get';
    const GETUSERINFO = 'https://api.weixin.qq.com/cgi-bin/user/info';
    const SETUSERMARK = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark';
    const UPDATEREMARK = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark';
    const CREATEGROUPS = 'https://api.weixin.qq.com/cgi-bin/groups/create';
    const GETGROUPS ='https://api.weixin.qq.com/cgi-bin/groups/get';
    const GETUSERGROUPS ='https://api.weixin.qq.com/cgi-bin/groups/getid';
    const UPDATEGROUPS ='https://api.weixin.qq.com/cgi-bin/groups/update';
    const UPDATEUSERGROUPS ='https://api.weixin.qq.com/cgi-bin/groups/members/update';
    const BATCHUPDATEUSERSGROUPS = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate';
    const DELETEGROUPS = 'https://api.weixin.qq.com/cgi-bin/groups/delete';
}
