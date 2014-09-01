<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            html {
                height: 100%;
            }
            body {
                height: 100%;
                margin: 0;
                background: linear-gradient(to left top,  skyblue,white);
                
            }
        </style>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/nav-styles.css" rel="stylesheet" />  

    </head>
    <body>

        <nav class="nav navbar-custom">
            <div class="container-fluid" >

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-utehn-navbar-collapse-1">

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">
                        <i class="glyphicon glyphicon-th-large"></i>
                        <?php echo Yii::app()->name; ?>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-utehn-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>

                            <?php
                            echo CHtml::link('<i class="glyphicon glyphicon-user"></i> ข้อมูลหน่วยงาน ', array('Site/About', 'id' => '123'));
                            ?>
                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-list"></i>
                                หมวดรายงาน <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <?php
                                    echo CHtml::link('<i class="glyphicon glyphicon-folder-open"></i>  ประชากรตามโครงสร้างประชากร ', array('Person/Index'));
                                    ?>
                                </li>
                                <li class="divider"></li>                                
                                <li>
                                    <?php
                                    echo CHtml::link('<i class="glyphicon glyphicon-folder-open"></i>  ประชากรตามกลุ่มวัย ', array('GroupAge/Index', 'id' => '123'));
                                    ?>
                                </li>

                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-cog"></i>
                                <?php
                                if (Yii::app()->user->isGuest) {
                                    echo "ตัวเลือก";
                                } else {
                                    echo Yii::app()->user->getState('fullname');
                                }
                                ?>

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php if (!Yii::app()->user->isGuest) : ?>
                                    <li>
                                        <?php echo CHtml::link('จัดการผู้ใช้', array('User/Admin')); ?>
                                    </li>                           

                                    <li><a href="#">จัดการระบบ</a></li>
                                <?php endif; ?>

                                <li class="divider"></li>
                                <li><a href="#">เกียวกับ</a></li>
                                <?php if (Yii::app()->user->isGuest) : ?>
                                    <li><a href="index.php?r=Site/Login">Login</a></li>
                                <?php else: ?>
                                    <li><a href="index.php?r=Site/Logout">Logout</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </div> 
        </nav>

        <div style="padding-left:10px;padding-right: 10px;">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('booster.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif; ?>     



            <?php echo $content; ?>

            <div style="padding-top: 10px"></div>
            <div id="footer" align="center" class="well">
                Copyright &copy; <?php echo date('Y'); ?> by สสจ.แพร่.
                <br/> All Rights Reserved.

            </div><!-- footer -->



        </div>




    </body>
</html>

