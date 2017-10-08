<?php

namespace backend\widgets;

use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
use yii;

/**
 * 
 * 
 */
class SmartDate extends \yii\base\Widget {

    public $type;
    public $model;
    public $attribute;

    public function init() {
        parent::init();
    }

    public function run() {

        switch ($this->type) {
            case 'filterShortDate' :
                return DatePicker::widget([
                            'model' => $this->model,
                            'attribute' => $this->attribute,
                            'type' => DatePicker::TYPE_INPUT,
                            'options' => ['placeholder' => 'Enter date ...'],
//                            'removeButton' => false,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => Yii::$app->settings->getSettings('FilterShortDateFormat'),
                            ]
                ]);

                break;
            case 'filterDateTime' :
                break;
            case 'inputDate' :
                return DatePicker::widget([
                            'model' => $this->model,
                            'attribute' => $this->attribute,
                            'type' => DateControl::FORMAT_DATE,
                            'ajaxConversion' => true,
                            'saveFormat' => 'php:U',
                            'options' => [
                                'layout' => '{picker}{input}',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'todayBtn' => true,
                                    'format' => Yii::$app->settings->getSettings('FilterShortDateFormat'),
                                ]
                            ]
                ]);

                break;
            default:
                break;
        }
    }

}
