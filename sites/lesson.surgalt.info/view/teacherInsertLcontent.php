<!DOCTYPE HTML>
<?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/LessonModel.php";
?> 
<?php
   $db = DataBase::getInstance();
   $lessoncode = $_GET["Lid"];
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $query = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($query);
            $lessonID=$row["LsnID"];
            
            $week = $_GET["wk"];
            $ltype = $_GET["ltype"];
 if($_GET["Lid"]&&$_GET["wk"]&&$_GET["ltype"])
            {
            $lessoncode = $_GET["Lid"];
            $week = $_GET["wk"];
            $lessontype = $_GET["ltype"];
            function getExt($path)  
            {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            return $ext;
            }
 //$_FILES['filepdf']['type'] != "application/pdf"
            function checkExtPic($ext)
            {
            if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "gif") || ($ext == "png") || ($ext == "pdf")|| ($ext == "docx")|| ($ext == "txt"))
            {
                return true;
            }
            return false;
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
            }
            
            
                if (isset($_POST["editlessoncontent"]))
                {
             $db = DataBase::getInstance();       
             $updateQuery = "UPDATE `humuunco_surgalt`.`lessoncontent` SET `Title` = '".$_POST["title"]."', 
             `Desc` = '".$_POST["desc"]."', `UseMtrl` = '".$_POST["usemtrl"]."',
             `Attachment` = '', `Attachname` = '', `Sort` = '".$_POST["sort"]."' WHERE `lessoncontent`.`LsnCntID` = '$lessonID';";
             $queryid = $db->query($updateQuery);
             echo 'Амжилттай хадгалагдлаа.';}
             
               if (isset($_GET["type"]) && ($_GET["type"] == "del"))
            {               
            $getlessoncontentid= "SELECT `LsnCntID` FROM `lessoncontent` WHERE `LsnID`='$lessonID' and `Week`='$week' and `LsnTpID`='$ltype'";
            $queryconid = $db->query($getlessoncontentid);
            $rowconid = mysqli_fetch_assoc($queryconid);
            $LsnCntID=$rowconid["LsnCntID"];

                            $delQuery = "DELETE FROM `humuunco_surgalt`.`lessoncontent` WHERE `lessoncontent`.`LsnCntID` = '$LsnCntID'";
                            $queryid = $db->query($delQuery);
                            echo 'Хичээлийн агуулга устгагдлаа';

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
                  
                  
                  <form method="post" action="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>" enctype="multipart/form-data">
                            
                                        
                                 
                            <table class="table-urgun " >
                                <br> <br> <br>
                               <h4>  Хичээлийн агуулга оруулах хуудас </h4><br>
                             <br>
                       <?php 
                       if (isset($_GET["type"]) && ($_GET["type"] == "edit")){ 
                        $query = LessonModel::GetLessonContent();
                        $user = User::getInstance();
                        $user_perm = $user->getUsrTpID();
                        $lesson = $_GET["Lid"];
                        $wk = $_GET["wk"];
                        $ltype= $_GET["ltype"];
                        $result = mysqli_fetch_assoc($query);
                         ?>            
                            <tr>
                                <td width="300"> <label> Хичээлийн гарчиг</label> </td>
                                <td> <input class="form-control" type="text" name="title" value="<?php echo $result["Title"]; ?>" placeholder="Хичээлийн гарчгийг оруулна уу."> </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">​<textarea rows="4" cols="129" class="span9" name="desc" id="txtArea" value="<?php echo $result["Desc"]; ?>" >Хичээлийн тайлбар оруулна уу.</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td> <label>Файл хавсаргах</label> </td>
                                <td> <label></label> <input type="file" name="file" value="<?php echo $result["Attachment"]; ?>"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea rows="4" cols="129"  class="span9" name="link" id="txtArea" value="<?php //echo $result[""]; ?>">Холбоос оруулах</textarea></td>
                            </tr>
                            <tr> 
                                <td colspan="2">​<textarea rows="4" cols="129"  class="span9" name="usemtrl" id="txtArea" value="<?php echo $result["UseMtrl"]; ?>">Ашиглах материал оруулна уу..</textarea></td>
                            </tr>
                            
                            <tr>
                                <td> <label>Эрэмбэ </label></td>
                                <td><input class="form-control" type="text" name="sort" value="<?php echo $result["Sort"]; ?>"/></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td><button type="submit" name ="editlessoncontent"  class="btn" > <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>">  Даалгавар оруулах </a></button></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                            <center> <input type="submit"  name ="editlessoncontent" value="Хадгалах" class="btn btn-primary"/>
                            <button type="button" class="btn"> <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherlessonInstance&Lid=<?php echo $lessoncode;?>"> Болих </a></button>
                            </center>
                            </td>
                            </tr>
                       <?php } else { ?>
                              <tr>
                                <td width="300"> <label> Хичээлийн гарчиг</label> </td>
                                <td> <input class="form-control" type="text" name="title" placeholder="Хичээлийн гарчгийг оруулна уу."> </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">​<textarea rows="4" cols="129" class="span9" name="desc" id="txtArea">Хичээлийн тайлбар оруулна уу.</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td> <label>Файл хавсаргах</label> </td>
                                <td> <label></label> <input type="file" name="file" value="Файл оруулах"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea rows="4" cols="129"  class="span9" name="link" id="txtArea">Холбоос оруулах</textarea></td>
                            </tr>
                            <tr> 
                                <td colspan="2">​<textarea rows="4" cols="129"  class="span9" name="usemtrl" id="txtArea">Ашиглах материал оруулна уу..</textarea></td>
                            </tr>
                            
                            <tr>
                                <td> <label>Эрэмбэ </label></td>
                                <td><input class="form-control" type="text" name="sort"/></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td><button type="submit" name ="insertlessoncontent"  class="btn" > <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>">  Даалгавар оруулах </a></button></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                            <center> <input type="submit"  name ="insertlessoncontent" value="Оруулах" class="btn btn-primary"/>
                            <button type="button" class="btn"> <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherlessonInstance&Lid=<?php echo $lessoncode;?>"> Болих </a></button>
                            </center>
                            </td>
                            </tr>
                       <?php } 
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