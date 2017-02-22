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
</section>
<!-- /.content -->

