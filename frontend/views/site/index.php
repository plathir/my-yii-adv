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

            <h3>User Registration actions</h3>
            <ul>
                <li><?= Html::a('user/registration/signup', ['user/registration/signup']) ?> </li>    
                <li><?= Html::a('user/registration/user-activation?token= ( need token )', ['user/registration/user-activation?token= ']) ?> </li>    
                <li><?= Html::a('user/registration/request-password-reset', ['user/registration/request-password-reset']) ?> </li>    
                <li><?= Html::a('user/registration/reset-password?token= ( need token )', ['user/registration/reset-password?token= ']) ?> </li>    

            </ul>

            <h3>User Security actions</h3>
            <ul>
                <li><?= Html::a('user/security/login', ['user/security/login']) ?> </li>    
                <li><?= Html::a('user/security/logout', ['user/security/logout']) ?> </li>    
            </ul>

            <h3>User Account edit actions ( logged in User ) </h3>

            <ul>
                <li><?= Html::a('user/account/my', ['user/account/my']) ?> </li>    
                <li><?= Html::a('user/account/edit ( with Ajax render )', ['user/account/edit']) ?> </li>    
                <li><?= Html::a('user/account/change-password ( with Ajax render )', ['user/account/change-password']) ?> </li>    

            </ul>      
            <h3>User Profile edit actions ( logged in User ) </h3>

            <ul>
                <li><?= Html::a('user/user-profile/edit-my-profile ( with Ajax render )', ['user/user-profile/edit-my-profile']) ?> </li>    
                <li><?= Html::a('user/user-profile/create-my-profile ( with Ajax render )', ['user/user-profile/create-my-profile']) ?> </li>    
            </ul>  

            <h3>User Administration actions ( login as Administrator ) </h3>

            <ul>
                <li><?= Html::a('user/admin/index', ['user/admin/index']) ?> </li>    
                <li><?= Html::a('user/admin/create', ['user/admin/create']) ?> </li>    
                <li><?= Html::a('user/admin/view?id= (need user id)', ['user/admin/view?id=']) ?> </li>    
                <li><?= Html::a('user/admin/update?id= (need user id)', ['user/admin/update?id=']) ?> </li>    
            </ul>  
            <?php echo 'media path : '. yii::getAlias('@media') ?>
           
        </div>
    </div>
</div>
