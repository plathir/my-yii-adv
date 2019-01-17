<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use plathir\widgets\common\helpers\PositionHelper;
use plathir\widgets\common\helpers\LayoutHelper;

$positionHelper = new PositionHelper();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <?php
            $layoutHelper = new LayoutHelper();
            echo $layoutHelper->LoadLayout(__FILE__);
            ?>             

        </div>
    </div>
    <div class="container">
        <div class="row">
            <section class="content-header">
                <?php if (isset($this->blocks['content-header'])) { ?>
                    <h1><?= $this->blocks['content-header'] ?></h1>
                <?php } else { ?>
                    <h1>
                        <?php
                        if ($this->title !== null) {
                        //    echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camel2words(
                                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                            );
                            echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                        }
                        ?>
                    </h1>
                <?php } ?>

                <?=
                Breadcrumbs::widget(
                        [
                            'homeLink' => ['label' => 'Home',
                                'url' => Yii::$app->getHomeUrl() . '/' . Yii::$app->controller->module->id],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]
                );
                ?>
            </section>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <?php $alert = Alert::widget(); ?>
            <?php if ($alert) { ?>
                <div class="col-lg-12">
                    <div id="alert">
                        <?= $alert; ?>
                    </div>             
                </div>
            <?php }; ?>

            <?= $content ?>

        </div>
    </section>

    <div class="row">
        <div class="main-content-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
            </div>
        </div> 

    </div>                    
</div>

<!-- App Content End -->            

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                Copyright &copy; 2018-2019 by <a href="http://www.smartbyii.com"><strong>SmartByii.com</strong></a>
                <span class="pull-right"><strong>1.0</strong></span>
            </div>
        </div>
    </div>                
</footer>   
