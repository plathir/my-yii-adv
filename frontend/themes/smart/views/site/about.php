<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use plathir\widgets\common\helpers\PositionHelper;

$positionHelper = new PositionHelper();

$this->title = Yii::t('app', 'About');
?>
<div class="body-content">
    <div class="row-fluid">
        <div class="col-lg-12">        
            <?php echo $positionHelper->LoadPosition('fe_dashboard_about'); ?>
        </div>

    </div>
</div>