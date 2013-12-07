<!DOCTYPE HTML>
<!--Тухайн нэг хичээлийн хуудас-->

<?php
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            $user = User::getInstance();
            $user_perm = $user->getUsrTpID();
            if($user_perm == 1) // Админ
            {require_once PATH_BASE . "/sites/".HOSTNAME."/view/lessonInstance.php";}
            if($user_perm == 3) // Багш
            {header("Location: /surgalt/index.php?host=lesson.surgalt.info&view=teacherlessonInstance&Lid=$lessoncode");
            }
            if($user_perm == 4) //Сурагч
            {header("Location: /surgalt/index.php?host=lesson.surgalt.info&view=studentlessonInstance&Lid=$lessoncode"); }
            }
             else {
                echo'Та энэ хуудсанд нэвтрэх эрхгүй байна.';
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
                <h1><?php echo $lessoncode;?> <small>- хичээлийн хуудас</small></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                  
                  
                  
                  
                </div>
                <div class="col-md-3">
                  <?php require 'lessonInstancemenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 