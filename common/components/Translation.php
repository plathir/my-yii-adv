<?php
namespace common\components;

use yii\helpers\Json;
use yii\helpers\Html;

/**
 * Yii2 extension for Yandex Translate API
 *
 */
class Translation {

    /**
     * API key
     * @var string
     */
    public $key;

    /**
     * API URL
     */
    const API_URL = 'https://translate.yandex.net/api/v1.5/tr.json/translate';

    /**
     * You can translate text from one language
     * to another language
     * @param string $source Source language
     * @param string $target Target language
     * @param string $text   Source text string
     * @return array
     */
    public function translate($source, $target, $text, $format = 'html') {

        $langDirection = explode('-', $source)[0] . '-' . explode('-', $target)[0];
        if (strlen($text) > 300) {
            return $this->getPostResponse($text, $langDirection, $format);
        } else {
            return $this->getResponse($text, $langDirection, $format);
        }
    }

    /**
     * Forming query parameters
     * @param  string $text   Source text string
     * @param  string $lang   Translation direction ru-en, en-es
     * @return array          Data properties
     */
    protected function getPostResponse($text = '', $lang = 'en-ru', $format = 'html') {        
        if ($format != 'html') {
            $text = Html::encode($text);
        }
        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                        [
                            'key' => $this->key,
                            'lang' => $lang,
                            'text' => $text,
                            'format' => $format,
                        ]
                )
            )
        );

        $context = stream_context_create($opts);

        $response = file_get_contents(self::API_URL, false, $context);
        return Json::decode($response, true);        
    }

    /**
     * Forming query parameters
     * @param  string $text   Source text string
     * @param  string $lang   Translation direction ru-en, en-es
     * @return array          Data properties
     */
    protected function getResponse($text = '', $lang = 'el', $format = 'html') {
        if ($format != 'html') {
            $text = Html::encode($text);
        }

        $request = self::API_URL . '?' . http_build_query(
                        [
                            'key' => $this->key,
                            'lang' => $lang,
                            'text' => $text,
                            'format' => $format,
                        ]
        );

        $response = file_get_contents($request);
        return Json::decode($response, true);
    }

}
