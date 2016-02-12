<?php

namespace apps\recipes\common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%recipes1}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $attachments
 */
class Recipes extends \yii\db\ActiveRecord {

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%recipes1}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['attachments'], 'string'],
            [['imageFile'], 'file'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
        ];
    }



}
