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
    public static function checkJson($data)
    {
        if (is_string($data)) {
            json_decode($data);
            if ((json_last_error() == JSON_ERROR_NONE) == false) {
                //如果不是json 字符串 应为一个数组 并且 进行json_encode
              return false;
            }

            return true;
        }

        return false;
    }
    public static function getDeclaredClasses()
    {
        return array_filter(
          get_declared_classes(),
          function ($className) {
              return !call_user_func(
                  array(new \ReflectionClass($className), 'isInternal')
              );
          }
        );
    }
    public function checkXml($string = '')
    {
        libxml_use_internal_errors(true);
        $result = simplexml_load_string($string);
        if (!$result) {
            return false;
        }

        return true;
    }
    public static function toXml($data = null)
    {
        if (!is_array($data)
            || count($data) <= 0) {
            throw new \Exception('数组数据异常！');
        }

        $xml = '<xml>';
        foreach ($data as $key => $val) {
            if (is_numeric($val)) {
                $xml .= '<'.$key.'>'.$val.'</'.$key.'>';
            } else {
                $xml .= '<'.$key.'><![CDATA['.$val.']]></'.$key.'>';
            }
        }
        $xml .= '</xml>';

        return $xml;
    }
}
