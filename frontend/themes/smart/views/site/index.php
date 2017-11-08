<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use plathir\widgets\common\helpers\PositionHelper;

$positionHelper = new PositionHelper();

$this->title = Yii::$app->settings->getSettings('ApplicationName');
?>
<div class="body-content">
    <div class="row-fluid">
        <div class="col-lg-12">        
            <?php echo $positionHelper->LoadPosition('fe_dashboard_header'); ?>
        </div>

    </div>
    <div class="row-fluid">
        <div class="col-lg-9">        
            <?php echo $positionHelper->LoadPosition('fe_dashboard'); ?>
        </div>    
        <div class="col-lg-3">    

        </div>
    </div>
</div>