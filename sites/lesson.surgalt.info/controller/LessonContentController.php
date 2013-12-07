<?php
/*
 * Hicheelin aguulga tai holbootoi functions, insert, update , delet select
 * 
 */

class LessonContentController {

    public static function getcon() {
        $db = DataBase::getInstance();

        $sql = "INSERT INTO `humuunco_surgalt`.`lessoncontent` (`LsnCntID`, `Title`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`, `Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
            VALUES ('101', 'Amjilt', '2', 'DESCRIPTION', 'MATERIAL', NULL, '2', '1', NULL, NULL, '2', NULL, NULL, NULL, NULL)";
        $db->query($sql);
        $query = $db->query($sql);
    }

    public static function DrawLessonContent() {
        $query = LessonModel::GetLessonContent();
        $user = User::getInstance();
        $user_perm = $user->getUsrTpID();
        $lesson = $_GET["Lid"];
        $lessoncode = $_GET["Lid"];
        $week = $_GET["wk"];
        $lessontype = $_GET["ltype"];
        $wk = $_GET["wk"];
        $ltype = $_GET["ltype"];
        if (mysqli_num_rows($query) > 0) {
            ?>     
            <?php
            $result = mysqli_fetch_assoc($query);
            $title = $result["Title"];
            $desc = $result["Desc"];
            $useful = $result["UseMtrl"];
            $attach = $result["Attachment"];
            $attachname = $result["Attachname"];
            $sort = $result["Sort"];
            $selfpnt = $result["SelfPnt"];
            $selfend = $result["SelfEndDt"];
            $insid = $result["InsID"];
            $insdate = $result["InsDt"];
            echo '<h4>' . 'Хичээл' . $sort . ' : ';
            echo $title . '<br></h4>';
            ?>

            <br>
            <ul class="nav nav-tabs" id="mysubtab">
                <li class="active"><a href="#generalcontent" data-toggle="tab">Хичээлийн агуулга</a></li>
                <li><a href="#pdf" data-toggle="tab">PDF файл</a></li>
                <li><a href="#video" data-toggle="tab">Бичлэг</a></li>
                <li><a href="#useful" data-toggle="tab">Ашиглагдах материал</a></li>
                <li><a href="#homework" data-toggle="tab">Даалгавар</a></li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="generalcontent">
                    <br><br><br>

                    <table class="table table-condensed" border="1" width="800" align="center">
                        <tr><td><?php echo $insdate; ?></td></tr>
                        <tr class="warning"><td height="200"><?php echo $desc; ?></td></tr>
                        <tr><td></td></tr>
                    </table>
                    <?php
                    if ($user_perm == 3) {
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Хичээлийн агуулгыг засах</a>";
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=del' ><br><br> Хичээлийн агуулгыг устгах</a>";
                    }
                    ?>
                </div>
                <div class="tab-pane" id="pdf"> <?php //include 'studentgroup.php';    ?>
                    <br><br><br>

                    <table  class="table table-condensed" border="1" width="800" align="center">
                        <tr><td><?php echo $insdate; ?></td></tr>
                        <tr class="success"><td height="200">
                            <!--<img src="PATH_BASE . '/sites/'.HOSTNAME.'/pictures/CS200.jpg'"/>-->
                                <!--<img src="<?php echo BASE_URL . '/sites/' . HOSTNAME . '/pictures/' . $result['Attachname']; ?>" width='600' height='400'/>-->
                                <iframe src="<?php echo BASE_URL . '/sites/' . HOSTNAME . '/pictures/' . $result['Attachname']; ?>" width='830' height='200'></iframe>

                            </td></tr>
                        <tr><td></td></tr>
                    </table>
                    <!--                     <div class="carousel-inner">
                                                  <div class="active item">      
                                                    <div align="center"> <img src="PATH_BASE . '/sites/'.HOSTNAME.'/pictures/CS200.jpg'"/> </div>
                                                  </div>
                                                  <div class="item"><img src="<?php echo $result["Attachment"] . $result["Attachname"]; ?> "/>…    </div>
                                        </div>-->
                    <?php
                    if ($user_perm == 3) {
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Хичээлийн агуулгыг засах</a>";
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=del' ><br><br> Хичээлийн агуулгыг устгах</a>";
                    }
                    ?>
                </div> 
                <div class="tab-pane" id="video"> <?php //include 'studentgroup.php';    ?>
                    <br><br><br>

                    <table class="table table-condensed" border="1" width="800" align="center">
                        <tr><td><?php echo $insdate; ?></td></tr>
                        <tr class="danger"><td height="200"><?php echo 'URL р нь дуудна'; ?></td></tr>
                        <tr><td></td></tr>
                    </table>
                    <?php
                    if ($user_perm == 3) {
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Хичээлийн агуулгыг засах</a>";
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=del' ><br><br> Хичээлийн агуулгыг устгах</a>";
                    }
                    ?>
                </div> 
                <div class="tab-pane" id="useful"> <?php //include 'studentgroup.php';     ?>
                    <br><br><br>

                    <table class="table table-condensed" border="1" width="800" align="center">
                        <tr><td><?php echo $insdate; ?></td></tr>
                        <tr class="active"><td height="200"><?php echo $useful; ?></td></tr>
                        <tr><td></td></tr>
                    </table> <?php
                    if ($user_perm == 3) {
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Хичээлийн агуулгыг засах</a>";
                        echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=del' ><br><br> Хичээлийн агуулгыг устгах</a>";
                    }
                    ?>

                </div> 
                <?php
                $querytask = LessonModel::GetLessonContentID();
                if (mysqli_num_rows($querytask) > 0) {

                    $result = mysqli_fetch_assoc($querytask);

                    $tdesc = $result["Desc"];
                    $tuseful = $result["UseMtrl"];
                    $tattach = $result["Attachment"];
                    $tattachname = $result["Attachname"];
                    //  $tsort = $result["Sort"];
                    $tselfpnt = $result["SelfPnt"];
                    $tselfend = $result["SelfEndDt"];
                    //  $tinsid = $result["InsID"];
                    $tinsdate = $result["InsDt"];
                    ?>
                    <div class="tab-pane" id="homework"> <?php //include 'studentgroup.php';    ?>
                        <br>

                        <table class="table table-condensed" border="1" width="800" align="center">
                            <tr><td><?php echo $tinsdate; ?></td> </tr>
                            <tr><td height="200"><?php echo $tdesc; ?></td></tr>
                            <tr><td > <iframe src="<?php echo BASE_URL . '/sites/' . HOSTNAME . '/pictures/' . $result['Attachname']; ?>" width='830' height='200'></iframe></td></tr>
                            <tr><td height="50"><?php echo $tuseful; ?></td></tr>
                            <tr><td><?php echo 'Даалгаврын оноо : ' . $tselfpnt; ?></td></tr>
                            <tr><td><?php echo 'Даалгаврын дуусах хугацаа : ' . $tselfend; ?></td></tr>


                        </table>
                        <?php
                        if ($user_perm == 3) {

                            echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Даалгаврын агуулгыг засах</a>";
                            echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=$lesson&wk=$wk&ltype=$ltype&type=del' ><br><br> Даалгаврын агуулгыг устгах</a>";
                        } else {
                            ?>

                            <table class="table table-condensed" border="1" width="800" align="center">
                                <tr><td> <textarea rows="4" cols="129" class="span9" name="desctask" id="txtArea" value="<?php echo $result["Desc"]; ?>" >Тайлбар оруулна уу.</textarea></td></tr>
                                <tr>  <td> <label>Файл хавсаргах</label>:<input type="file" name="file" value="<?php echo $result["Attachment"]; ?>"/></td></tr>
                                <tr>

                                    <td><button type="submit" name ="inserttask"  class="btn" > <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=<?php echo $lessoncode; ?>&wk=<?php echo $week; ?>&ltype=<?php echo $lessontype; ?>">  Даалгавар оруулах </a></button></td>
                                </tr>
                            </table>
                            <?php
                            echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype&type=edit' ><br><br> Даалгавар илгээх</a>";
                        }
                        ?>

                    </div>
                <?php } else {
                    ?>
                    <div class="tab-pane" id="homework"> <?php //include 'studentgroup.php';    ?>
                        <br><br><br>

                        <table class="table table-condensed" border="0" width="800" align="center">
                            <tr><td>Даалгавар оруулагүй байна.</td> </tr>
                            <tr><td> <button type="submit" name ="insertlessoncontent"  class="btn" > <a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertHomework&Lid=<?php echo $lessoncode; ?>&wk=<?php echo $week; ?>&ltype=<?php echo $lessontype; ?>">  Даалгавар оруулах </a></button></td></tr>
                        </table>

                    </div>    
                <?php } ?>


            </div>
            <script>
                $(function() {
                    $('#mysubtab a:last').tab('show');
                    $('#mysubtab a:first').tab('show');
                })
            </script>
            <?php
        } else {
            echo 'Хичээлийн агуулга оруулаагүй байна. ';
            if ($user_perm == 3) {
                echo "<a href='/surgalt/index.php?host=lesson.surgalt.info&view=teacherInsertLcontent&Lid=$lesson&wk=$wk&ltype=$ltype' ><br><br> Хичээлийн агуулгыг оруулах</a>";
            }
        }
    }

