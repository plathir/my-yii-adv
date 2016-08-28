<?php

namespace apps\comics\common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%comics}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 * @property string $cover_page
 * @property string $comic_pages
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comics extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%comics}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'descr'], 'required'],
            [['descr'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['cover_page'], 'string', 'max' => 255],
            [['comic_pages'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'descr' => Yii::t('app', 'Descr'),
            'cover_page' => Yii::t('app', 'Cover Page'),
            'comic_pages' => Yii::t('app', 'Comic Pages'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
