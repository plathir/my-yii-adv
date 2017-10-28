<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

class CodeHighlight extends AssetBundle {

    public $basePath = 'https://cdn.jsdelivr.net/';
    public $baseUrl = 'https://cdn.jsdelivr.net/';
    public $css = [
        'highlight.js/latest/styles/github.min.css',
    ];
    public $js = ['highlight.js/latest/highlight.min.js',
    ];

}
