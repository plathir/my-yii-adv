<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
use \plathir\user\common\helpers\UserHelper;
use mdm\admin\components\MenuHelper;
use yii\widgets\Menu;

$userHelper = new UserHelper();
?>


<header class="main-header">
    <?= Html::a('<span class="logo-mini">' . Yii::$app->settings->getSettings('ApplicationNameMini') . '</span><span class="logo-lg">' . Yii::$app->settings->getSettings('ApplicationName') . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        $appsHelper = new \plathir\apps\helpers\AppsHelper();
        $apps = $appsHelper->getAppsList();
        $cnt = count((array) $apps);
        ?>

        <div class="navbar-custom-menu pull-left">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i> Apps 
                        <span class="label label-success"><?= $cnt ?></span>
                    </a>
                    <ul class="dropdown-menu" style="right:auto">
                        <li class="header">You have <?= $cnt ?> Active Applications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                foreach ($apps as $app) {

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
                        <li class="footer"><a href="<?= Url::to(["/apps/admin"]); ?>">Manage All Applications</a></li>
                    </ul>
                </li>              

            </ul>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <!--                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu">
                                                <li> start message 
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                                                 alt="User Image"/>
                                                        </div>
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                 end message 
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                                 alt="user image"/>
                                                        </div>
                                                        <h4>
                                                            AdminLTE Design Team
                                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                                 alt="user image"/>
                                                        </div>
                                                        <h4>
                                                            Developers
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                                 alt="user image"/>
                                                        </div>
                                                        <h4>
                                                            Sales Department
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                                 alt="user image"/>
                                                        </div>
                                                        <h4>
                                                            Reviewers
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-warning">10</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 10 notifications</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> <?= ''// \plathir\log\backend\widgets\LatestLogMsg::widget();      ?>
                                                    </a>
                                                </li>                                
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                                        not fit into the page and may cause design problems
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                                    </a>
                                                </li>
                
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-red"></i> You changed your username
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">View all</a></li>
                                    </ul>
                                </li>
                
                                
                                
                                
                                
                                 Tasks: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <?= strtoupper(Yii::$app->language) ?> <span class="caret"></span>
                    </a>


                    <?php
                    echo common\components\LanguageDropdown::widget(
                            ['options' =>
                                ['class' => 'dropdown-menu',
                                  //  'style' => 'background-color: #3c8dbc;color: aliceblue',
                                ]
                    ]);
                    ?>
                    <!--                    <ul class="dropdown-menu">
                                            <li>
                                                <ul class="menu">
                                                    <ul>
                        
                                                    </ul>
                                                    
                                                    <li>
                    <?= ''// Html::a(\Yii::t('app', 'English'), Url::toRoute(['/site/changelang', 'language' => 'en']))  ?>
                                                    </li>
                    
                                                    <li>
                    <?= ''//  Html::a(\Yii::t('app', 'Greek'), Url::toRoute(['/site/changelang', 'language' => 'el']))  ?>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>-->
                </li>

                <!--                -->                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= '(' . Yii::$app->user->identity->username . ')' ?> <?= $userHelper->getProfileFullName(Yii::$app->user->identity->id) ?>
                                <small>Member since <?= Yii::$app->formatter->asDatetime(Yii::$app->user->identity->created_at); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                <?=
                                Html::a(
                                        'Settings for Users', ['/user/settings'], ['data-method' => 'post']
                                )
                                ?>                                
                            </div>
                            <div class="col-xs-6 text-center">
                                <?=
                                Html::a(
                                        'Site Settings', ['/settings'], ['data-method' => 'post']
                                )
                                ?>                                

                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=
                                Html::a(
                                        'Profile', ['/user/account/my'], ['class' => 'btn btn-default btn-flat']
                                )
                                ?>

                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Sign out', ['/user/security/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
