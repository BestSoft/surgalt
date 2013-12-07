<!DOCTYPE HTML>
<?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/LessonModel.php";
?> 
<?php
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
                       // $title = $_POST['title'];
                        $desc = $_POST['desc'];
                       // $attach = $_POST['attach'];
                      //  $link = mysql_escape_string($_REQUEST['link']);
                        $usemtrl = $_POST['usemtrl'];
                        $sort = $_POST['sort'];
                        $selfpnt =  $_POST['selfpnt'];
                        $selfenddt = $_POST['selfenddt'];   
                        $lessoncode = $_GET["Lid"];
             if (is_uploaded_file($_FILES["file"]["tmp_name"]))
		{
                 $week = $_GET["wk"];
            $ltype = $_GET["ltype"];
            $lessoncode = $_GET["Lid"];
            $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $queryid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($queryid);
            $lessonID=$row["LsnID"];
            
            $getlessoncontentid= "SELECT `LsnCntID` FROM `lessoncontent` WHERE `LsnID`='$lessonID' and `Week`='$week' and `LsnTpID`='$ltype'";
            $queryconid = $db->query($getlessoncontentid);
            $rowconid = mysqli_fetch_assoc($queryconid);
            $LsnCntID=$rowconid["LsnCntID"];
			if (checkExtPic(getExt($_FILES["file"]["name"])))
			{
				$ext = getExt($_FILES["file"]["name"]);
				$filename = $lessoncode.".".$ext;
				$filepath = PATH_BASE . "/sites/".HOSTNAME."/pictures/"; 
            $sql1 = "INSERT INTO `humuunco_surgalt`.`lessontask`
            (`Lsntaskid`,`LsnCntID`,`LsnTpID`, `Desc`, `UseMtrl`, `Attachment`,`Attachname`, `Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
            VALUES ('','$LsnCntID','$lessontype', '$desc', '$usemtrl', '".$filepath."','".$filename."', '$week', '$sort', '$selfpnt', '$selfenddt', '$lessonID', NULL, NULL, NULL, NULL)";
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
            $week = $_GET["wk"];
            $ltype = $_GET["ltype"];
            $lessoncode = $_GET["Lid"];
            $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $queryid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($queryid);
            $lessonID=$row["LsnID"];
            
            $getlessoncontentid= "SELECT `LsnCntID` FROM `lessoncontent` WHERE `LsnID`='$lessonID' and `Week`='$week' and `LsnTpID`='$ltype'";
            $queryconid = $db->query($getlessoncontentid);
            $rowconid = mysqli_fetch_assoc($queryconid);
            $LsnCntID=$rowconid["LsnCntID"];
            $sql = "INSERT INTO `humuunco_surgalt`.`lessontask`
            (`Lsntaskid`,`LsnCntID`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`, `Attachname`,`Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
            VALUES ('','$LsnCntID','$lessontype', '$desc', '$usemtrl', NULL, NULL , '$week', '$sort', '$selfpnt', '$selfenddt', '$lessonID', NULL, NULL, NULL, NULL)";
            $db -> query($sql);
            echo 'Амжилттай хадгалагдлаа.( хавсаргасан файлгүй.)';
                }
            
            // LsnTpID  - bas get r avah
            // Attachment ydaj zurag upload hiideg bh
            // week - get r avah??
                    
    }
            }
            
             if (isset($_POST["edittask"]))
                {
             $db = DataBase::getInstance();       
             $updateQuery = "UPDATE `humuunco_surgalt`.`lessontask` SET `Desc` = '".$_POST["desc"]."', `UseMtrl` = '".$_POST["usemtrl"]."', `Attachment` = '',
                  `Attachname` = '',`Sort` = '".$_POST["sort"]."', `SelfPnt` = '".$_POST["selfpnt"]."', `SelfEndDt` ='".$_POST["selfenddt"]."' WHERE `lessontask`.'
                  `Lsntaskid` = 4";
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
                  
                  
                  <form method="post" action="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>" enctype="multipart/form-data">
                            
                                        
                                 
                            <table class="table-urgun " >
                                <br> <br> <br>
                               <h4> Даалгавар оруулах хуудас </h4><br>
                             <br>
                              <?php 
                       if (isset($_GET["type"]) && ($_GET["type"] == "edit")){ 
                                $querytask = LessonModel::GetLessonContentID();
                                $result = mysqli_fetch_assoc($querytask);
//
//                                $tdesc = $result["Desc"];
//                                $tuseful = $result["UseMtrl"];
//                                $tattach = $result["Attachment"];
//                                $tattachname =$result["Attachname"]; 
//                              //  $tsort = $result["Sort"];
//                                $tselfpnt = $result["SelfPnt"];
//                                $tselfend = $result["SelfEndDt"];
//                              //  $tinsid = $result["InsID"];
//                                $tinsdate = $result["InsDt"];
                              ?>  
                            <tr>
                                <td colspan="2">​<textarea rows="4" cols="129" class="span9" name="desc" id="txtArea" value="<?php echo $result["Desc"]; ?>"> Даалгаврын тайлбар оруулна уу.</textarea>
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
                                <td colspan="2">​<textarea rows="4" cols="129"  class="span9" name="usemtrl" id="txtArea" value="<?php echo $result["Usemtrl"]; ?>">Ашиглах материал оруулна уу..</textarea></td>
                            </tr>
                            
                            <tr>
                                <td> <label>Эрэмбэ </label></td>
                                <td><input class="form-control" type="text" name="sort" value="<?php echo $result["Sort"]; ?>"/></td>
                            </tr>
                            <tr>
                                <td> <label>Даалгаврын оноо</label></td>
                                <td><input class="form-control" type="text" name="selfpnt" value="<?php echo $result["SelfPnt"]; ?>"/></td>
                            </tr>
                            <tr> 
                                <td><label>Даалгаврын дуусах хугацаа</label> </td>
                                <td><input class="form-control" type="text" name="selfenddt" value="<?php echo $result["SelfEndDt"]; ?>"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                            <center> <input type="submit"  name ="edittask" value="Хадгалах" class="btn btn-primary"/>
                            <button type="button" class="btn"> <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>"> Болих </a></button>
                            </center>
                            </td>
                            </tr>
                       <?php }
                       else {?>
                             <tr>
                                <td colspan="2">​<textarea rows="4" cols="129" class="span9" name="desc" id="txtArea"> Даалгаврын тайлбар оруулна уу.</textarea>
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
                                <td> <label>Даалгаврын оноо</label></td>
                                <td><input class="form-control" type="text" name="selfpnt"/></td>
                            </tr>
                            <tr> 
                                <td><label>Даалгаврын дуусах хугацаа</label> </td>
                                <td><input class="form-control" type="text" name="selfenddt"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                            <center> <input type="submit"  name ="insertlessoncontent" value="Оруулах" class="btn btn-primary"/>
                            <button type="button" class="btn"> <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=<?php echo $lessoncode;?>&wk=<?php echo $week;?>&ltype=<?php echo $lessontype;?>"> Болих </a></button>
                            </center>
                            </td>
                            </tr>
                            
                       <?php }?>

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