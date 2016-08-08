<?php 
use plathir\user\common\helpers\UserHelper;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= UserHelper::getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=UserHelper::getProfileFullName(Yii::$app->user->identity->id) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Main Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Users', 'icon' => 'fa fa-users', 'url' => ['/user/admin']],
                        ['label' => 'Blog', 'icon' => 'fa fa-list-alt', 'url' => ['/blog'],
                              'items' => [
                                ['label' => 'Blog Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ['/blog'],],
                                ['label' => 'Categories', 'icon' => 'fa  fa-file-text-o', 'url' => ['/blog/category'],],
                                ['label' => 'Posts', 'icon' => 'fa  fa-file-text-o', 'url' => ['/blog/posts'],],
                                ['label' => 'Posts List Preview', 'icon' => 'fa fa-file-text-o', 'url' => ['/blog/posts/list'],],
                                ['label' => 'File Manager', 'icon' => 'fa fa-file-text-o', 'url' => ['/blog/posts/filemanager'],],
                            ]
                        ],
                        
                        
                        ['label' => 'Apps', 'icon' => 'fa fa-cogs', 'url' => ['/apps'],
                             'items' => [
                                ['label' => 'Apps Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ['/apps'],],
                                ['label' => 'Apps Admin', 'icon' => 'fa fa-cogs', 'url' => ['/apps/admin'],],
                            ]
                        ],

                        [
                            'label' => 'Permissions',
                            'icon' => 'fa fa-share',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Roles', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/role'],],
                                ['label' => 'Routes', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/route'],],
                                ['label' => 'Rules', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/rule'],],
                                ['label' => 'Permissions', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/permission'],],
                                ['label' => 'Assignments', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/assignment'],],

                            ],
                        ],
                    ],
                ]
        )
        ?>

    </section>

</aside>
