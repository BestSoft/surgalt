<!DOCTYPE HTML>
<!--Тухайн нэг хичээлийн хуудас-->

<?php
 if($_GET["Lid"])
            {
            $lessoncode = $_GET["Lid"];
            }

   if (isset($_POST["insertlessoncontent"]))
    {
         $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $query = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($query);
            $lessonID=$row["LsnID"]; // LESSON ID-аа авчихлааа
                        $title = $_POST['title'];
                        $desc = $_POST['desc'];
                       // $attach = $_POST['attach'];
                      //  $link = mysql_escape_string($_REQUEST['link']);
                        $usemtrl = $_POST['usemtrl'];
                        $sort = $_POST['sort'];
                       // $selfpnt =  $_POST['selfpnt'];
                      //  $selfenddt = $_POST['selfenddt'];   
                        $lessoncode = $_GET["Lid"];
             if (is_uploaded_file($_FILES["file"]["tmp_name"]))
		{
			if (checkExtPic(getExt($_FILES["file"]["name"])))
			{
				$ext = getExt($_FILES["file"]["name"]);
				$filename = $lessoncode.".".$ext;
				$filepath = PATH_BASE . "/sites/".HOSTNAME."/pictures/"; 
            $sql1 = "INSERT INTO `humuunco_surgalt`.`lessoncontent`
            (`LsnCntID`, `Title`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`,`Attachname`, `Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
            VALUES ('', '$title', '$lessontype', '$desc', '$usemtrl', '".$filepath."','".$filename."', '$week', '$sort', '', '', '$lessonID', NULL, NULL, NULL, NULL)";
            $db -> query($sql1);
            echo 'Амжилттай хадгалагдлаа.';
            move_uploaded_file($_FILES["file"]["tmp_name"], $filepath.$filename);
			}
//                        else{
//                            echo 'buruu extention';
//                        }
		}
                else
		{
            $sql = "INSERT INTO `humuunco_surgalt`.`lessoncontent`
            (`LsnCntID`, `Title`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`, `Attachname`,`Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
            VALUES ('', '$title', '$lessontype', '$desc', '$usemtrl', NULL, NULL , '$week', '$sort', '', '', '$lessonID', NULL, NULL, NULL, NULL)";
            $db -> query($sql);
            echo 'Амжилттай хадгалагдлаа.( хавсаргасан файлгүй.)';
                }
            
            // LsnTpID  - bas get r avah
            // Attachment ydaj zurag upload hiideg bh
            // week - get r avah??
                    
    }          
            
            ?>


<?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonContentController.php";
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
                    <br><br>
                    
                         <?php 
                            LessonContentController::DrawLessonContent();   
                        ?> 
                              
               </div>
                 <script>
                    $(function () {
                    $('#mysubtab a:last').tab('show');
                    $('#mysubtab a:first').tab('show');
                    })
                 </script>
                <div class="col-md-3">
                  <?php require 'teacherlessonmenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 