<?php



class Journal
{
    static private $instance;
    static private $user_id;
    
    function __construct() 
    {
        $user = User::getInstance();
        Journal::$user_id = $user->getUsrID();
    }
    public static function DrawStudentJournal_min($lesson,$type,$isav)
                {
        $Journal_zurah = array();
        $niit_bichleg = 0;
        $query = Lesson::GetStudent_grade_min($lesson,$type,$isav);
        while($result = mysqli_fetch_assoc($query))
                {
                    $Journal_zurah[] = $result;
                    $niit_bichleg++;
                }
        if($niit_bichleg > 0)
            {                       
                        ?>
                        <h3 class='Garchig'> <?php echo $Journal_zurah[0]["LsnNm"]."-ийн ".$Journal_zurah[0]["LsnNm_delger"]."-н дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Одоо суралцаж буй хичээлүүд > </a>
                            <a href='#'><?php  
                                echo $Journal_zurah[0]["LsnCd"]." >";
                            ?></a>
                            <a href='#'><?php 
                                echo $Journal_zurah[0]["LsnNm_delger"];?>
                            </a>
                        </div>
                    <table class="table table-bordered">                        
                        <tr class="Table_header">
                            <td>Д/Д</td>
                            <td>7 хоног</td>
                            <td>Сэдэв</td>
                            <td>Төрөл</td>
                            <td>Авах оноо</td>
                            <td>Оноо</td>
                        </tr>
                        <?php 
                        $i = 0;
                   while($niit_bichleg > $i)
                        {
                        ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                                            <td>
                                                <?php echo $Journal_zurah[$i]["Week"]."-р долоо хоног"; ?>
                                            </td>          
                            <td><?php echo $Journal_zurah[$i]["Title"]; ?></td>
                            <?php 
                                if($i == 0)
                                    {?>
                                    <td class="bosoo_mid" rowspan="<?php echo $niit_bichleg; ?>"><?php echo $Journal_zurah[$i]["LsnNm_delger"]; ?></td><?php
                                    }?>
                            
                            <td class='Avj_boloh_onoo'><?php echo $Journal_zurah[$i]["SelfPnt"]; ?></td>
                            <td class='Uuriin_onoo'><?php echo $Journal_zurah[$i]["Pnt"]; ?></td>
                        </tr>
                        <?php
                        $i++;
                        }            
                        ?>    
                        <tr>
                            <td colspan='4'>
                                Нийт оноо :
                            </td>
                            <td class='total_avj_boloh'>
                                
                            </td>
                            <td class='total_uurin_onoo'>
                                
                            </td>
                        </tr>
                    </table>
                        <?php
            }
            else
                {
                    echo "<div class='container'><h4>Одоогоор энэхүү хичээл дээр дүн тавигдаагүй байна</h4></div>";
                }
                }
     public static function DrawStudentJournal_irts($lsnid)
             {
                $query = Lesson::GetStudentLesson_irts($lsnid);
                $array_irts = array();
                $niit_bichleg = 0;
                while($result = mysqli_fetch_assoc($query))
                    {
                        $array_irts[] = $result;
                        $niit_bichleg++;
                    }
                    if($niit_bichleg > 0)
                        {
                        ?>
                        <h3 class='Garchig'> <?php echo $array_irts[0]["LsnNm"]."-ийн ирцийн дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#"> > Одоо суралцаж буй хичээлүүд </a>
                            <a href='#'><?php  
                                echo " > ".$array_irts[0]["LsnCd"];
                            ?></a>
                            <a href="#"> > Ирц </a>
                        </div>
                        <table class="table table-bordered">
                            <?php 
                        echo "<tr>
                                <td>Д/д</td>
                                <td>7 хоног</td>
                                <td>Төрөл</td>
                                <td>Сэдэв</td>
                                <td>Дүн</td>
                                <td>Багшийн код</td>
                                <td>Багшийн нэр</td>
                              </tr>";
                        $j = 0;
                        while($niit_bichleg > $j)
                            {
                        echo "<tr>";
                                echo "<td>";
                                    echo $j+1;
                                echo "</td>";
                                echo "<td>";
                                    echo $array_irts[$j]["Week"]."-р долоо хоног";
                                echo "</td>";
                                echo "<td>";
                                    echo $array_irts[$j]["LsnNm"];
                                echo "</td>";
                                echo "<td>";
                                    echo $array_irts[$j]["Title"];
                                echo "</td>";
                                echo "<td class='irtsiin_nud'>";
                                    echo Decode::checkTuluv($array_irts[$j]["AttSta"]);
                                echo "</td>";
                                echo "<td>";
                                    echo $array_irts[$j]["UsrCd"];
                                echo "</td>";
                                echo "<td>";
                                    echo $array_irts[$j]["UsrNm"];
                                echo "</td>";
                        echo "</tr>";
                                $j++;
                            }
                        echo "</table>";
                        }
                        else
                            {
                                echo "<div class='container'><h4>Одоогоор энэхүү хичээл дээр дүн тавигдаагүй байна</h4></div>";
                            }
             }
     public static function DrawStudentJournal_mid($lesson)
             {
                $query = Lesson::GetStudent_grade_mid($lesson);
                $i = 1;
                $array_my = array();
                $niit_urt = 0;
                while($result = mysqli_fetch_assoc($query))
                    {
                        $array_my[] = $result;
                        $niit_urt++;
                    }
                    if($niit_urt > 0)                    
                    {
                ?>
                <h3 class='Garchig'> <?php echo $array_my[0]["LsnNm"]."-ийн дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Одоо суралцаж буй хичээлүүд > </a>
                            <a href='#'><?php  
                                echo $array_my[0]["LsnCd"];
                            ?></a>
                        </div>
                <?php
                
                    ?>
                        <table class="table table-bordered">
                            <tr class="Table_header">
                                <td>Д/Д</td>
                                <td>7 хоног</td>
                                <td>Сэдэв</td>
                                <td>Төрөл</td>
                                <td>Авах оноо</td>
                                <td>Оноо</td>
                            </tr>
                            <?php 
                            $i = 0;
                            while($niit_urt > $i)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $i+1; ?></td>
                                            <td><?php echo $array_my[$i]["Week"]."-р долоо хоног"; ?></td>
                                            <td><?php echo $array_my[$i]["Title"]; ?></td>
                                            <td><?php echo $array_my[$i]["LsnNm_delger"]; ?></td>
                                            <td class='Avj_boloh_onoo'><?php echo $array_my[$i]["SelfPnt"]; ?></td>
                                            <td class='Uuriin_onoo'><?php echo $array_my[$i]["Pnt"]; ?></td>
                                        </tr>
                                    <?php
                                    $i++;
                                }
                            ?>
                        <tr>
                            <td colspan='4'>
                                Нийт оноо :
                            </td>
                            <td class='total_avj_boloh'>
                                
                            </td>
                            <td class='total_uurin_onoo'>
                                
                            </td>
                        </tr>
                        </table>
                    <?php                     
                    }
                    else
                        {
                            echo "<div class='container'><h4>Одоогоор энэхүү хичээл дээр дүн тавигдаагүй байна</h4></div>";
                        }
             }
     public static function DrawStudentJournal_max()
             {         
                    $query = Lesson::GetStudent_grade_max();
                    //$query_1 = Lesson::GetStudent_Grade_isa();
                    $array_hicheel_t = array();
                    $array_my = array();
                    $array_prev = array();
                    $array_hicheel = array();
                    $niit_bichleg = 0;
                    $niit_hicheel = 0;
                    while($result = mysqli_fetch_assoc($query))
                        {
                            $array_my[] = $result;
                            $niit_bichleg++;
                            if(!in_array($result["LsnID"],$array_prev))
                                {
                                    $array_hicheel[] = $result["LsnID"];
                                    $array_hicheel_t[] = $result;
                                    $niit_hicheel++;
                                }
                            $array_prev[] = $result["LsnID"];
                        }
                    $i = 0;
                    if($niit_bichleg > 0)
                        {                        
                            ?>
                <h3 class='Garchig'> <?php echo "Нийт хичээлийн дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Одоо суралцаж буй хичээлүүд</a>
                        </div>
                                <table class="table table-bordered">
                                    <tr class="Table_header">
                                        <td>Д/Д</td>
                                        <td>Хичээлийн нэр</td>
                                        <td>Хичээлийн код</td>
                                        <td>Нийт оноо</td>
                                        <td>Ордог багшийн код</td>
                                        <td>Багшийн нэр</td>
                                    </tr><?php
                                    while($niit_hicheel > $i)
                                    {
                                        $j=0;
                                        $total = 0;
                                        while($niit_bichleg > $j)
                                            {
                                                if($array_hicheel[$i] == $array_my[$j]["LsnID"])
                                                    {
                                                        $total+= $array_my[$j]["Pnt"];
                                                    }
                                                $j++;
                                            }
                                        ?>
                                    <tr>
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $array_hicheel_t[$i]["LsnNm"]; ?></td>
                                        <td><?php echo $array_hicheel_t[$i]["LsnCd"]; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $array_hicheel_t[$i]["UsrCd"]; ?></td>
                                        <td><?php echo $array_hicheel_t[$i]["UsrNm"]; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                       
                                </table>
                            <?php
                        }
                        else
                            {
                                echo "<div class='container'><h4>Одоогоор таньд үзэж буй хичээл алга байна</h4></div>";
                            }
                    
             }
       public static function DrawStudentJournal_max_prev()
               {
                        $query = Lesson::GetStudentLesson_prev_grade_max();
                        $total = 0;
                        $total_crd = 0;
                        $total_chan = 0;
                        if(mysqli_num_rows($query) > 0)
                            {
                                ?>
                        <h3 class='Garchig'> <?php echo "Нийт хичээлийн дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Өмнө судалж байсан хичээлүүд </a>
                        </div>
                                <table class="table table-bordered">
                                    <tr class="Table_header">
                                        <td class="First_cell">Хич Код</td>
                                        <td class="First_cell">Хич Нэр</td>
                                        <td class="First_cell">Кредит</td>
                                        <td class="First_cell">70 Оноо</td>
                                        <td class="First_cell">30 Оноо</td>
                                        <td class="First_cell">Нийт оноо</td>
                                        <td class="First_cell">Үсгэн үнэлгээ</td>
                                        <td class="First_cell">Чанрын оноо</td>
                                        <td class="First_cell">Улирал</td>
                                    </tr>
                                    <?php 
                                    while($result = mysqli_fetch_assoc($query))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $result["LsnCd"]; ?></td>
                                                <td><?php echo $result["LsnNm"]; ?></td>
                                                <td><?php echo $result["LsnCrd"]; ?></td>
                                                <td><?php echo $result["Point70"]; ?></td>
                                                <td><?php echo $result["Point30"]; ?></td>
                                                <td><?php echo $total = $result["Point70"] + $result["Point30"]; ?></td>
                                                <?php 
                                                    $real_dun = Decode::GetRealGrade($total);
                                                ?>
                                                <td><?php echo $real_dun["useg"];?></td>
                                                <td><?php echo $real_dun["sym"]; ?></td>
                                                <td><?php echo Decode::DecodeYear($result["LsnYear"]);?></td>
                                            </tr>
                                            <?php
                                            $total_chan = $total_chan + $result["LsnCrd"] * $real_dun["number"];
                                            $total_crd = $total_crd + $result["LsnCrd"];
                                        }
                                    ?>
                                            <tr class="Table_footer">
                                                <td></td>
                                                <td>Нийт Кредит:</td>
                                                <td class="Average_journal"><?php echo $total_crd; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Үнэлгээний голч:</td>
                                                <td class="Average_journal"><?php echo substr($total_chan/$total_crd,0,4); ?></td>
                                                <td></td>
                                            </tr>
                                </table>
                                    <?php
                            }
                            else
                                {
                                    echo "<div class='container'><h4>Одоогоор таньд үзэж буй хичээл алга байна</h4></div>";
                                }
               } 
               
               public static function DrawStudentJournal_mid_prev($year)
                       {                            
                            $year_id = $year;
                            $query = Lesson::GetStudentLesson_prev_grade_mid($year_id);
                            $total = 0;
                            $total_crd = 0;
                            $total_chan = 0;
                            if(mysqli_num_rows($query) > 0)
                                {
                                    ?>
                        <h3 class='Garchig'> <?php echo Decode::DecodeYear($_GET["year"])."-ийн жилийн дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Өмнө судалж байсан хичээлүүд </a>
                            <a href="#">> <?php echo Decode::DecodeYear($_GET["year"]); ?></a>
                        </div>
                                        <table class="table table-bordered">
                                            <tr class="Table_header">
                                                <td class="First_cell">Хичээлийн Код</td>
                                                <td class="First_cell">Хичээлийн Нэр</td>
                                                <td class="First_cell">Кредит</td>
                                                <td class="First_cell">70 Оноо</td>
                                                <td class="First_cell">30 Оноо</td>
                                                <td class="First_cell">Нийт оноо</td>
                                                <td class="First_cell">Үсгэн үнэлгээ</td>
                                                <td class="First_cell">Чанрын оноо</td>
                                            </tr>
                                        <?php 
                                            while($result = mysqli_fetch_assoc($query))
                                                {                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $result["LsnCd"]; ?></td>
                                                <td><?php echo $result["LsnNm"]; ?></td>
                                                <td><?php echo $result["LsnCrd"]; ?></td>
                                                <td><?php echo $result["Point70"]; ?></td>
                                                <td><?php echo $result["Point30"]; ?></td>
                                                <td><?php echo $total = $result["Point70"] + $result["Point30"]; ?></td>
                                                <td><?php $dun = Decode::GetRealGrade($total);
                                                            echo $dun["useg"];
                                                ?></td>
                                                <td><?php echo $dun["sym"]; ?></td>
                                            </tr>
                                        <?php 
                                        $total_crd+=$result["LsnCrd"];
                                        $total_chan+=$result["LsnCrd"] * $dun["number"];
                                                }
                                        ?>
                                            <tr>
                                                <td></td>
                                                <td>Нийт кредит</td>
                                                <td><?php echo $total_crd; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Үнэлгээний Голч:</td>
                                                <td><?php echo $gpa_year = $total_chan/$total_crd; ?></td>
                                            </tr>
                                        </table>
                                    <?php 
                                }
                                else
                                    {
                                        echo "<div class='container'><h4>Одоогоор таньд үзэж буй хичээл алга байна</h4></div>";
                                    }
                       }
          Public static function DrawTeacherJournal_now_min_1($lesson,$type,$lsntm)
                  {
                                $lesson_id = $lesson;
                                $type_id = $type;
                                $lsntm_id = $lsntm;
                                $query = Lesson::GetTeacherLesson_now_grade_min_1($lesson_id, $type_id, $lsntm_id);
                                $i = 1;
                                $prev = array();
                                $prev_week = array();
                                $prev_LsnNm = array();
                                if(mysqli_num_rows($query) > 0)
                                    {
                                    ?>
                                    <div class="global_1 span2 ehlel">
                                            <table class="table table-bordered table_1">
                                                <tr class="global_row_1">
                                                    <td>Д</td>
                                                    <td>Оюутны код</td>
                                                </tr>
                                                                    <?php
                                        while($result = mysqli_fetch_assoc($query))
                                            {
                                                 if(!in_array($result["UsrCd"], $prev))
                                                     {
                                                 ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                            <?php 
                                                                echo $result["UsrCd"]; 
                                                                $next_usrcd[] = $result["UsrCd"];
                                                                $next_usrid[] = $result["StdID"];
                                                                $next_usrname[] = $result["UsrNm"];
                                                            ?></td>
                                                        </tr>
                                                 <?php
                                                     }
                                                     if(!in_array($result["Week"],$prev_week))
                                                         {
                                                            $title_journal[] = $result["LsnNm"].$result["Week"];
                                                            $week_journal[] = $result["Week"];
                                                            $next_cntID[] = $result["LsnCntID"];
                                                         }
                                                 $prev_week[] = $result["Week"] ;
                                                 $prev[] = $result["UsrCd"];
                                                 $prev_LsnNm[] = $result["LsnNm"];
                                                 $i++;
                                                 $myarray[] = $result;
                                            }
                                            ?>
                                            </table>
                                      </div>
                                      <div class="span7 zoodog ehlel">
                                          <table class="table table-bordered table_2">
                                              <tr class='zoodog_row_1'>
                                                  <?php 
                                                  $i = 0;
                                                  echo "<td> Оюутны нэр </td>";
                                                    while(sizeof($title_journal) > $i)
                                                        {
                                                        echo "<td>";
                                                            echo $title_journal[$i];
                                                        echo "</td>";
                                                            $i++;
                                                        }
                                                  ?>
                                              </tr>
                                              <?php
                                              $j = 0;
                                                  while(sizeof($next_usrcd) > $j)
                                                  {
                                                          echo "<tr>";
                                                          $k = 0;
                                                              echo "<td>";
                                                                echo $next_usrname[$j];
                                                              echo "</td>";
                                                            while(sizeof($week_journal) > $k)
                                                                {
                                                                    echo "<td>";
                                                                    $s = 0;
                                                                        while(sizeof($myarray) > $s)
                                                                            {
                                                                                if($myarray[$s]["Week"] == $week_journal[$k])
                                                                                    {
                                                                                        if($myarray[$s]["UsrCd"] == $next_usrcd[$j])
                                                                                            {
                                                                                                if(isset($myarray[$s]["Pnt"]))
                                                                                                    {
                                                                                                        echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >".$myarray[$s]["Pnt"]."</a>";
                                                                                                    }
                                                                                                    else
                                                                                                        {
                                                                                                            echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >0</a>";
                                                                                                        }
                                                                                            }
                                                                                    }
                                                                                    $s++;
                                                                            }
                                                                    echo "</td>";
                                                                    $k++;
                                                                }
                                                          echo "</tr>";
                                                      $j++;
                                                  }
                                              ?>
                                          </table>
                                      </div>
                                            <?php
                                    }
                                    else
                                        {
                                            echo "<div class='container'><h4>Одоогоор оюутан алга байна</h4></div>";
                                        }
                  }             
                
                Public static function DrawTeacherJournal_now_min($lesson,$type)
                  {
                                $lesson_id = $lesson;
                                $type_id = $type;
                                $query = Lesson::GetTeacherLesson_now_grade_min($lesson_id, $type_id);
                                $i = 1;
                                $prev = array();
                                $prev_week = array();
                                $prev_LsnNm = array();
                                if(mysqli_num_rows($query) > 0)
                                    {
                                    ?>
                                    <div class="global_1 span2 ehlel">
                                            <table class="table table-bordered table_1">
                                                <tr class="global_row_1">
                                                    <td>Д</td>
                                                    <td>Оюутны код</td>
                                                </tr>
                                                                    <?php
                                        while($result = mysqli_fetch_assoc($query))
                                            {
                                                 if(!in_array($result["UsrCd"], $prev))
                                                     {
                                                 ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                            <?php 
                                                                echo $result["UsrCd"]; 
                                                                $next_usrcd[] = $result["UsrCd"];
                                                                $next_usrid[] = $result["StdID"];
                                                                $next_usrname[] = $result["UsrNm"];
                                                            ?></td>
                                                        </tr>
                                                 <?php
                                                     }
                                                     if(!in_array($result["Week"],$prev_week))
                                                         {
                                                            $title_journal[] = $result["LsnNm"].$result["Week"];
                                                            $week_journal[] = $result["Week"];
                                                            $next_cntID[] = $result["LsnCntID"];
                                                         }
                                                 $prev_week[] = $result["Week"] ;
                                                 $prev[] = $result["UsrCd"];
                                                 $prev_LsnNm[] = $result["LsnNm"];
                                                 $i++;
                                                 $myarray[] = $result;
                                            }
                                            ?>
                                            </table>
                                      </div>
                                      <div class="span7 zoodog ehlel">
                                          <table class="table table-bordered table_2">
                                              <tr class='zoodog_row_1'>
                                                  <?php 
                                                  $i = 0;
                                                  echo "<td> Оюутны нэр </td>";
                                                    while(sizeof($title_journal) > $i)
                                                        {
                                                        echo "<td>";
                                                            echo $title_journal[$i];
                                                        echo "</td>";
                                                            $i++;
                                                        }
                                                  ?>
                                              </tr>
                                              <?php
                                              $j = 0;
                                                  while(sizeof($next_usrcd) > $j)
                                                  {
                                                          echo "<tr>";
                                                          $k = 0;
                                                              echo "<td>";
                                                                echo $next_usrname[$j];
                                                              echo "</td>";
                                                            while(sizeof($week_journal) > $k)
                                                                {
                                                                    echo "<td>";
                                                                    $s = 0;
                                                                    $tooluur = 0;
                                                                    $tooluur_1 = 0;
                                                                        while(sizeof($myarray) > $s)
                                                                            {
                                                                                if($myarray[$s]["Week"] == $week_journal[$k])
                                                                                    {
                                                                                        if($myarray[$s]["UsrCd"] == $next_usrcd[$j])
                                                                                            {
                                                                                                if(isset($myarray[$s]["Pnt"]))
                                                                                                    {
                                                                                                        while(sizeof($myarray) > $tooluur)
                                                                                                            {
                                                                                                                if($myarray[$s]["Week"] == $myarray[$tooluur]["Week"] && $myarray[$s]["UsrCd"] == $myarray[$tooluur]["UsrCd"])
                                                                                                                    {
                                                                                                                        $pnt = $myarray[$s]["Pnt"];
                                                                                                                        if($tooluur > 0)
                                                                                                                            {
                                                                                                                                $pnt = $pnt + $myarray[$s]["Pnt"];
                                                                                                                            }
                                                                                                                    }
                                                                                                                    $tooluur++;
                                                                                                            }
                                                                                                                if($tooluur_1 == 0){
                                                                                                                echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >".$pnt."</a>";
                                                                                                                }
                                                                                                                $tooluur_1++;
                                                                                                    }
                                                                                                    else
                                                                                                        {
                                                                                                            echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >0</a>";
                                                                                                        }
                                                                                            }
                                                                                    }
                                                                                    $s++;
                                                                            }
                                                                    echo "</td>";
                                                                    $k++;
                                                                }
                                                          echo "</tr>";
                                                      $j++;
                                                  }
                                              ?>
                                          </table>
                                      </div>
                                            <?php
                                    }
                                    else
                                        {
                                            echo "<div class='container'><h4>Одоогоор оюутан алга байна</h4></div>";
                                        }
                  }
                  Public static function DrawTeacherJournal_now_mid($lesson)
                  {
                                $lesson_id = $lesson;
                                $query = Lesson::GetTeacherLesson_now_grade_mid($lesson_id);
                                $i = 1;
                                $prev = array();
                                $prev_week = array();
                                $prev_LsnNm = array();
                                if(mysqli_num_rows($query) > 0)
                                    {
                                    ?>
                                    <div class="global_1 span2 ehlel">
                                            <table class="table table-bordered table_1">
                                                <tr class="global_row_1">
                                                    <td>Д</td>
                                                    <td>Оюутны код</td>
                                                </tr>
                                                                    <?php
                                        while($result = mysqli_fetch_assoc($query))
                                            {
                                                 if(!in_array($result["UsrCd"], $prev))
                                                     {
                                                 ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                            <?php 
                                                                echo $result["UsrCd"]; 
                                                                $next_usrcd[] = $result["UsrCd"];
                                                                $next_usrid[] = $result["StdID"];
                                                                $next_usrname[] = $result["UsrNm"];
                                                            ?></td>
                                                        </tr>
                                                 <?php
                                                     }
                                                     if(!in_array($result["Week"].$result["LsnCntID"],$prev_week))
                                                         {
                                                            $title_journal[] = $result["LsnNm"].$result["Week"];
                                                            $week_journal[] = $result["Week"];
                                                            $next_cntID[] = $result["LsnCntID"];
                                                         }
                                                 $prev_week[] = $result["Week"].$result["LsnCntID"] ;
                                                 $prev[] = $result["UsrCd"];
                                                 $prev_LsnNm[] = $result["LsnNm"];
                                                 $i++;
                                                 $myarray[] = $result;
                                            }
                                            ?>
                                            </table>
                                      </div>
                                      <div class="span7 zoodog ehlel">
                                          <table class="table table-bordered table_2">
                                              <tr class='zoodog_row_1'>
                                                  <?php 
                                                  $i = 0;
                                                  echo "<td>Оюутны нэр</td>";
                                                    while(sizeof($title_journal) > $i)
                                                        {
                                                        echo "<td>";
                                                            echo $title_journal[$i];
                                                        echo "</td>";
                                                            $i++;
                                                        }
                                                  ?>
                                              </tr>
                                              <?php
                                              $j = 0;
                                                  while(sizeof($next_usrcd) > $j)
                                                  {
                                                          echo "<tr>";
                                                              echo "<td>";
                                                                echo $next_usrname[$j];
                                                              echo "</td>";
                                                          $k = 0;
                                                            while(sizeof($week_journal) > $k)
                                                                {
                                                                    echo "<td>";
                                                                    $s = 0;
                                                                    $tooluur = 0;
                                                                    $tooluur_1 = 0;
                                                                        while(sizeof($myarray) > $s)
                                                                            {
                                                                                if($myarray[$s]["Week"] == $week_journal[$k])
                                                                                    {
                                                                                        if($myarray[$s]["UsrCd"] == $next_usrcd[$j])
                                                                                            {
                                                                                                if(isset($myarray[$s]["Pnt"]))
                                                                                                    {
                                                                                                        while(sizeof($myarray) > $tooluur)
                                                                                                            {
                                                                                                                if($myarray[$s]["Week"] == $myarray[$tooluur]["Week"] && $myarray[$s]["UsrCd"] == $myarray[$tooluur]["UsrCd"])
                                                                                                                    {
                                                                                                                        $pnt = $myarray[$s]["Pnt"];
                                                                                                                        if($tooluur > 0)
                                                                                                                            {
                                                                                                                                $pnt = $pnt + $myarray[$s]["Pnt"];
                                                                                                                            }
                                                                                                                    }
                                                                                                                    $tooluur++;
                                                                                                            }
                                                                                                                if($tooluur_1 == 0){
                                                                                                                echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >".$pnt."</a>";
                                                                                                                }
                                                                                                                $tooluur_1++;
                                                                                                    }
                                                                                                    else
                                                                                                        {
                                                                                                            echo "<a href='#' data-pk='".$next_usrid[$j]."' data-name='".$next_cntID[$k]."' class='dun' >0</a>";
                                                                                                        }
                                                                                            }
                                                                                    }
                                                                                    $s++;
                                                                            }
                                                                    echo "</td>";
                                                                    $k++;
                                                                }
                                                          echo "</tr>";
                                                      $j++;
                                                  }
                                              ?>
                                          </table>
                                      </div>
                                            <?php
                                    }
                                    else
                                        {
                                            echo "<div class='container'><h4>Одоогоор оюутан алга байна</h4></div>";
                                        }
                  }
           public static function Draw($lesson_id)
                   {
                        $lsnid = $lesson_id;
                        $query = Lesson::GetTeacherLesson_now_grade_mid($lsnid);
                        $myarray = array();
                        while($result = mysqli_fetch_assoc($query))
                            {
                                $myarray[] = $result;
                                if(in_array($result["StdID"],$omnoh_stdid))
                                    {
                                        $niit_oyuutan[] = $result["StdID"];
                                    }
                                if(in_array($result["LsnTpID"]."-".$result["Week"], $omnoh_type))
                                    {
                                        $niit_lab[] = $result["LsnNm"].$result["Week"];
                                    }
                                $omnoh_stdid[] = $result["StdID"];
                                $omnoh_type[] = $result["LsnTpID"]."-".$result["Week"];
                            }
                        $result = array();
                        echo "<table class='global_1'>";
                            echo "<tr>";
                                echo "<td rowspan='2'>";
                                    echo "Д";
                                echo "</td>";
                                echo "<td rowspan='2'>";
                                    echo "Оюутны код";
                                echo "</td>";
                            echo "</tr>";
                        foreach($myarray as $result)
                            {
                                echo "<tr>";
                                    echo "<td>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                        echo "</table>";    
                   }
        
public static function Draw_journal_Lsn($lesson_id,$lsntp=NULL,$lsnTm=NULL)
{
    $lsnid = $lesson_id;
    $query_hich_aguulga = Lesson::Hicheeliin_aguulga_avah($lsnid,$lsntp);
    $query_dun = Lesson::Hicheeliin_dun_avah($lsnid,$lsntp);
    $query_oyuutan = Lesson::Oyuutnii_ners_avah($lsnid,$lsnTm);
    $query_irts = Lesson::Oyuutnii_irts_avah($lsnid);
    $array_hich_aguulga = array();
    $array_dun = array();
    $array_oyuutan = array();
    $oyuutan_niit_code = array();
    $prev_oyuutan = array();
    $oyuutan_niit_id = array();
    $array_dun_oyuutan_id = array();
    $array_dun_cntid = array();
    $array_omno_week = array();
    $oyuutan_niit_name = array();
    $array_niit_doloohong = array();
    $array_hich_cnt_id = array();
    $summer = array();
    $prev_cnt = array();
    $prev_usr = array();
//    = array();
    $hich_aguulga_too = 0;
    $oyuutan_niit_too = 0;
    $dun_too = 0;
    $niit_doloohong = 0;
    $niit_irts = 0;
        while($result = mysqli_fetch_assoc($query_irts))
        {
            $array_irts[] = $result;
            if(!in_array($result["LsnCntID"],$prev_cnt))
                {
                    $array_irts_cntid[] = $result["LsnCntID"];
                }
            if(!in_array($result["UsrID"],$prev_usr))
                {
                    $array_irts_usrid[] = $result["UsrID"];
                }
            $prev_cnt[] = $result["LsnCntID"];
            $prev_usr[] = $result["UsrID"];
            $niit_irts++;
        }
        while($result = mysqli_fetch_assoc($query_hich_aguulga))
            {
                if(!in_array($result["Week"], $array_omno_week))
                    {
                        $array_niit_doloohong[] = $result["Week"];
                        $niit_doloohong++;
                    }
                $array_hich_aguulga[] = $result;
                $array_hich_cnt_id[] = $result["LsnCntID"];
                $array_omno_week[] = $result["Week"];
                $hich_aguulga_too++;
            }
            $i = 0;
            $lab = 0;
            $lekts = 0;
            $sem = 0;
            $bd = 0;
            $nemelt = 0;
        while($hich_aguulga_too > $i)
            {
                $t = 0;
                while($niit_doloohong > $t)
                    {
                        if($array_hich_aguulga[$i]["Week"] == $array_niit_doloohong[$t])
                            {
                                if($array_hich_aguulga[$i]["LsnTpID"] == 1)
                                    {
                                        $lab++;
                                        $summer[] = $array_hich_aguulga[$i]["LsnNm"]."-".$lab;
                                    }
                                if($array_hich_aguulga[$i]["LsnTpID"] == 2)
                                    {
                                        $lekts++;
                                        $summer[] = $array_hich_aguulga[$i]["LsnNm"]."-".$lekts;
                                    }
                                if($array_hich_aguulga[$i]["LsnTpID"] == 3)
                                    {
                                        $sem++;
                                        $summer[] = $array_hich_aguulga[$i]["LsnNm"]."-".$sem;
                                    }
                                if($array_hich_aguulga[$i]["LsnTpID"] == 4)
                                    {
                                        $bd++;
                                        $summer[] = $array_hich_aguulga[$i]["LsnNm"]."-".$bd;
                                    }
                                if($array_hich_aguulga[$i]["LsnTpID"] == 5)
                                    {
                                        $nemelt++;
                                        $summer[] = $array_hich_aguulga[$i]["LsnNm"]."-".$nemelt;
                                    }
                            }
                        $t++;
                    }
                $i++;
            }
        while($result = mysqli_fetch_assoc($query_dun))
            {
                $array_dun[] = $result;
                $array_dun_oyuutan_id[] = $result["StdID"];
                $array_dun_cntid[] = $result["LsnCntID"];
                $dun_too++;
            }
        while($result = mysqli_fetch_assoc($query_oyuutan))
            {
                $array_oyuutan[] = $result;
                if(!in_array($result["UsrID"],$prev_oyuutan))
                    {
                        $oyuutan_niit_code[] = $result["UsrCd"];
                        $oyuutan_niit_id[] = $result["UsrID"];
                        $oyuutan_niit_name[] = $result["UsrNm"];
                        $oyuutan_niit_too++;
                    }
                $prev_oyuutan[] = $result["UsrID"];
            }
     if($dun_too == 0 || $oyuutan_niit_too == 0 || $hich_aguulga_too == 0)
         {
            echo "Uuchlaarai dun ene hichel der dun alga";
         }
         else
             {
             if(isset($_GET["par"]))
                        {
                            $cond = Decode::DecodePar($_GET["par"])."-ийн ";
                        }
                        else
                            {
                            $cond = "";
                            }
             if(isset($_GET["type"]))
                 {
                    $cond2 = $array_hich_aguulga[0]["LsnNm_delger"]."-ийн ";
                 }
                        else
                            {
                            $cond2 = "";
                            }
                 ?>
                        
             <h3 class='Garchig'> <?php echo $array_hich_aguulga[0]["LsnCd"]."-ийн ".$cond.$cond2." дүн"; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Одоо суралцаж буй хичээлүүд > </a>
                            <?php
                                if(isset($_GET["lesson"]))
                                    {
                                    ?>
                            <a href='#'><?php  
                                echo $array_hich_aguulga[0]["LsnCd"]." >";
                            ?></a><?php
                                    }
                            ?>
                            <?php
                                if(isset($_GET["type"]))
                                    {
                                    ?>   
                            <a href='#'><?php 
                                echo $array_hich_aguulga[0]["LsnNm_delger"];?>
                            </a>
                                    <?php }
                                    if(isset($_GET["par"]))
                                        {
                                        echo "<a href='#'> >";
                                            echo Decode::DecodePar($_GET["par"]);
                                        echo "</a>";
                                        }?>
                        </div>
                            <div id="songolt_dun">
                                <button value='0.5' class='dun btn' tovch="Ч">Чөлөөтэй</button>
                                <button value='0.6' class='dun btn' tovch="Ө">Өвчтэй</button>
                                <button value='1' class='dun active btn btn-success' tovch="И">Ирсэн</button>
                                <button value='0' class='dun btn' tovch="Т">Тасалсан</button>
                            </div>
                            <div class='journal'>
                            <?php
        $i = 0;
     echo "<table border='1' class='global_1 mytable table table-bordered'>";
        echo "<tr>";
            echo "<td colspan='2'>";
                echo "<input type='text' value='' class='username'>";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='First_cell'>";
                echo "Д/д";
            echo "</td>";
            echo "<td rowspan='3' class='First_cell'>";
                echo "Оюутны код";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        $i = 0;
        while($oyuutan_niit_too > $i)
            {
            echo "<tr>";
                echo "<td>";
                    echo $i+1;
                echo "</td>";
                echo "<td class='dun_4' data_2='".$oyuutan_niit_id[$i]."'>";
                    echo $oyuutan_niit_code[$i];
                echo "</td>";
            echo "</tr>";
                $i++;
            }
         echo "<tr>";
            echo "<td colspan='2' class='dundaj_1'>";
                echo "Авж болох оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2' class='dundaj_1'>";
                echo "Дундаж оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2' class='dundaj_1'>";
                echo "Дээд оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2' class='dundaj_1'>";
                echo "Доод оноо:";
            echo "</td>";
         echo "</tr>";
     echo "</table>";
     
     echo "<div class='zoodog'><table class='mytable table table-bordered' border='1'>";
        echo "<tr>";
            echo "<td>";
                echo "<input type='text' value='' name='username'>";
            echo "</td>";
            $ooooom = $hich_aguulga_too*2;
            echo "<td colspan='".$ooooom."'>";
            echo "</td>";
        echo "</tr>";
            echo "<tr>";
                echo "<td rowspan='3' class='First_cell'>";
                    echo "Оюутны нэр";
                echo "</td>";
                echo "<td colspan='".$hich_aguulga_too."' class='First_cell'>";
                    echo "Ирцийн оноо";
                echo "</td>";
                echo "<td colspan='".$hich_aguulga_too."' class='First_cell'>";
                    echo "Даалгаврын оноо";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
            $g = 0;
            while(2>$g){
                $g++;
     $i = 0;
            while($niit_doloohong > $i)
                {
                $h = 0;
                $tooluur_3 = 0;
                        while($hich_aguulga_too > $h)
                            {
                                if($array_hich_aguulga[$h]["Week"] == $array_niit_doloohong[$i])
                                    {
                                        $tooluur_3++;
                                    }
                                $h++;
                            }
                    echo "<td class='tolgoi_nud'";
                    if($tooluur_3 > 1)
                        {
                            echo " colspan='".$tooluur_3."'>";
                        }
                        else
                            {
                            echo ">";
                            }
                        echo $array_niit_doloohong[$i]."-р ДХ";
                    echo "</td>";
                    $i++;
                }
            }
            echo "</tr>";
            echo "<tr>";
                
            $i = 0;
            while($i < 2){
            $o = 0;
            $i++;
            while($hich_aguulga_too > $o)
                {
                echo "<td class='tolgoi_nud'>";
                    echo $summer[$o];
                echo "</td>";
                $o++;
            }}         
            echo "</tr>";
            $i = 0;
            while($oyuutan_niit_too > $i)
                {
                echo "<tr>";
                echo "<td>";
                    echo $oyuutan_niit_name[$i];
                echo "</td>";
                
                // Irtsiiin onoonii heseg ehelj bna
                
                $s=0;
                while($hich_aguulga_too > $s)
                    {
                        echo "<td class='dun_1' data_1='".$array_hich_aguulga[$s]["LsnCntID"]."' data_2='".$oyuutan_niit_id[$i]."'>";
                            if(in_array($array_hich_aguulga[$s]["LsnCntID"],$array_irts_cntid))
                                {
                                if(in_array($oyuutan_niit_id[$i], $array_irts_usrid))
                                    {
                                        $y=0;
                                        while($niit_irts > $y)
                                            {
                                                if($array_irts[$y]["LsnCntID"] == $array_hich_aguulga[$s]["LsnCntID"] && $array_irts[$y]["UsrID"] == $oyuutan_niit_id[$i])
                                                    {
                                                        $useg = Decode::checkTuluv($array_irts[$y]["AttSta"]);
                                                        echo $useg;
                                                    }
                                                $y++;
                                            }
                                    }
                                }
                        echo "</td>";
                        $s++;
                    }
                
                
                
                
                $j = 0;
                while($hich_aguulga_too > $j)
                    {
                    echo "<td>";
                        if(in_array($oyuutan_niit_id[$i],$array_dun_oyuutan_id))
                            {
                                if(in_array($array_hich_aguulga[$j]["LsnCntID"],$array_dun_cntid))
                                    {
                                            $r = 0;
                                            $oldoogui = true;
                                                while($dun_too > $r)
                                                    {
                                                        if($array_dun_cntid[$r] == $array_hich_aguulga[$j]["LsnCntID"])
                                                        {
                                                            if($array_dun_oyuutan_id[$r] == $oyuutan_niit_id[$i])
                                                                {
                                                                    echo "<a class='dun_2' href='#' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."' data-name='".$oyuutan_niit_id[$i]."'>".$array_dun[$r]["Pnt"]."</a>";
                                                                    $oldoogui = false;
                                                                    break;
                                                                }
                                                        }
                                                        $r++;
                                                    }
                                                    if($oldoogui)
                                                        {
                                                            echo "<a class='dun_2' href='#' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."' data-name='".$oyuutan_niit_id[$i]."'>0</a>";
                                                        }
                                    }
                                    else
                                        {
                                        echo "<a class='dun_2' href='#' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."' data-name='".$oyuutan_niit_id[$i]."'>0</a>";
                                        }
                            }
                            else
                                {
                                echo "<a class='dun_2' href='#' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."' data-name='".$oyuutan_niit_id[$i]."'>0</a>";
                                }
                    echo "</td>";
                    $j++;
                    }
                echo "</tr>";
                $i++;
                }
          $i = 0;
          echo "<tr>";
                echo "<td rowspan='5'>";
                    echo "&nbsp";
                echo "</td>";
                    echo "<td colspan='".$hich_aguulga_too."' rowspan='4'>";
                        
                    echo "</td>";
                $i=0;
            while($hich_aguulga_too > $i)
                {
                    echo "<td>";
                        echo "<i class='Jurnal_onts'>".$array_hich_aguulga[$i]["SelfPnt"]."</i>";
                    echo "</td>";
                    $i++;
                }
          echo "</tr>";
                 $j = 0;
                  echo "<tr>";
                  while($hich_aguulga_too > $j)
                      {
                        echo "<td class='average dundaj' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  $j = 0;
                  echo "<tr>";
                  while($hich_aguulga_too > $j)
                      {
                        echo "<td class='max_pnt dundaj' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  $j = 0;
                  echo "<tr>";
                  while($hich_aguulga_too > $j)
                      {
                        echo "<td class='min_pnt dundaj' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  echo "<tr>";
                    echo "<td colspan='".$hich_aguulga_too."'>";
                    echo "</td>";
                    $i = 0;
                    while($hich_aguulga_too > $i)
                    {
                    echo "<td>";
                        echo "<a href='?host=".HOSTNAME."&lsn=".$lesson_id."&lsnCnt=".$array_hich_cnt_id[$i]."&action=tailan'>";
                            echo "<input type='button' value='Тайлан' class='btn'>";
                        echo "</a>";
                    echo "</td>";
                    $i++;
                    }
                  echo "</tr>";
                  
     echo "</table></div>";   
     
     echo "<table class='global_2 mytable table table-bordered' border='1'>";
        echo "<tr>";
            echo "<td colspan='3' id='boloodohlee'>";
                
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td rowspan='3' class='First_cell'>";
                echo "Нийт дүн";
            echo "</td>";
            echo "<td rowspan='3' class='First_cell'>";
                echo "Баг";
            echo "</td>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        
        $i = 0;
        while($oyuutan_niit_too > $i)
            {
                echo "<tr>";
                    echo "<td class='total_pnt dundaj' data-name='".$oyuutan_niit_id[$i]."'>";
                        
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp";
                    echo "</td>";
                echo "</tr>";
                $i++;
            }
     echo "<tr>";
        echo "<td rowspan='4' colspan='2'>";
            echo "&nbsp";
        echo "</td>";
        echo "<td>";
            echo "&nbsp";
        echo "</td>";
     echo "</tr>";
     echo "<tr>";
        echo "<td>";
            echo "&nbsp";
        echo "</td>";
     echo "</tr>";
     echo "<tr>";
        echo "<td>";
            echo "&nbsp";
        echo "</td>";
     echo "</tr>";
     echo "<tr>";
        echo "<td>";
            echo "&nbsp";
        echo "</td>";
     echo "</tr>";
     echo "</table>";
             
            }
     $result = array();
     $result["niit_aguulga"] = $hich_aguulga_too;
     $result["niit_cnt_id"] = $array_hich_cnt_id;
     $result["niit_oyuutan"] = $oyuutan_niit_too;
     $result["niit_oyuutan_id"] = $oyuutan_niit_id;
     return $result;
     ?>

<?php
}
            public static function DrawTeacherJournal_now_max()
                    {
                          $query = Lesson::GetTeacherLesson();
                          $array_niit_lsn_nm = array();
                          $prev_lsn_id = array();
                          $array_niit_lsn_cd = array();
                          $niit_lsn = 0;
                          while($result = mysqli_fetch_assoc($query))
                              {
                                    if(!in_array($result["LsnID"], $prev_lsn_id))
                                        {
                                            $array_niit_lsn_nm[] = $result["LsnNm"];
                                            $array_niit_lsn_cd[] = $result["LsnCd"];
                                            $niit_lsn++;
                                        }
                                        $prev_lsn_id[] = $result["LsnID"];
                              }?>
               <h3 class='Garchig'> <?php echo "Одоо зааж буй хичээлүүд "; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Одоо зааж буй хичээлүүд </a>
                        </div><?php
                          echo "<table class='table table-bordered'>";
                            echo "<tr>";
                                echo "<td class='First_cell'>";
                                    echo "Д/д";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Хичээлийн код";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Хичээлийн нэр";
                                echo "</td>";
                            echo "</tr>";
                            $i = 0;
                            while($niit_lsn > $i)
                                {
                                echo "<tr>";
                                    echo "<td>";
                                        echo $i+1;
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_cd[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_nm[$i];
                                    echo "</td>";
                                echo "</tr>";
                                    $i++;
                                }
                          echo "</table>";
                    }
                    
                    // үүнээс хойш ................ засаарай
                    
                    public static function DrawTeacherJournal_prev_max()
                    {
                          ?>
               <h3 class='Garchig'> <?php echo "Өмнө зааж байсан хичээлүүд "; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Өмнө зааж байсан хичээлүүд </a>
                        </div><?php
                        $array_niit_lsn_cd = array();
                        $array_niit_lsn_cd[] = "IS200";
                        $array_niit_lsn_cd[] = "IS304";
                        $array_niit_lsn_cd[] = "FD200";
                        $array_niit_lsn_cd[] = "FD300";
                        $array_niit_lsn_cd[] = "SE200";
                        $array_niit_lsn_nm = array();
                        $array_niit_lsn_nm[] = "Програмчллын үндэс";
                        $array_niit_lsn_nm[] = "Өгөгдлийн сан удирдах систем";
                        $array_niit_lsn_nm[] = "Ford";
                        $array_niit_lsn_nm[] = "Gerals";
                        $array_niit_lsn_nm[] = "Хөдөлгөөнт";
                        $array_niit_lsn_year = array();
                        $array_niit_lsn_year[] = "2011 оны Намар";
                        $array_niit_lsn_year[] = "2011 оны Өвөл";
                        $array_niit_lsn_year[] = "2011 оны Хавар";
                        $array_niit_lsn_year[] = "2011 оны Хавар";
                        $array_niit_lsn_year[] = "2012 оны Өвөл";
                        $niit_lsn = 5;
                        
                          echo "<table class='table table-bordered'>";
                            echo "<tr>";
                                echo "<td class='First_cell'>";
                                    echo "Д/д";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Хичээлийн код";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Хичээлийн нэр";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Хичээлийн жил";
                                echo "</td>";
                            echo "</tr>";
                            $i = 0;
                            while($niit_lsn > $i)
                                {
                                echo "<tr>";
                                    echo "<td>";
                                        echo $i+1;
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_cd[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_nm[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_year[$i];
                                    echo "</td>";
                                echo "</tr>";
                                    $i++;
                                }
                          echo "</table>";
                    }
                    public static function DrawTeacherJournal_prev_mid()
                    {
                          ?>
               <h3 class='Garchig'> <?php echo "Програмчллын үндэс "; ?></h3>
                        <div class="Zanguu">
                            <a href="#">>Өмнө зааж байсан хичээлүүд </a>
                            <a href="#">> IS200 </a>
                        </div><?php
                        $array_niit_lsn_cd = array();
                        $array_niit_lsn_cd[] = "SW09D202";
                        $array_niit_lsn_cd[] = "SW10D201";
                        $array_niit_lsn_nm = array();
                        $array_niit_lsn_nm[] = "Уламбаяр";
                        $array_niit_lsn_nm[] = "Пүүжээ";
                        $array_niit_lsn_year = array();
                        $array_niit_lsn_year[] = "69";
                        $array_niit_lsn_year[] = "70";
                        $array_niit_lsn_year1 = array();
                        $array_niit_lsn_year1[] = "30";
                        $array_niit_lsn_year1[] = "27";
                        $niit_lsn = 2;
                        
                          echo "<table class='table table-bordered'>";
                            echo "<tr>";
                                echo "<td class='First_cell'>";
                                    echo "Д/д";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Оюутны код";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "Оюутны нэр";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "70 оноо";
                                echo "</td>";
                                echo "<td class='First_cell'>";
                                    echo "30 оноо";
                                echo "</td>";
                            echo "</tr>";
                            $i = 0;
                            while($niit_lsn > $i)
                                {
                                echo "<tr>";
                                    echo "<td>";
                                        echo $i+1;
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_cd[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_nm[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_year[$i];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $array_niit_lsn_year1[$i];
                                    echo "</td>";
                                echo "</tr>";
                                    $i++;
                                }
                          echo "</table>";
                    }
                    public static function err_1()
                            {
                               echo "<div class='container'><h4>Одоогоор оюутан алга байна</h4></div>";
                            }
              public static function Draw_tailan($lsnid,$cnt_id)
                      {
                      
                      $query = Lesson::GetTailan($lsnid, $cnt_id);
                      $prev_oyuutan = array();
                      $array_pnt = array();
                      $array_oyuutan = array();
                      $my_array = array();
                      $niit_oyuutan = 0;
                      $total = 0;
                      while($result = mysqli_fetch_assoc($query))
                          {
                            $array_pnt[] = $result["Pnt"];
                            $total+= (int)$result["Pnt"];
                            if(!in_array($result["StdID"],$prev_oyuutan))
                            {
                                $array_oyuutan[] = $result["StdID"];
                                $niit_oyuutan++;
                            }
                            $prev_oyuutan[] = $result["StdID"];
                            $my_array[] = $result;
                          }
                            ?>
                            
                            <div class="journal_huree">
                               <h3><?php echo $my_array[0]["LsnNm"]."-ийн ".$my_array[0]["LsnNm_delger"]; ?></h3>
                               <div class="dogol">
                                   <table border="0" id="hetsuudee">
                                       <tr>
                                           <td class="First_cell">
                                               Хичээлийн нэр:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $my_array[0]["LsnNm"]; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Хичээлийн төрөл:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $my_array[0]["LsnNm_delger"]; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Сэдэв:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $my_array[0]["Title"]; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Нийт оюутан:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $niit_oyuutan ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Нийт авах оноо:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $niit_oyuutan*$my_array[0]["SelfPnt"]; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Нийт оноо:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $total; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="First_cell">
                                               Нийт оюутан:
                                           </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $niit_oyuutan; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                            <td class="First_cell">
                                                Дундаж оноо:
                                            </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo $total/$niit_oyuutan; ?>
                                           </td>
                                       </tr>
                                       <tr>
                                            <td class="First_cell">
                                                Доод оноо:
                                            </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo min($array_pnt); ?>
                                           </td>
                                       </tr>
                                       <tr>
                                            <td class="First_cell">
                                                Дээд оноо:
                                            </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo max($array_pnt); ?>
                                           </td>
                                       </tr>
                                       <tr>
                                            <td class="First_cell">
                                                Амжилтын хувь:
                                            </td>
                                           <td class="hoyor_dahi_nud">
                                               <?php echo substr((100*($total/($my_array[0]["SelfPnt"]*$niit_oyuutan))), 0, 4)."%"; ?>
                                           </td>
                                       </tr>
                                   </table>
                               </div>
                            </div>
                            <?php
                      }
}



?>
