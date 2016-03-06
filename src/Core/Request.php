<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/4
 * Time: 17:53.
 */

namespace CkWechat\Core;

use CkWechat\Common\Common as Common;

class Request
{
    public static function getXmlDataByArray(array $keys)
    {
        $postdata = file_get_contents('php://input');
        $xml = Common::checkXml($postdata);
        if ($xml == false) {
            return false;
        }

        return array_intersect_key((array)$xml, array_flip($keys));
    }
}
``