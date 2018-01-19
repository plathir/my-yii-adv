<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

class GoogleAsset extends AssetBundle {

    public $basePath = 'https://fonts.googleapis.com';
    public $baseUrl = 'https://fonts.googleapis.com';
    public $css = [
        'css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'
            //'css?family=PT+Sans:400,700|Open+Sans:400,600,700,300&amp;subset=latin,cyrillic'
    ];

}
