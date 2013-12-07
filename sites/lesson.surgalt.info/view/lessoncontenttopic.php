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
    
    Draw::DrawStudentLesson();                    
    
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
                <td>№</td>
                <td> Сэдэв</td>
                <td> Агуулга</td>
                <td> Унших материал</td>
                <td></td>
            </tr>
            <?php 
                LessonController::DrawLessonContentTopic();   
             ?>     
            <tr>
                <td></td>
                <td><input type="text" name ="topic" id="inputInfo"></td>
                <td><input type="text" name="topiccontent" id="inputInfo"></td>
                <td><input type="text" name="topicuseful" id="inputInfo"></td>
                <td><input class="btn btn-primary" name="addtopic" value="Нэмэх" type="submit"></td>
            </tr>
</table>
     </form>
      </div>
      </div>
    </div>
    </body>
</html>
