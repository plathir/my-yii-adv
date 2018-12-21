<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use plathir\widgets\common\helpers\PositionHelper;
use plathir\widgets\common\helpers\LayoutHelper;

$positionHelper = new PositionHelper();

$this->title = Yii::$app->settings->getSettings('ApplicationName');
?>
<div class="body-content">
    <?php
    $layoutHelper = new LayoutHelper();
    echo $layoutHelper->LoadLayout(__FILE__);
    ?>    
</div>