    public static function DrawLessonInstanceMenu() {
        echo "<div class='Menu_tree_form'>";
        $user = User::getInstance();
        $user_perm = $user->getUsrTpID();



        // Хэрэглэгчийн төрөл шалгах
        // 3 = Багш
        // 4 = Оюутан
        // 1 = Админ

        if ($user_perm == 3) {
            $user_id = $user->getUsrID();
            $query = LessonContentModel::GetTeacherLesson($user_id);
            $view = 'teacherlessoncontent';
        } else {
            if ($user_perm == 1) {
                $user_id = $user->getUsrID();
                $query = LessonContentModel::GetUserLesson_name($user_id);
                $view = 'teacherlessoncontent';
            }
            if ($user_perm == 4) {
                $user_id = $user->getUsrID();
                $query = LessonContentModel::GetUserLesson_name($user_id);
                $view = 'showlessoncontent';
            } else {
                echo "Хичээл хэсэгт нэвтрэх эрхгүй байна.";
            }
        }
        echo "<div>";


        $result = mysqli_fetch_assoc($query);

        $i = 1;
        while ($i < 17) {
            $a = $result["LsnCd"];
            // 1 - Лаб
            // 2 - Лекц
            // 3 - Семинар
            // 4 - Бие даалт
            echo "<div class='neg_2'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessonInstance&Lid=$a'>";
            echo $i . '-р долоо хоног';
            echo "</a><i class='glyphicon glyphicon-chevron-right'></i>";

            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=2'>";
            echo 'Лекц';
            echo "</a></div>";

            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=3'>";
            echo 'Семинар';
            echo "</a></div>";

            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=1'>";
            echo 'Лабортори';
            echo "</a></div>";
            echo "</div>";
            $i++;
        }


        echo "</div>";
        echo "</div>";
    }

}
?>
