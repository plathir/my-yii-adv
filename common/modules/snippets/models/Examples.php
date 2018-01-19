<?php

namespace common\modules\snippets\models;

use yii\base\Model;
use Yii;

class Examples extends Model {

    /**
     * @inheritdoc
     */
    public $publish;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['publish'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'publish' => Yii::t('app', 'Publish'),
        ];
    }

}
