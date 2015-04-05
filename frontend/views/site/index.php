<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h3>My yii Advance Frontend</h3>


    <div class="body-content">

        <div class="row">
            <h3>Site Actions</h3>
            <ul>
                <li><?= Html::a('send test email', ['site/send']) ?> </li>    
            </ul>
            <h2> <a href="https://github.com/plathir/yii2-smart-user">plathir/yii2-smart-user</a></h2>
            <h3>Installation</h3>
            <pre>
                <?php
                $str = "'modules' => [
                ... 
                     'user' => [ 
                     'class' => 'plathir\user\Module',
                    ],
                  ... 
                ]>";
                echo $str;
                ?>        
            </pre> 

            <h3>User Registration</h3>
            <ul>
                <li><?= Html::a('user/registration/signup', ['user/registration/signup']) ?> </li>    
                <li><?= Html::a('user/registration/user-activation?token= ( need tocken )', ['user/registration/user-activation?token= ']) ?> </li>    
                <li><?= Html::a('user/registration/request-password-reset', ['user/registration/request-password-reset']) ?> </li>    
                <li><?= Html::a('user/registration/reset-password?token= ( need tocken )', ['user/registration/reset-password?token= ']) ?> </li>    

            </ul>

            <h3>User Security</h3>
            <ul>
                <li><?= Html::a('user/security/login', ['user/security/login']) ?> </li>    
                <li><?= Html::a('user/security/logout', ['user/security/logout']) ?> </li>    
            </ul>

            <h3>User Account edit</h3>

            <ul>
                <li><?= Html::a('user/account/edit', ['user/account/edit']) ?> </li>    

            </ul>      
            <h3>User Profile edit</h3>

            <ul>
                <li><?= Html::a('user/profile/login', ['user/profile/edit']) ?> </li>    
            </ul>  

            <h3>User Administration ( login as Administrator ) </h3>

            <ul>
                <li><?= Html::a('user/admin/index', ['user/admin/index']) ?> </li>    
                <li><?= Html::a('user/admin/create', ['user/admin/create']) ?> </li>    
                <li><?= Html::a('user/admin/view', ['user/admin/view']) ?> </li>    
                <li><?= Html::a('user/admin/edit', ['user/admin/edit']) ?> </li>    
            </ul>  

        </div>


    </div>
</div>
