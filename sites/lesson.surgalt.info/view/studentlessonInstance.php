<!DOCTYPE HTML>
<?php
include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            }
      if($_GET["view"] &&($_GET["view"] == "studentLcontent")&&($_GET["view"] == "studentnewsfeed")&&($_GET["view"] == "lessonstudents")&&($_GET["view"] == "lessonfiles")&&($_GET["view"] == "studentLdefinition"))
{
$s = $_GET["view"];
}
else{
    $s = 'studentlesson';}
  ?>
// 


<html>
    <head>
    <?php require 'headerwithmenucss.php';?>
     <style>
        .float {
	float:left;
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
                <div class="col-md-9 float"> 
                <div class="">
                  <!--Тухайн нэг хичээлийн хуудас-->
                    <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Хичээлийн нэр</a></li>
                    <li><a href="#group" data-toggle="tab">Хичээлийн баг</a></li>
                    </ul>
                    <div class="tab-content float">
                    <div class="tab-pane active" id="home">
                     <?php  include_once "$s"."."."php"; ?>
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
                </div>
                <div class="col-md-3">
                  <?php // require 'lessonInstancemenu.php';?>                  
                </div>
            </div>
        
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 