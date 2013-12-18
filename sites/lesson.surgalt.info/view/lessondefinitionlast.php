<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <body>
<div class="container-fluidzai">
  <div class="row-fluid">
       <div class="span3">
              <!--Sidebar content-->
<?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/LessonModel.php";
    
    Draw::DrawLessonMenu();                    
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == 1)
            {
            LessonModel::insertTopic();
            }
    }
?>              
       </div>
       <div class="span8">
            <h4> Хичээлийн агуулгын төлөвлөгөө оруулах</h4>
        <br>
<form id="form1" name="form1" method="post" action="?host=<?php echo HOSTNAME; ?>&action=1" enctype="multipart/form-data">
<table class="table table-hover table-bordered">
            <tr class="warning" >
                <td> Тайлбар </td>
                <td> Утга</td>
            </tr>
            
            <?php 
               LessonController::DrawLessonDefinitionForm();   
             ?>     
            <tr>
               
                <td></td>
                <td>
                    <a href='?host=lesson.surgalt.info&type=edit'>Засах</a>
                    <input class="btn btn-primary" name="addtopic" value="Устгах" type="submit">
                </td>
            </tr>
</table>
     </form>
      </div>
      </div>
    </div>
    </body>
</html>
