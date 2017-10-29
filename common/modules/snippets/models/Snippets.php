<?php

namespace common\modules\snippets\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use \plathir\user\common\models\account\User;

/**
 * This is the model class for table "{{%snippets}}".
 *
 * @property int $id
 * @property string $description
 * @property string $example
 * @property string $full_text
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 * @property string $publish
 */
class Snippets extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%snippets}}';
    }

    public function behaviors() {

        return [
            'timestampBehavior' =>
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                'value' => function() {
                    return date('U');
                }
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['description', 'full_text', 'publish'], 'required'],
            [['example'], 'string'],
            [['full_text'], 'string'],
            
            [['description'], 'string', 'max' => 255],
            [['publish'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'example' => Yii::t('app', 'Example'),
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
    public static function find() {
        return new SnippetsQuery(get_called_class());
    }

    public function getPublishbadge() {
        $badge = '';
        switch ($this->publish) {
            case 0:
                $badge = '<span class="label label-danger">Unpublished</span>';
                break;
            case 1:
                $badge = '<span class="label label-success">Published</span>';
                break;
            default:
                break;
        }

        return $badge;
    }
    public function getCreatedByName() {
        return $this->hasOne(User::className(), ['id' => 'created_by'])->select(['username'])->one()->username;
    }

    public function getUpdatedByName() {
        return $this->hasOne(User::className(), ['id' => 'updated_by'])->select(['username'])->one()->username;
    }
}
