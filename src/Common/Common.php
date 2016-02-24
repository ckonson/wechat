<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/23
 * Time: 18:11.
 */

namespace CkWechat\Common;

class Common
{
    public static function toJsonStr($data, $options = JSON_UNESCAPED_UNICODE)
    {
        if (is_string($data)) {
            json_decode($data);
            if ((json_last_error() == JSON_ERROR_NONE) == false) {
                //如果不是json 字符串 应为一个数组 并且 进行json_encode
                $data = json_encode($data, $options);
            }
        } elseif (is_array($data)) {
            $data = json_encode($data, $options);
        } else {
            #TODO
        }

        return $data;
    }
}
?>