<?php ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        My yii2 kit 
        <small> for start any web application </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Top Navigation</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <h3>
        TimeStamp behavior
    </h3>
    <strong>In Model: </strong>   
    <pre>

     use yii\behaviors\TimestampBehavior;
     use yii\db\ActiveRecord;
    
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
    </pre>
    <h3>
        Publish/Unpublish budge 
    </h3>
    <span class="label label-danger">Unpublished</span> / <span class="label label-success">Published</span> <br>
    <strong>In Model: </strong>   
    <pre>

       public function getPublishbadge() {
           $badge = '';
           switch ($this->publish) {
               case 0:
                   $badge = '&ltspan class="label label-danger">Unpublished&lt/span&gt';
                   break;
               case 1:
                    $badge = '&ltspan class="label label-success">Published&lt/span&gt';
                   break;
               default:
                   break;
           }

        return $badge;
        
       }  
    </pre>

    <strong>In  View:</strong>        
    <pre>
      &lt?= echo $model->Publishbadge; ?&gt 
    </pre>

    <strong>In  DetailView:</strong>    
    <pre>

      DetailView::widget([
        'model' => $model,
        'attributes' => [
            ...
            'Publishbadge:html'
        ],
    ])

    </pre>
    <strong>In GridView : </strong>
    <pre>
        

        GridView::widget([
            'dataProvider' => $dataProvider,
             'filterModel' => $searchModel,
                'columns' => [
                   ...
      
                    [
                      'attribute' => 'publish',
                       'value' => function($model, $key, $index, $widget) {
                                    return $model->publishbadge;
                                  },
                       'format' => 'html',
                        'filter' => \yii\bootstrap\Html::activeDropDownList($searchModel, 'publish', ['0' => 'Unpublished', '1' => 'Published'], ['class' => 'form-control', 'prompt' => 'Select...']),
                                       'contentOptions' => ['style' => 'width: 10%;']
                    ],
                ]
    </pre>

    <h3>
        Checkbox
    </h3>
    <?php

    use kartik\widgets\SwitchInput;

// Label and input vertically stacked on separate lines
    echo SwitchInput::widget([
        'name' => 'status_10',
    ]);
    ?>
    <strong>In View (ActiveForm): </strong>   
    <pre>
       use kartik\widgets\SwitchInput;

       &lt;?= $form->field($model, 'publish')->widget(SwitchInput::classname(), []); ?&gt;
    </pre>  


    <h3>
        CKEditor
    </h3>    

    <strong>In Module : </strong>   
    <pre>

    public function init() {
            ...
            $this->controllerMap = [
            'elfinder' => [
                'class' => 'mihaildev\elfinder\Controller',
                'access' => ['@'],
                'disabledCommands' => ['netmount'],
                'roots' => [
                    [
                        'baseUrl' => $this->mediaUrl,
                        'basePath' => $this->mediaPath,
                        'path' => '',
                        'name' => 'Global'
                    ],
                ],
            ],
        ];

    }
    </pre>

    <strong>In View (ActiveForm): </strong>   


    <pre>
       use mihaildev\ckeditor\CKEditor;
       use mihaildev\elfinder\ElFinder;

       echo $form->field($model, 'full_text')->widget(CKEditor::className(), [
           'editorOptions' => ElFinder::ckeditorOptions('blog/elfinder', [/* Some CKEditor Options */
         ]),
       ]);
    </pre>

    <h3>
        Module Trait
    </h3>    
    Trait module data and use it as a variant into controller and model <br>
    <strong>ModuleTrait.php  : </strong>   
    <pre>
    namespace plathir\smartblog\backend\traits;

    use plathir\smartblog\backend\Module;
    use Yii;

    /**
     * Class ModuleTrait
     * @package plathir\smartblog\traits
     * Implements `getModule` method, to receive current module instance.
     */
    trait ModuleTrait
    {
        /**
         * @var \plathir\smartblog\backend\Module|null Module instance
         */
        private $_module;

        /**
         * @return \plathir\smartblog\backend\Module|null Module instance
         */
        public function getModule()
        {
            if ($this->_module === null) {
                $module = Module::getInstance();
                if ($module instanceof Module) {
                    $this->_module = $module;
                } else {
                    $this->_module = Yii::$app->getModule('blog');
                }
            }
            return $this->_module;
        }
    }
    </pre>    

    <strong>Use trait In Model : </strong>       
    <pre>

  use plathir\cropper\behaviors\UploadImageBehavior;

  class Posts extends \plathir\smartblog\common\models\Posts {

    use \plathir\smartblog\backend\traits\ModuleTrait;
    
    ...
        public function behaviors() {
        return [
                'uploadImageBehavior' => [
                    'class' => UploadImageBehavior::className(),
                    'attributes' => [
                        'intro_image' => [
                            'path' => $this->module->ImagePath,
                            'temp_path' => $this->module->ImageTempPath,
                            'url' => $this->module->ImagePathPreview,
                            'key_folder' => 'id',
                        ],
                    ]
                ]    
        ]                    
    ...        
    </pre>
    
    <strong>Use module In Controller ( not with trait php file ) : </strong>    
    <pre>
        

    /**
     * @property \plathir\smartblog\backend\Module $module
     *
     */
    class PostsController extends Controller {

        public function __construct($id, $module) {
            parent::__construct($id, $module);
        }
    
    ...
    public function actions() {
        $actions = [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            //Upload cropped image into temp directory
            'uploadphoto' => [
                'class' => '\plathir\cropper\actions\UploadAction',
                'width' => 600,
                'height' => 600,
                'thumbnail' => true,
                'temp_path' => $this->module->ImageTempPath,
            ],    
    
      </pre>  
  
    <h3>
        Image Cropper
    </h3>    

    <strong>In Model : </strong>   
    <pre>
    use plathir\cropper\behaviors\UploadImageBehavior;
    ...
    public function behaviors() {
        return [
          ....
            'uploadImageBehavior' => [
                'class' => UploadImageBehavior::className(),
                'attributes' => [
                    'intro_image' => [
                        'path' => $this->module->ImagePath,
                        'temp_path' => $this->module->ImageTempPath,
                        'url' => $this->module->ImagePathPreview,
                        'key_folder' => 'id',
                    ],
                ]
            ],   
    ]     
    </pre>

    <strong>In Controller : </strong>   
    <pre>
     public function actions() {
        $actions = [
            ...
            //Upload cropped image into temp directory
            'uploadphoto' => [
                'class' => '\plathir\cropper\actions\UploadAction',
                'width' => 600,
                'height' => 600,
                'thumbnail' => true,
                'temp_path' => $this->module->ImageTempPath,
            ],           
        ]
    ]
    </pre>


    <strong>In View : </strong>   
    <pre>
        use plathir\cropper\Widget as NewWidget;
        use yii\helpers\Url;

        $form->field($model, 'intro_image')->widget(NewWidget::className(), [
            'uploadUrl' => Url::toRoute(['/blog/posts/uploadphoto']),
            'previewUrl' => $model->module->ImagePathPreview,
            'tempPreviewUrl' => $model->module->ImageTempPathPreview,
            'KeyFolder' => $model->id,
            'width' => 200,
            'height' => 200,
        ]);        
    </pre>

</section>
<!-- /.content -->

