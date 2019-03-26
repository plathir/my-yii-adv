<?php
namespace installation\models;

use yii\base\Model;
use Yii;

class Import extends Model {

    public $import;
   
    public function rules() {
        return [
            ['import', 'required'],
        ];
    }
    public function attributeLabels() {
        return [
            'import' => Yii::t('app', 'Import Required Data'),
        ];
    }
    

}
