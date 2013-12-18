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
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <div class="page-header">
              
            </div>
            <div class="row">
                <div class="col-md-9">
                
                  <form id="form1" name="form1" method="post" action="?host=<?php echo HOSTNAME; ?>&action=1" enctype="multipart/form-data">

                    <?php 
                  //  LessonController::GetlessonStudents();   
                    ?>     
 Шинэ мэдээ мэдээллийг харуулна зөвхөн сурагчийн тухайн хичээлийн хувьд
                </form>
                  
                  
                </div>
                <div class="col-md-3">
                  <?php require 'lessonInstancemenu.php';?>                  
                </div>
            </div>
        </div>
    </body>
</html> 