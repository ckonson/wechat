<?php
/**
 * Created by PhpStorm.
 * User: kontem
 * Date: 16/3/2
 * Time: 19:16
 */

namespace CkWechat\Service;


class GroupService implements ServiceInterface
{
  public function register(Container $pimple)
  {
      $pimple['url'] = function ($pimple) {
          return new Url($pimple['access_token']);
      };
  }
}
