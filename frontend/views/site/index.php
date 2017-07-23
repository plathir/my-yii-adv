<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use plathir\widgets\common\helpers\PositionHelper;

$positionHelper = new PositionHelper();

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">        
                <?php echo $positionHelper->LoadPosition('fe_blog_dashboard'); ?>
            </div>    
            <div class="col-lg-3">        
                
            </div>
        </div>
    </div>
</div>