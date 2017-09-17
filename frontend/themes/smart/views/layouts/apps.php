<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<ul class="nav navbar-nav">            
    <li>
        <?= Html::a('<span class="glyphicon glyphicon-book"></span>' .' Blog', ["/blog"]); ?>
    </li>

    <?php
    $appsHelper = new \plathir\apps\helpers\AppsHelper();
    $applications = $appsHelper->getAppsList();
    $i = 0;
    $dropdown = null;
    foreach ($applications as $application) {
        $i++;
        $bundle = null;
        $h_text = '$bundle = apps' . '\\' . $application->name . '\\backend\\' . $application->name . 'Asset::register($this);';
        eval($h_text);

        $img = $bundle->baseUrl . $application->app_icon;
        $AppsDispl = \Yii::$app->settings->getSettings('NumOfAppsFeNavBar');

        if ($i > $AppsDispl ) {
            $dropdown[] = $application;
        } else {
            ?>
            <li class="dropdown user user-menu">
                <?=
                Html::a(Html::img($img, ['alt' => '...', 'class' => 'user-image']) . $application->name, ["/$application->name"]);
                ?></li>
            <?php
        }
    }

    if ($dropdown != null) {
        ?>

        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-cogs"></i> More...
            </a>
            <ul class="dropdown-menu" style="right:auto">
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php
                        foreach ($dropdown as $app) {

                            $bundle = null;
                            $h_text = '$bundle = apps' . '\\' . $app->name . '\\backend\\' . $app->name . 'Asset::register($this);';
                            eval($h_text);

                            $img = $bundle->baseUrl . $app->app_icon;
                            ?>

                            <li><!-- start message -->
                                <a href=<?= Url::to(["/$app->name"]); ?> >

                                    <div class="pull-left">
                                        <img src="<?= $img ?>" class="img-circle"
                                             alt="user image"/>
                                    </div>

                                    <h4>
                                        <?= $app->name ?>
                                    </h4>
                                    <p><?= $app->descr ?></p>
                                </a>
                            </li>
                            <!-- end message -->
                        <?php } ?>                                                           
                    </ul>
                </li>

            </ul>
        </li>        
    <?php } ?>    
</ul>






