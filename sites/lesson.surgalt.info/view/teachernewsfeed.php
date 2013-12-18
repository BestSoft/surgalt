<!DOCTYPE HTML>
<!--Тухайн нэг хичээлийн хуудас-->

<?php
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            }
 ?>
<?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/LessonModel.php";
?> 
<html> 
    <head>
    <?php require 'headerwithmenucss.php';?>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <div class="page-header">
                <h1><?php echo $lessoncode;?> <small>- хичээлийн хуудас</small></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                  
                  
                  Тухайн хичээлтэй холбоотой багшид харагдах мэдээ, мэдээлэл
                  
                </div>
                <div class="col-md-3">
                  <?php require 'teacherlessonmenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 