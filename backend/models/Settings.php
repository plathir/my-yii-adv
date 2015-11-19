<?php

namespace backend\models;

use yii\base\Model; 

class Settings extends Model {

    public $siteName, $siteDescription;

    function rules() {
        return [
            [['siteName', 'siteDescription'], 'string'],
        ];
    }

}
