<?php
/*
 * Desc:
 * User: qmister
 * Date: 2021-10-17 17:43
 */

namespace openphp\easyIm\Tests;

use GuzzleHttp\Client;
use openphp\easyIm\Factory;
use openphp\Helper\StrHelper;

/**
 * Class TestCase.
 *
 * @author openphp
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $name
     * @param $app
     *
     * @return \Mockery\Mock
     */
    public function mockApiClient($name, $app)
    {
        \openphp\easyIm\Kernel\BaseClient::$request_log = true;
        $client                                         = \Mockery::mock($name, [$app])->makePartial();
        $client->allows()->getHttpClient()->andReturn(\Mockery::mock(Client::class));

        return $client;
    }


    public function randString($length)
    {
        //字符组合
        $str     = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $len     = strlen($str) - 1;
        $randstr = '';
        for ($i = 0; $i < $length; $i++) {
            $num     = mt_rand(0, $len);
            $randstr .= $str[$num];
        }
        return $randstr;
    }

    /**
     * @return \openphp\easyIm\Huanxin\AppContainer
     */
    public function Huanxin()
    {
        $orgName = $this->randString(16);
        $config  = [
            'appKey'       => $orgName . '#demo',
            'clientId'     => $this->randString(26),
            'clientSecret' => $this->randString(31),
            'orgName'      => $orgName,
            'appName'      => 'demo',
        ];

        return Factory::Huanxin($config);
    }

    /**
     * @return \openphp\easyIm\Jiguang\AppContainer
     */
    public function Jiguang()
    {
        $config = [
            'appKey'       => $this->randString(24),
            'masterSecret' => $this->randString(24),
        ];

        return Factory::Jiguang($config);
    }

    /**
     * @return \openphp\easyIm\RongCloud\AppContainer
     */
    public function RongCloud()
    {
        $config = [
            'appKey'    => $this->randString(13),
            'appSecret' => $this->randString(14),
        ];

        return Factory::RongCloud($config);
    }

    /**
     * @return \openphp\easyIm\Tencent\AppContainer
     */
    public function Tencent()
    {
        $config = [
            'appId'      => '5978322198',
            'identifier' => 'administrator',
            'secretKey'  => 'nfugb53xtlhyfq2kgiriganruyoagh93it1zwysmh2tmj5tnnmuqhd2og5ofktjt',
        ];

        return Factory::Tencent($config);
    }

    /**
     * @return \openphp\easyIm\Yunxin\AppContainer
     */
    public function Yunxin()
    {
        $config = [
            'appKey'    => $this->randString(32),
            'appSecret' => $this->randString(12),
        ];

        return Factory::Yunxin($config);
    }
}
