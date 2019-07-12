<?php

namespace App\Handlers;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;

class SlugTranslateHandler
{
    public function translate($text)
    {
        $http = new Client;

        $api = '';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');
        $salt = time();

        if (empty($appid) || empty($key)) {
            return $this->pinyin($text);
        }

        $sign = md5($appid.$text.$salt.$key);

        $query = http_build_query([
            'q' => $text,
            'from' => 'zh',
            'to' => 'en',
            'appid' => $appid,
            'salt' => $salt,
            'sign' => $sign,
        ]);

        $response = $http->get($api.$query);

        $result = json_decode($response->getBody(), true);

        if (isset($result['trans_result'][0]['dst'])) {
            return $result['trans_result'][0]['dst'];
        }

        return $this->pinyin($text);
    }

    public function pinyin($text)
    {
        return Str::slug(app(Pinyin::class)->permalink($text));
    }
}