<?php

use yii\helpers\Markdown;
use yii\web\View;
?>

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-3">
            <div id="docmenu">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#user">User</a></li>
                    <li><a href="#apps">Apps</a></li>
                </ul>      
            </div>
        </div>
        <div class="col-lg-9 col-md-10 col-sm-9 ">
            <div id="user">
                <?php $markdown_data = file_get_contents(__DIR__ . "/user.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            <div id="apps">
                <?php $markdown_data = file_get_contents(__DIR__ . "/apps.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>

        </div>

    </div>     
</div>


<?php
// Make active button
$js = "$( '#docmenu .nav-pills a' ).on( 'click', function () {
	$( '#docmenu .nav-pills' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
    var current = location;
    console.log(current.hash);
    
        

}); ";

$js1 = "$(function(){
    var current = location.href;
    console.log(current);
    console.log(location);
    $('#docmenu li a').each(function(){
    console.log($(this).attr('href'));
        // if the current path is like this link, make it active
        
        if($(this).attr('href').indexOf(current) !== -1){
            $(this).addClass('active');
        }
    })
})";

$this->registerjs($js, View::POS_READY);
