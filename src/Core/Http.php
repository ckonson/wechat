<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/2/18
 * Time: 13:49.
 */

namespace CkWechat\Core;

use CkWechat\Config\Setting;
use CkWechat\Common\Common as Common;

class Http
{
    /**
     * http get.
     *
     * @method get
     *
     * @param string $url
     * @param array  $params uri query
     *
     * @return string
     */
    public static function get($url, $params = null)
    {
        if (!empty($params)) {
            $url = self::buildApiUrl($url, $params);
            return self::postXmlCurl('', $url);
        } else {
            return self::postXmlCurl('', $url);
        }
    }
    /**
     * http post.
     *
     * @method post
     *
     * @param string $url
     * @param string $params    jsonstring or xml
     * @param string $post_type the params type
     *
     * @return string
     */
    public static function post($url, $params, $post_type = 'json')
    {
        if ($post_type == 'json') {
            if (Common::checkJson($params) == false) {
                $params = Common::toJsonStr($params);
            }
        } elseif ($post_type == 'xml') {
            if (Common::checkXml($params) == false) {
                $params = Common::toXml($params);
            }
        }

        return self::postXmlCurl($params, $url);
    }
    /**
     * [buildApiUrl description].
     *
     * @method buildApiUrl
     *
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    public static function buildApiUrl($url, $params)
    {
        $url .= '?'.http_build_query($params);

        return $url;
    }
    /**
     * postXmlCurl curl func.
     *
     * @method postXmlCurl
     *
     * @param string $xml     the post body
     * @param string $url     target request url
     * @param bool   $useCert
     * @param int    $second
     *
     * @return string
     */
    private static function postXmlCurl(string $xml, string $url, $useCert = false, $second = 30)
    {
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);

        //如果有配置代理这里就设置代理
        if (Setting::CURL_PROXY_HOST != '0.0.0.0'
            && Setting::CURL_PROXY_PORT != 0) {
            curl_setopt($ch, CURLOPT_PROXY, Setting::CURL_PROXY_HOST);
            curl_setopt($ch, CURLOPT_PROXYPORT, Setting::CURL_PROXY_PORT);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格校验
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, false);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($useCert == true) {
            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLCERT, Setting::SSLCERT_PATH);
            curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLKEY, Setting::SSLKEY_PATH);
        }
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if ($data) {
            curl_close($ch);

            return $data;
        } else {
            $error = curl_errno($ch);
            curl_close($ch);
            throw new \Exception("curl出错，错误码:$error");
        }
    }
}
