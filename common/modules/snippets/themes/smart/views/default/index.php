<?php

use yii\helpers\Markdown;
?>
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Code Snippets</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <?php
            if ($snippets) {
                foreach ($snippets as $snippet) {
                    ?>

                    <div class="panel box box-info">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $snippet->id ?>">
                                    <?= $snippet->description; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?= $snippet->id ?>" class="panel-collapse collapse">
                            <div class="box-body">
                                <?= Markdown::process($snippet->full_text, 'gfm'); ?>
                                <?php
                                if ($snippet->example) {
                                    echo '<h4>Example:</h4>';
                                    if (file_exists(dirname(dirname(__FILE__)) . '/snippets/examples/' . $snippet->example . '.php')) {
                                        include dirname(dirname(__FILE__)) . '/snippets/examples/' . $snippet->example . '.php';
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

