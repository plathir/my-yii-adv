<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
?>

<section class="content">
    <?php $bundle = plathir\user\userAsset::register($this); ?>


    <?php
    if ($profile != null) {
        $profile_html = Html::button('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile', ['value' => Url::to(['user-profile/edit-my-profile']), 'class' => 'btn btn-success', 'id' => 'modalButtonProfile']) .
                '&nbsp' .
                Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true" ></span> Delete Profile', ['user-profile/delete-my-profile'], ['class' => 'btn btn-danger',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'id' => 'ButtonProfile1',
                    'data-method' => 'post',
                    'data-pjax' => '0'
                ]) .
                '<br><br>' .
                DetailView::widget([
                    'model' => $profile,
                    'attributes' => [
                        'id',
                        'first_name',
                        'last_name',
                        [
                            'label' => 'Gender',
                            'attribute' => 'gender',
                            'value' => $profile->getGenderLabel(),
                        ],
                        'profile_image',
                        'birth_date:date',
                        'updated_at:datetime',
                        'created_at:datetime',
                        [
                            'label' => 'Updated by',
                            'attribute' => 'updated_by',
                            'value' => $profile->getUpadatedByUserName(),
                        ],
                    ],
        ]);
    } else {
        $profile_html = 'Profile not update yet ! <br> <br>' .
                Html::button('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile', ['value' => Url::to(['user-profile/create-my-profile']), 'class' => 'btn btn-success', 'id' => 'modalButtonProfile']) .
                '<br><br>';
    }

    $account_html =  '<div class="box box-primary">' . DetailView::widget([
                'model' => $account,
                'attributes' => [
                    'id',
                    'username',
                    'email:email',
                    [
                        'label' => 'Status',
                        'attribute' => 'status',
                        'value' => $account->getStatusText(),
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
    ]).'</div>' ;


    $social_html = 'Tab for Social Data';

    $settings_html = 'Tab for User Settings';
    $roles_html = '';

    if ($roles != null) {
        $roles_html .= '<table class="table table-bordered">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($roles as $role) {
            $roles_html .= '<tr><td>' . $role->name . '</td><td>' . $role->description . '</td></tr>';
        }
        $roles_html .= '</tbody>
    </table>';
    }

    $items[] = [
        'label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Account',
        'encode' => false,
        'content' => '<br>' .
        Html::button('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Account Edit', ['value' => Url::to(['edit']), 'class' => 'btn btn-success', 'id' => 'modalButtonAccount']) .
        '&nbsp ' .
        Html::button('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Change Password', ['value' => Url::to(['change-password']), 'class' => 'btn btn-danger', 'id' => 'modalButtonChangePass']) .
        '<br><br>' . $account_html,
            //            'headerOptions' => ['class'=>"col-lg-3"],
    ];

    $items[] = [
        'label' => '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Profile',
        'encode' => false,
        'content' => '<br>' .
        $profile_html,
        //   'headerOptions' => ['class'=>"col-lg-3"],
        'options' => ['id' => 'profileTab'],
    ];

    $items[] = [
        'label' => '<span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Roles',
        'encode' => false,
        'content' => '<br>' .
        $roles_html,
        //   'headerOptions' => ['class'=>"col-lg-3"],
        'options' => ['id' => 'rolesTab'],
    ];

    $items[] = [
        'label' => '<span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Social',
        'encode' => false,
        'content' => '<br>' .
        $social_html,
        //   'headerOptions' => ['class'=>"col-lg-3"],
        'options' => ['id' => 'socialTab'],
    ];

    $items[] = [
        'label' => '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings',
        'encode' => false,
        'content' => '<br>' .
        $settings_html,
        //   'headerOptions' => ['class'=>"col-lg-3"],
        'options' => ['id' => 'settingsTab'],
    ];
    ?>

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <?php
                    echo Html::img(\plathir\user\helpers\UserHelper::getProfileImage(Yii::$app->user->identity->id, $this), ['alt' => 'User profile picture',
                        'class' => 'profile-user-img img-responsive img-circle']);
                    ?>
                    <h3 class="profile-username text-center"><?= $account->username ?></h3>
                    <p class="text-muted text-center"><?= \plathir\user\helpers\UserHelper::getProfileFullName(Yii::$app->user->identity->id) ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?= $account->email; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Created</b> <a class="pull-right"><?= Yii::$app->formatter->asDatetime($account->created_at); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Updated</b> <a class="pull-right"><?= Yii::$app->formatter->asDatetime($account->updated_at); ?></a>
                        </li>
                    </ul>


                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- About Me Box -->





        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <?php
                echo Tabs::widget([
                    'items' => $items,
                ]);
                ?>
                <?php
// Display modal Account edit
                Modal::begin([
                    'header' => '<h4>Account Edit</h4>',
                    'id' => 'modalAccount',
                    'size' => 'modal-sm',
                    'footer' => 'Footer modal'
                ]);
                echo "<div id='modalContentAccount'> </div>";
                Modal::end();
                ?>
                <?php
                // Display change Password edit
                Modal::begin([
                    'header' => '<h4>Change Password</h4>',
                    'id' => 'modalChangePass',
                    'size' => 'modal-sm',
                    'footer' => 'Footer modal'
                ]);
                echo "<div id='modalContentChangePass'> </div>";
                Modal::end();
                ?>

                <?php
                Modal::begin([
                    'header' => '<h4>Edit Profile</h4>',
                    'id' => 'modalProfile',
                    'size' => 'modal-md',
                    'footer' => 'Footer modal'
                ]);
                echo "<div id='modalContentProfile'> </div>";
                Modal::end();
                ?>

            </div><!-- /.col -->
        </div><!-- /.row -->

</section><!-- /.content -->