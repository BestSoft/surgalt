<?php
/*
 * hereglegchin hicheliig haruulah, 
 * tuhain hicheelin todorhoilolt,
 */
    Class LessonController
{
        public static function DrawContenttopic()   
            {
            $user = User::getInstance();
            $usrId = $user->getUsrID();
            $query = LessonModel::getLessonlist($usrId);
            if(mysqli_num_rows($query) > 0)
            {
            while($result = mysqli_fetch_assoc($query))
            {
            echo $result["LsnCd"] . "<br>";
            }

            }
            else
            {
            echo 'hichelgui bn';
            }
            }
    public static function DrawLessonContentTopic()   
            {
//            $user = User::getInstance();
//            $usrId = $user->getUsrID();
            $query = LessonModel::getLessonContentTopic();
           if(mysqli_num_rows($query) > 0)
           {
            while($result = mysqli_fetch_assoc($query))
            {
             $a = $result["TpcNm"];
             $b = $result["TpcContent"];
             $c = $result["TpcUseful"];
             ?>
            <tr>
                <td> </td>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
                <td><?php echo $c; ?></td>
                <td>
                  <center>  <button class="btn btn-primary" type="button">  Засах </button>
                            <button class="btn btn-danger" type="button"> Устгах </button>
                  </center>
                </td>
            </tr>


            <?php
            }
          }
            else
           {
                echo 'Hichelin sedviin garchigiig oruulagui bn';
            }
          }
      
   public static function DrawLessonDefinitionForm()   
            {
        $lessoncode = $_GET["Lid"];
           $query = LessonModel::getLessondefinition();
           $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $querylid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($querylid);
            $lsnid=$row["LsnID"];
            
           $sql = "SELECT * FROM `lessondefscore` where `LsnID`='$lsnid'";
           $q_score = $db->query($sql);
           $score=mysqli_fetch_assoc($q_score);
           
           
            
           if(mysqli_num_rows($query) > 0)
           {
         ?>     
            <table class="table table-hover table-bordered">
                <tr class="warning" >
                <td> Тайлбар </td>
                <td> Утга</td>
                </tr>
         <?php
            while($result = mysqli_fetch_assoc($query))
            {
             $a = $result["FldNm"];
             $b = $result["FldVal"];
             ?>
               <tr>
                   <?php if ($a=='Мэдлэгийн үнэлгээ'){ 
                       
                       
                       $attend=$score["Attendance"];
                       $exam=$score["Exam"];
                       $self=$score["Selfstudy"];
                       $lab=$score["Lab"];
                       $sem=$score["Seminar"];
                       $add=$score["Additional"];?>
             
                <td><?php echo $a; ?></td>
                <td><?php 
                        echo 'Ирц/идэвхи'.':'.$attend.'<br>';
                        echo 'Шалгалт'.':'.$exam.'<br>';
                        echo 'Бие даалт'.':'.$self.'<br>';
                        echo 'Лабортори'.':'.$lab.'<br>';
                        echo 'Семинар'.':'.$sem.'<br>';
                        echo 'Нэмэлт'.':'.$add;
                        ?></td>
            <?php } 
             else { ?>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
             <?php } ?>
               </tr>
            <?php
//                      }
//            }
           }
           ?>
                                         <tr><td>
                                            <a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessondefInsert&Lid=<?php echo $lessoncode;?>&type=edit">Засах</a>
                                            || <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherLdefinition&Lid=<?php echo $lessoncode;?>&type=del">Устгах</a>
                                        <td></tr>
            <?php
           }
            else
           {
                 if($_GET["Lid"])
            {
            $lesson = $_GET["Lid"];
            echo 'Хичээлийн тодорхойлолт оруулаагүй байна. ';
            $user = User::getInstance();
            $user_perm = $user->getUsrTpID();
            if($user_perm == 3)
            {       
            echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessondefInsert&Lid=$lesson' > Тодорхойлолт оруулах</a>";
            }
            }
            else {
                echo'Хичээлийн код орж ирээгүй байна.';
            }
                
            }
          }
       
 // Тухайн хичээлийг судалж буй оюутнуудыг харуулах функц            
   public static function GetlessonStudents()   
            {
//            $user = User::getInstance();
//            $usrId = $user->getUsrID();
           
           $query = LessonModel::getLessonStudents();
           if(mysqli_num_rows($query) > 0)
           {
         ?>     
            <table class="table table-hover table-bordered">
                <tr class="warning" >
                <td> Тайлбар </td>
                <td> Утга</td>
                </tr>
         <?php
            while($result = mysqli_fetch_assoc($query))
            {
            //echo $result["LsnCd"] . "<br>";
             $a = $result["FldNm"];
             $b = $result["FldVal"];
             ?>
             
               <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
               </tr>
            <?php
//                      }
//            }
           }
           ?>
           <tr>

                    <td></td>
                    <td>
                    <a href='?host=lesson.surgalt.info&type=edit'>Засах</a>
                    <input class="btn btn-primary" name="addtopic" value="Устгах" type="submit">
                    </td>
                    </tr>
                    </table>
            <?php
           }
            else
           {
                 if($_GET["Lid"])
            {
            $lesson = $_GET["Lid"];
            echo 'Хичээлийн тодорхойлолт оруулаагүй байна. ';
            echo $lesson;
                //require 'lessondefInsert.php';
                echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessondefInsert&Lid=$lesson' > Тодорхойлолт оруулах</a>";
            }
            else {
                echo'Хичээлийн код орж ирээгүй байна.';
            }
                
            }
          }
          public static function DrawLessonDef_EditForm()   
            {
           $query = LessonModel::getLessondefinition();
           if(mysqli_num_rows($query) > 0)
           {
            while($result = mysqli_fetch_assoc($query))
            {
             $a = $result["FldNm"];
             $b = $result["FldVal"];
             ?>
            <tr>
                <td> <?php echo $a ?></td>
                <td> <input type="textarea" name="b" id="textfield2" value="<?php echo $b ?>" /></td>
            </tr>
            <?php
            }
          }
            else
           {
                echo 'Хичээлийн тодорхойлолт оруулаагүй байна.';
            }
          }
          
          
           public static function DrawLessonContent()   
            {
//            $user = User::getInstance();
//            $usrId = $user->getUsrID();
           $query = LessonModel::getLessonContent();
           if(mysqli_num_rows($query) > 0)
           {
            while($result = mysqli_fetch_assoc($query))
            {
             $title = $result["Title"];
             $desc = $result["Desc"];
             $use = $result["UseMtrl"];
             $attach = $result["Attachment"];
             $endDate = $result["SelfEndDt"];
             ?>
            <tr>
                <td> </td>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
                <td>
                  <center>  <button class="btn btn-primary" type="button">  Засах </button>
                            <button class="btn btn-danger" type="button"> Устгах </button>
                  </center>
                </td>
            </tr>
            <?php
            }
          }
            else
           {
                echo 'Хичээлийн тодорхойлолт оруулаагүй байна.';
            }
          }
    
     
           public static function DrawLessonContentforteacher()   
            {
//            $user = User::getInstance();
//            $usrId = $user->getUsrID();
           
           $query = LessonModel::getLessondefinition();
           if(mysqli_num_rows($query) > 0)
           {
         ?>     
            <table class="table table-hover table-bordered">
                <tr class="warning" >
                <td> Тайлбар </td>
                <td> Утга</td>
                </tr>
         <?php
            while($result = mysqli_fetch_assoc($query))
            {
            //echo $result["LsnCd"] . "<br>";
             $a = $result["FldNm"];
             $b = $result["FldVal"];
             ?>
             
               <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
               </tr>
            <?php
//                      }
//            }
           }
           ?>

            <?php
           }
            else
           {
                 if($_GET["Lid"])
            {
            $lesson = $_GET["Lid"];
            echo 'Хичээлийн тодорхойлолт оруулаагүй байна. ';
            echo $lesson;
                //require 'lessondefInsert.php';
                echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessondefInsert&Lid=$lesson' > Тодорхойлолт оруулах</a>";
            }
            else {
                echo'Хичээлийн код орж ирээгүй байна.';
            }
                
            }
          }
          
}
    
    
?>
