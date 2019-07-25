<?php

namespace App\Handlers;

use HerCat\BaiduTranslator\BaiduTranslator;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;

class SlugTranslateHandler
{
    public function translate($text)
    {
        $result = app(BaiduTranslator::class)->translate($text, 'en');

        if (isset($result['trans_result'][0]['dst'])) {
            return Str::slug($result['trans_result'][0]['dst']);
        }

        return $this->pinyin($text);
    }

    public function pinyin($text)
    {
        return Str::slug(app(Pinyin::class)->permalink($text));
    }
}
