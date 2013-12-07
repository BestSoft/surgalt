<!DOCTYPE HTML>

<?php
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            }
  ?>
<html>
    <head>
    <?php require 'headerwithmenucss.php';?>
    <style>
        .tabs .secondary-nav {
	float:right;
	margin-left:10px;
	margin-right:0;
}
    </style>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
<!--            <div class="page-header">
                <h1><?php echo $lessoncode;?> <small>- хичээлийн хуудас</small></h1>
            </div>-->
            <div class="row">
                <div class="col-md-9">
                  <!--Тухайн нэг хичээлийн сурагчид харагдах хуудас-->
<!--                   <div class="tab-content">
                    <div class="tab-pane active" id="home"><?php  ///include 'studentlesson.php'; ?>
                    </div>
                    <div class="tab-pane" id="group"> <?php // include 'sgroup.php'; ?> </div>
                    </div>-->
                </div>
                <div class="col-md-3">
                  <?php require 'studentgroupmenu.php';?>    
<!--                    <ul class="nav pull-right" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Хичээлийн нэр</a></li>
                    <li><a href="#group" data-toggle="tab">Хичээлийн баг</a></li>
                    </ul>
                   
                    <script>
                    $(function () {
                    //$('#myTab a:last').tab('show');
                    $('#myTab a:first').tab('show');
                    })
                    </script>-->
                </div>
            </div>
        </div>
    </body>
</html> 