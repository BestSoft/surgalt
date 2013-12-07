<!DOCTYPE HTML>
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
            
               if (isset($_POST["ins_generalLdef"]))
                {
                    $i = 1;
                    while($i<12){
            $insDefQuery = "INSERT INTO `humuunco_surgalt`.`lessondefinition` (`LsnID`, `FldID`, `FldVal`, `InsID`, `InsDt`, `UpdID`, `UpdDt`)
            VALUES ('$lessonID', '$i', '$_POST[$i]', '1', '2013-11-19 00:00:00', '1', '2013-11-19 00:00:00');";
            $queryid = $db->query($insDefQuery);
                          $i++;  }
            $insscore = "INSERT INTO `humuunco_surgalt`.`lessondefscore` (`defscoreID`, `LsnID`, `Attendance`, `Exam`, `Selfstudy`, `Lab`, `Seminar`, `Additional`)
            VALUES ('', '$lessonID', '".$_POST["attendance"]."', '".$_POST["exam"]."', '".$_POST["self"]."', '".$_POST["lab"]."', '".$_POST["sem"]."', '".$_POST["additional"]."');";
            $queryid = $db->query($insscore);
            echo 'Амжилттай хадгалагдлаа';
                }
             
            
            
                

          if (isset($_POST["editbutton"]))
                {
                    $i = 1;
                    while($i<10){
            $insDefQuery = "UPDATE `humuunco_surgalt`.`lessondefinition` 
            SET `FldVal` = '$_POST[$i]' WHERE `lessondefinition`.`LsnID` = '$lessonID'  
            AND `lessondefinition`.`FldID` = $i;";
            $queryid = $db->query($insDefQuery);
                          $i++;  }
            

            echo 'Амжилттай хадгалагдлаа';
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
                <h1><?php echo $lessoncode;?> <small>- хичээлийн тодорхойлолт оруулах</small></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                  <!--Тухайн нэг хичээлийн тодорхойлолт оруулах хуудас-->
                  
                <form id="form1" name="form1" method="post" action="/surgalt/index.php?host=lesson.surgalt.info&view=lessondefInsert&Lid=<?php echo $lessoncode;?>" enctype="multipart/form-data">

                        <table class="table-urgun" border="0">
                    <?php  if (isset($_GET["type"]) && ($_GET["type"] == "edit")){ 
                        
                        $query = LessonModel::getLessondefinition();
                         while($result = mysqli_fetch_assoc($query))
                                  {
                         $a = $result["FldNm"];
                        ?>
                            
                             <tr>
                                  <td width="300"> <label> <?php echo $a;?></label> </td> <?php }
                        $i = 1;
                        while($i<13){
                        $sql = "SELECT * FROM `lessondefinition` WHERE `LsnID`='$lessonID' and `FldID`='$i'";
                        $queryedit = $db->query($sql);
                        $row = mysqli_fetch_assoc($queryedit);
                        ?>
                                <td> <input height='100' width='300' type="text" name='<?php echo $i;?>' placeholder="" value="<?php echo $row["FldVal"]; ?>">
                                </td>                                   
                            </tr>
                                <?php 
                                  $i++; }
                             ?> 
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                <center> <button type="submit"  name ="editbutton" class="btn btn-primary"> Хадгалах</button>
                                    <button type="button" class="btn"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherLdefinition&Lid=<?php echo $lessoncode;?>"> Болих</a></button>
                                </center>
                            </td>
                            </tr>
                            
                    <?php
                  } else { ?>     
                        <tr>
                                <td width="300"> <label> Өмнөх холбоо</label> </td>
                                <td> <input type="text" name="1" placeholder=""><input type="button" value="+" />
                                </td>                                   
                            </tr>
                            <tr>
                                <td width="300"> <label> Хамтрах холбоо</label> </td>
                                <td> <input type="text" name="2" placeholder=""><input type="button" value="+" />
                            </td>
                            </tr>
                            <tr>
                                <td><label> Хичээлийг үзэх мэргэжлийн чиглэл<br></label></td>
                                <td> <select name="3">
                                  <option value="Програм хангамж">Програм хангамж</option>
                                  <option value="Мэдээллийн систем">Мэдээллийн систем</option>
                                  <option value="Техник хангамж"> Техник хангамж</option>
                                  <option value="Систем хамгаалал">Систем хамгаалал</option>
                                  <option value="Ком.н удирдлагатай систем">Ком.н удирдлагатай систем</option>
                                  <option value="Санхүү бүртгэл"> Санхүү бүртгэл</option>
                                  <option value="Хүний нөөц"> Хүний нөөц</option>
                                  <option value="Төрийн захиргаа">Төрийн захиргаа</option>
                                </td> 
                                </select>
                            </tr>
                            <tr>
                                <td><label> Хичээлийн ангилал</label><br></td>
                                <td>
                                <select name="4">
                                  <option value="Мэргэжлийн /заавал үзэх/">Мэргэжлийн /заавал үзэх/</option>
                                  <option value="Нийгмийн ухаан /сонгон суралцах/"> Нийгмийн ухаан /сонгон суралцах/</option>
                                  <option value="Байгалийн ухаан /сонгон суралцах/"> Байгалийн ухаан /сонгон суралцах/</option>
                                </select>
</td>
                            </tr>
                            <tr>
                                <td><label> Хичээлийг кредит</td>
                               <td> <select name="5">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select><br></label></td>
                          
                            </tr>
                            <tr>
                                <td><label> Долоо хоногт орох цаг</label></td>
                                <td> <input type="text" name="6" placeholder="Лекц:Семинар:Лаб:Б/даалт"><br>
<!--                                     <input type="text" name="6" placeholder="Семинар">
                                </td>
                                <td>
                                     <input type="text" name="6" placeholder="Лабортори"><br>
                                     <input type="text" name="6" placeholder="Бие даалт"><br>-->
                                </td>
                            </tr>
                            <tr>
                                <td><label> Хичээлийн вэб хуудас</label></td>
                                <td colspan="2"> <input type="text" name="7" placeholder="" style="width:450px;"><input type="button" value="+" /> </td>
                            </tr>
                            <tr>
                                <td colspan="3">​<textarea rows="4" cols="119" class="span9" name="8" id="txtArea">Хичээлийн товч тодорхойлолт оруулна уу.</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">​<textarea rows="4" cols="119" class="span9" name="9" id="txtArea"> Сурах бичиг</textarea></td>
                            </tr>
                            
                            <tr> 
                                <td colspan="3">​<textarea  rows="4" cols="119" class="span9" name="10" id="txtArea">Хичээлийн зорилго гарах үр дүн..</textarea></td>
                            </tr>
                            <tr>
                                <td> <label> Нэмэлт материал </label></td>
                                <td colspan="2"> <textarea  rows="3" cols="69" class="span9" name="10" id="txtArea"></textarea> </td>
                            </tr>
                            <tr>
                                <td><label> Мэдлэгийн үнэлгээ</label></td>
                                <td> <input type="text" name="attendance" placeholder="Ирц"><br>
                                     <input type="text" name="lab" placeholder="Лабортори"><br>
                                     <input type="text" name="sem" placeholder="Семинар">
                                </td>
                                <td>
                                     <input type="text" name="self" placeholder="Бие даалт"><br>
                                     <input type="text" name="exam" placeholder="Сорил"><br>
                                     <input type="text" name="additional" placeholder="Нэмэлт тайлбар">
                                </td>
                            </tr>
                           <tr>
                                <td></td>
                                <td></td>
                                <td>
                                <center> <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherLdefinition&Lid=<?php echo $lessoncode;?>&type=edit"> <button type="submit"  name ="ins_generalLdef" class="btn btn-primary"> Оруулах</button></a>
                                    <button type="button" class="btn"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherLdefinition&Lid=<?php echo $lessoncode;?>"> Болих</a></button>
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