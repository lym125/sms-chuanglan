<?php

namespace Lym125\Sms\Chuanglan;

use Zttp\Zttp;

class Sms
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 发送短信
     *
     * @param string $phone
     * @param string $message
     * @param array  $params
     *
     * @return void
     *
     * @throws \Lym125\Sms\Chuanglan\Exception
     */
    public function send(string $phone, string $message, array $params = [])
    {
        $data = $this->post('/msg/send/json', array_merge([
            'phone' => $phone,
            'msg' => $message,
        ], $params));

        if (0 !== (int) $data['code']) {
            throw new Exception('Chuanglan error code: '.$data['code']);
        }
    }

    /**
     * Http POST 请求
     *
     * @param string $url
     * @param array  $params
     *
     * @return array
     */
    protected function post(string $url, array $params = [])
    {
        return $this->http($url, 'post', $params);
    }

    /**
     * Http 请求
     *
     * @param string $url
     * @param string $method
     * @param array  $params
     *
     * @return array
     */
    protected function http(string $url, string $method, array $params = [])
    {
        $response = Zttp::{$method}($this->url($url), array_merge([
            'account' => $this->app['config']['chuanglan.account'],
            'password' => $this->app['config']['chuanglan.password'],
        ], $params));

        return $response->json();
    }

    /**
     * 生成完整 url 地址.
     *
     * @param string $url
     *
     * @return string
     */
    protected function url(string $url): string
    {
        return $this->app['config']['chuanglan.host'].$url;
    }
}
