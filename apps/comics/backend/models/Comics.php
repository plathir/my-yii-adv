<?php

namespace apps\comics\backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use plathir\cropper\behaviors\UploadImageBehavior;
use plathir\upload\behaviors\MultipleUploadBehavior;

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
class Comics extends \apps\comics\common\models\Comics {

    use \apps\comics\backend\traits\ModuleTrait;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%comics}}';
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
            ],
            'uploadImageBehavior' => [
                'class' => UploadImageBehavior::className(),
                'attributes' => [
                    'cover_page' => [
                        'path' => $this->module->ComicsPath,
                        'temp_path' => $this->module->ComicsTempPath,
                        'url' => $this->module->ComicsPathPreview,
                        'key_folder' => 'id'
                    ],
                ]
            ],
            'uploadFileBehavior' => [
                'class' => MultipleUploadBehavior::className(),
                'attributes' => [
                    'comic_pages' => [
                        'path' => $this->module->ComicsPath,
                        'temp_path' => $this->module->ComicsTempPath,
                        'url' => $this->module->ComicsPathPreview,
                        'key_folder' => 'id',
                        'galleryType' => true,
                    ],
                ]
            ],
        ];
    }

}
