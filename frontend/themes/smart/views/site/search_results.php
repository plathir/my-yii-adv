<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\Tabs
?>
<?php
$grp_modules = [];
if (count($results) == 0) {
    $title = 'No Results found !';
} else {
    $title = 'Found ' . count($results) . ' Result(s) :';

    foreach ($results as $result) {
        $modules[] = $result->moduleName;
    }
    $grp_modules = array_unique($modules, SORT_REGULAR);
}
?>

<?php
$i = 0;
foreach ($grp_modules as $moduleName) {
    $content = '';
    foreach ($results as $result) {
        if ($result->moduleName == $moduleName) {
            $content .= '<h3><a href = "' . $result->url . '">' . $result->title . '</a></h3>'
                    . $result->description
                    . '<hr>';
        }
    }

    $i++;
    if ($i == 1) {
        $active = true;
    } else {
        $active = false;
    }
    $items[] = [
        'label' => $moduleName,
        'content' => $content,
        'active' => $active
    ];
}
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= $title ?>
        </div><!-- /.box-header --> 
        <div class="panel-body" style="overflow:auto;">
            <?php
            if ($grp_modules) {
                echo Tabs::widget(['items' => $items]);
            }
            ?>            
        </div>
        <div class="footer">
        </div>
    </div>
</div>


