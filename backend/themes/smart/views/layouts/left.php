<?php

use plathir\user\common\helpers\UserHelper;
use mdm\admin\components\MenuHelper;
use yii\helpers\Url;

$userHelper = new UserHelper();
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $userHelper->getProfileFullName(Yii::$app->user->identity->id) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <?php $url = Url::toRoute(['/site/search']) ?>
        <form action="<?= $url ?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search btn-loader"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->>
        <?php
        $appsHelper = new \plathir\apps\helpers\AppsHelper();
        $apps = $appsHelper->getAppsList();
        $apps_items[] = '';

        $callback = function($menu) {
            if ($menu['data']) {
                $return = [
                    'label' => $menu['name'],
                    'url' => [$menu['route']],
                    'icon' => $menu['data'],
                    'items' => $menu['children'],
                ];
            } else {
                $return = [
                    'label' => $menu['name'],
                    'url' => [$menu['route']],
                    'option' => $menu['data'],
                    'items' => $menu['children'],
                ];
            }


            return $return;
        };
        $appsItems = '';
        foreach ($apps as $app) {
            if ($app->menu != null) {
                $appsItems[] = ['label' => $app->descr, 'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, $app->menu->menu_id, $callback, true)];
            }
        }


        $headerApps = [['label' => 'Applications', 'options' => ['class' => 'header']]];

        $mainMenuItems = [
            ['label' => 'Main Menu', 'options' => ['class' => 'header']],
            ['label' => 'Users', 'icon' => 'users', 'url' => ['/user']],
            ['label' => 'Blog', 'icon' => 'list-alt', 'url' => ['/blog'],
                'items' => [
                    ['label' => 'Blog Dashboard', 'icon' => 'dashboard', 'url' => ['/blog'],],
                    ['label' => 'Categories', 'icon' => 'file-text-o', 'url' => ['/blog/category'],],
                    ['label' => 'Posts', 'icon' => 'file-text-o', 'url' => ['/blog/posts'],],
                    ['label' => 'Static Pages', 'icon' => 'file-text-o', 'url' => ['/blog/static-pages'],],
                    ['label' => 'Carousel', 'icon' => 'file-text-o', 'url' => ['/blog/carousel'],],
                    ['label' => 'File Manager', 'icon' => 'file-text-o', 'url' => ['/blog/posts/filemanager'],],
                ]
            ],
            ['label' => 'Apps', 'icon' => 'cogs', 'url' => ['/apps'],
                'items' => [
                    ['label' => 'Apps Dashboard', 'icon' => 'dashboard', 'url' => ['/apps'],],
                    ['label' => 'Apps Admin', 'icon' => 'fa fa-cogs', 'url' => ['/apps/admin'],],
                ]
            ],
            ['label' => 'Widgets', 'icon' => 'gear', 'url' => ['/widgets'],],
            ['label' => 'Permissions', 'icon' => 'user-times', 'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback, true)],
            [
                'label' => 'System',
                'icon' => 'database',
                'url' => ['#'],
                'items' => [
                    [
                        'label' => 'Templates',
                        'icon' => '',
                        'url' => ['/templates'],
                    ],
                    [
                        'label' => 'System Infos',
                        'icon' => '',
                        'url' => ['/site/system'],
                    ],
                    [
                        'label' => 'Log',
                        'icon' => '',
                        'url' => ['/log/log'],
                    ],
                    [
                        'label' => 'Cache',
                        'icon' => '',
                        'url' => ['/site/cache'],
                    ],
                    
                ]
            ],
            [
                'label' => 'Documentation',
                'icon' => 'book',
                'url' => ['/doc'],
            ],
            [
                'label' => 'Code Snippets',
                'icon' => 'file-code-o',
                'url' => ['/snippets'],
            ]
                ]
        ?>

        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => is_array($appsItems) ? array_merge($headerApps, $appsItems, $mainMenuItems): $mainMenuItems
                ]
        );
        ?>

    </section>

</aside>
