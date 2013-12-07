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
            <div class="page-header">
                <h1><?php echo $lessoncode;?> <small>- хичээлийн оюутны хуудас</small></h1>
            </div>
            <div class="row">            
                <div class="tabbable tabs-right">
                  <!--Тухайн нэг хичээлийн хуудас-->
                    <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Хичээлийн нэр</a></li>
                    <li><a href="#group" data-toggle="tab">Хичээлийн баг</a></li>
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="home"><?php  //include 'lessonnewsfeed.php'; ?>
                                    <div class="col-md-9">

                                    <form id="form1" name="form1" method="post" action="?host=<?php echo HOSTNAME; ?>&action=1" enctype="multipart/form-data">

                                    <?php 
                                    //  LessonController::GetlessonStudents();   
                                    ?>     
                                   Тухайн хичээлийн агуулгын хуудас
                                    </form>


                                    </div>
                                    <div class="col-md-3">
                                    <?php require 'lessonInstancemenu.php';?>                  
                                    </div>
                    </div>
                    <div class="tab-pane" id="group"> <?php include 'studentgroup.php'; ?> </div>
                    </div>
                    <script>
                    $(function () {
                    //$('#myTab a:last').tab('show');
                    $('#myTab a:first').tab('show');
                    })
                    </script>
                </div>
                </div>
                <div class="col-md-3">
                  <?php // require 'lessonInstancemenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 