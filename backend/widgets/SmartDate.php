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
    public $displaySaveVal = false;

    public function init() {
        parent::init();
    }

    public function run() {

        switch ($this->type) {
            case 'filterShortDate' :
                return $this->SmartFilterShortDate();
                break;
            case 'filterDateTime' :
                return $this->SmartFilterShortDateTime();
                break;
            case 'inputDate' :
                return $this->SmartInputDate();
                break;
            case 'inputDateTime' :
                return $this->SmartInputDateTime();
                break;
            default:
                break;
        }
    }

    public function SmartFilterShortDate() {
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
    }

    public function SmartFilterShortDateTime() {

        return '';
    }

    public function SmartInputDate() {
        return DateControl::widget([
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'displayFormat' => Yii::$app->settings->getSettings('InputShortDateDisplayFormat'),
                    'saveFormat' => Yii::$app->settings->getSettings('InputShortDateSaveFormat'),
                    'ajaxConversion' => false,
                    'widgetOptions' => [
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]
        ]);
    }

    public function SmartInputDateTime() {
        $saveOptions = '';
        if ($this->displaySaveVal == true) {
            $saveOptions = [
                'label' => 'Input saved as: ',
                'type' => 'text',
                'readonly' => true,
                'class' => 'hint-input text-muted'
            ];
        };
        return DateControl::widget([
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'type' => 'datetime',
                    'displayFormat' => Yii::$app->settings->getSettings('InputShortDateTimeDisplayFormat'),
                    'saveFormat' => Yii::$app->settings->getSettings('InputShortDateTimeSaveFormat'),
                    'displayTimezone' => Yii::$app->settings->getSettings('displayTimezone'),
                    'ajaxConversion' => true,
                    'widgetOptions' => [
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ],
                    'saveOptions' => $saveOptions,
        ]);
    }

}
