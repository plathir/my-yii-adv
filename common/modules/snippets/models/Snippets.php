<?php

namespace common\modules\snippets\models;

use Yii;

/**
 * This is the model class for table "{{%snippets}}".
 *
 * @property int $id
 * @property string $description
 * @property string $full_text
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 * @property string $publish
 */
class Snippets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%snippets}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'full_text', 'created_by', 'created_at', 'updated_by', 'updated_at', 'publish'], 'required'],
            [['full_text'], 'string'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['publish'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'full_text' => Yii::t('app', 'Full Text'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'publish' => Yii::t('app', 'Publish'),
        ];
    }

    /**
     * @inheritdoc
     * @return SnippetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SnippetsQuery(get_called_class());
    }
}
