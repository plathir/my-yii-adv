<?php

namespace apps\comics\common\widgets;

use yii\web\AssetBundle;

/**
 * Widget asset bundle
 */
class Asset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@apps/comics/common/widgets/assets';

    /**
     * @inheritdoc
     */
    public $css = [
    //    'css/tagging.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
       // 'justinvoelker\tagging\TaggingAsset',
    ];

}
