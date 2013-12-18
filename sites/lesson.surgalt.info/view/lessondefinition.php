<!DOCTYPE HTML>
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
                <h1><?php echo $lessoncode;?> <small>- хичээлийн тодорхойлолт</small></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                  <!--Тухайн нэг хичээлийн хуудас-->
                  
                <form id="form1" name="form1" method="post" action="?host=<?php echo HOSTNAME; ?>&action=1" enctype="multipart/form-data">
<!--                    <table class="table table-hover table-bordered">
                    <tr class="warning" >
                    <td> Тайлбар </td>
                    <td> Утга</td>
                    </tr>-->

                    <?php 
                    LessonController::DrawLessonDefinitionForm();   
                    ?>     
<!--                    <tr>

                    <td></td>
                    <td>
                    <a href='?host=lesson.surgalt.info&type=edit'>Засах</a>
                    <input class="btn btn-primary" name="addtopic" value="Устгах" type="submit">
                    </td>
                    </tr>
                    </table>-->
                </form>
                  
                </div>
                <div class="col-md-3">
                  <?php // require 'lessonInstancemenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 