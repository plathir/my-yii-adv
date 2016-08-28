<?php

use yii\imagine\Image;
use dosamigos\gallery\Gallery;

$galleryArray = json_decode($widget->galleryItems);
if ($galleryArray) {
    echo '<h3>' . $widget->title . '</h3>';


    $items = '';

    foreach ($galleryArray as $image) {

        $items[] = [
            'url' => $widget->previewUrl . '/' . $image,
            'src' => $widget->previewUrl . '/' . $image,
            'imageOptions' => [
                'style' => ['max-width' => '200px',
                    'max-height' => '150px',
                ]
            ],
            'options' => ['title' => $image,
                'style' => 'width:200px',
                'class' => 'inline-block'
            ]
        ];
    }
    ?>
    <div>
        <?=
        Gallery::widget(['items' => $items,
            'options' => [
                'id' => 'gallery-widget1-' . $widget->id,
            ],
            'templateOptions' => [
                'id' => 'blueimp-gallery1-' . $widget->id
            ],
            'clientOptions' => [
                'container' => '#blueimp-gallery1-' . $widget->id
            ]]
        );
        ?>
    </div>
    <?php
}
?>
