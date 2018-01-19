<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Smart Blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-smartuser">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <h1>Smart blog  - Site Actions</h1>
        <h2> <a href="https://github.com/plathir/yii2-smart-blog">plathir/yii2-smart-blog</a></h2>
        <h3>Installation</h3>
        <pre>
            <?php
            $str = "'modules' => [
                ... 
                     'blog' => [ 
                     'class' => 'plathir\blog\Module',
                    ],
                  ... 
                ]>";
            echo $str;
            ?>        
        </pre> 
        <h3> Public actions </h3>
        <ul>
            <li><?= Html::a('blog/posts/list', ['blog/posts/list']) ?> </li>    
            <li><?= Html::a('blog/posts/view?id= ( need post id )', ['blog/posts/view?id=']) ?> </li>    
        </ul>

        <h3> Longed in user actions </h3>

        <ul>
            <li><?= Html::a('blog/', ['blog/']) ?> </li>    
            <li><?= Html::a('blog/posts', ['blog/posts']) ?> </li>    
        </ul>
    </div>

</div>
