<?php
   if(isset($_GET["Lid"]))
    {
     if($_GET["type"] == 5)
           { require_once PATH_BASE . "/sites/".HOSTNAME."/view/showLdefinition.php";}
     else
         { require_once PATH_BASE . "/sites/".HOSTNAME."/view/studentlessons.php";}
    }
?>
<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<!--        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>view/js/jquery 1.10.2.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>view/js/script.js"></script>-->
        <style>
            .dotorhi_1
            {
                display:none;
            }
            .neg_2
            {
                padding-left: 10px;
            }
            .top{ margin-top: 100px;}
            
            .left{ margin-left: 200px;}
        </style>
    </head>
    <body>
<div class="container-fluid top">
     <h4 class='left' > Хичээлийн самбар</h4>
     <br><br>
<div class="row-fluid">
<div class="span3">
<!--Sidebar content-->
    <?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/LessonModel.php";
    Draw::DrawLessonMenu();                    
    ?>
</div>
<div class="span8">

            <h4> Хичээлийн агуулгын төлөвлөгөө</h4>
        <br>
<form id="form1" name="form1" method="" action="" enctype="multipart/form-data">
<table class="table table-hover table-bordered">
            <tr class="warning" >
                <td width='200px;'> Тайлбар </td>
                <td> Утга</td>
            </tr>
            <?php 
               LessonController::DrawLessonDefinitionstud();   
             ?> 
</table>
</form>   
<script>
$(document).ready(function(){
        $(".neg_2").children("i.icon-plus").click(function(){
            $(this).attr("class","icon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i.icon-minus").attr("class","icon-plus");
        });
    });
</script>
</div>
</div>
</div>
</body>
</html>
