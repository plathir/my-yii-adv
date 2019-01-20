<?php

use yii\helpers\Markdown;
use yii\web\View;

$css = "
  .st {  
  position: sticky;
  position: -webkit-sticky;
  top: 0; /* required */
  }"

;

$this->registercss($css);
?>

  
<div class="st">
    <div class="col-lg-2 col-md-2 col-sm-3">
        <div class="well">
          <div id="docmenu">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#backend">Backend</a></li>
                    <li><a href="#widgets">Widgets</a></li>
                    <li><a href="#user">User</a></li>
                    <li><a href="#apps">Apps</a></li>
                    <li><a href="#permissions">Permissions</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#filemanager">Manage Server files</a></li>
                    <li><a href="#carousel">Carousel</a></li>
                    <li><a href="#staticpages">Static Pages</a></li>
                    <li><a href="#log">Log Viewer</a></li>
                    
                </ul>      
            </div>
            </div>
    </div>
    <div class="col-lg-9 col-md-10 col-sm-9 ">
        
    </div>
</div>
  

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-3">
  
        
        </div>
        <div class="col-lg-9 col-md-10 col-sm-9 ">
            <div id="backend">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/backend.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            <div id="widgets">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/widgets.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            
            <div id="user">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/user.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            <div id="apps">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/apps.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            <div id="permissions">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/permissions.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>
            <div id="blog">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/blog.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>            
            <div id="filemanager">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/filemanager.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>      
            <div id="carousel">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/carousel.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>      
            <div id="staticpages">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/staticpages.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>      
            <div id="log">
                <?php $markdown_data = file_get_contents(__DIR__ . "/docfiles/log.md"); ?>
                <?= Markdown::process($markdown_data, 'extra'); ?>                
            </div>      
            
        </div>
    </div>     
</div>


<?php
// Make active button
$js = "

setActive();

window.onhashchange = function() {
 setActive();
}


$( '#docmenu .nav-pills a' ).on( 'click', function () {
	$( '#docmenu .nav-pills' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
    var current = location;
    
});

function setActive() {
    var current_link = location.hash;
    var active_li = $( '#docmenu .nav-pills' ).find( 'li.active' )[0];
    var active_link = $('a',active_li).attr('href');

    if ( active_link != '' && current_link != '') {
        console.log('change');
        if ( current_link != active_link ) {
           var active_link_obj = $( '#docmenu .nav-pills' ).find( 'li.active' );    
           var current_link_obj = $( '#docmenu .nav-pills' ).find( 'li:has(a[href$='+ current_link.replace('#','') + '])' );       
           if ( current_link_obj.length !=0 ) {
            active_link_obj.removeClass( 'active' );
            current_link_obj.addClass('active');            
            }
        }
    }

}

";

$this->registerjs($js, View::POS_READY);
