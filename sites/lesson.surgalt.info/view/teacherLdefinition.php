<!DOCTYPE HTML>
<!--Тухайн нэг хичээлийн хуудас-->

<?php
 $lessoncode = $_GET["Lid"];
            $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $queryid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($queryid);
            $lessonID=$row["LsnID"];
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            }
            
            if (isset($_GET["type"]) && ($_GET["type"] == "del"))
            {

                            $delQuery = "DELETE FROM `humuunco_surgalt`.`lessondefinition` 
                            WHERE `lessondefinition`.`LsnID` = '$lessonID'";
                            $queryid = $db->query($delQuery);
                            echo 'Устгагдлаа';

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
               <br>   Хичээлийн тодорхойлолт <br> <br>
                                    <form id="form1" name="form1" method="post" action="?host=<?php echo HOSTNAME; ?>&action=1" enctype="multipart/form-data">

                                        
                                   
                                   <?php 
                                    LessonController::DrawLessonDefinitionForm();   
                                    ?>    
                                   
                    </table>
                                    </form>
                </div>
                <div class="col-md-3">
                  <?php require 'teacherlessonmenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 