<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!--    <div class="jumbotron">
            <p>My yii2-advance Backend</p>
        </div>-->

    <div class="content body">

        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Applications</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
                <div class="box-footer">
                    The footer of the box
                </div><!-- box-footer -->
            </div><!-- /.box -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Users</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">  
                    The body of the box
                </div><!-- /.box-body -->
                <div class="box-footer">
                    The footer of the box
                </div><!-- box-footer -->
            </div><!-- /.box -->

            <?php //echo Yii::$app->settings->test(); ?>
            <?php
            $comp = \Yii::$app->getModules();
//            echo '<pre>';
//            print_r($comp);
//            echo '</pre>';

       //     $comp = \Yii::$app->getComponents();
            echo '<pre>';
            print_r($comp);
            echo '</pre>';
            
            ?>
            
                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Today</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              
              
              
        </div>

    </div>
</div>
