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
        $query = Lesson::GetStudent_grade_min($lesson,$type,$isav);
        if(mysqli_num_rows($query) > 0)
            {                                     
                        ?>
                    <table class="table table-bordered">                        
                        <tr class="Table_header">
                            <td>Д/Д</td>
                            <td>7 хоног</td>
                            <td>Сэдэв</td>
                            <td>Авах оноо</td>
                            <td>Оноо</td>
                        </tr>
                        <?php 
                        $i=1;
                   while($result = mysqli_fetch_assoc($query))
                        {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result["Week"]; ?></td>
                            <td><?php echo $result["TpcNm"]; ?></td>
                            <td><?php echo $result["SelfPnt"]; ?></td>
                            <td><?php echo $result["Pnt"]; ?></td>
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
                    echo "<div class='container'><h4>Одоогоор энэхүү хичээл дээр дүн тавигдаагүй байна</h4></div>";
                }
                }
     public static function DrawStudentJournal_mid($lesson)
             {
                $query = Lesson::GetStudent_grade_mid($lesson);
                $i = 1;
                if(mysqli_num_rows($query) > 0)                    
                    {
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
                            while($result = mysqli_fetch_assoc($query))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result["Week"]; ?></td>
                                            <td><?php echo $result["Title"]; ?></td>
                                            <td><?php echo $result["LsnNm"]; ?></td>
                                            <td><?php echo $result["SelfPnt"]; ?></td>
                                            <td><?php echo $result["Pnt"]; ?></td>
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
                            echo "<div class='container'><h4>Одоогоор энэхүү хичээл дээр дүн тавигдаагүй байна</h4></div>";
                        }
             }
     public static function DrawStudentJournal_max()
             {         
                    $query = Lesson::GetStudent_grade_max();
                    $query_1 = Lesson::GetStudent_Grade_isa();
                    $i = 1;
                    if(mysqli_num_rows($query) > 0)
                        {                        
                            ?>
                                <table class="table table-bordered">
                                    <tr class="Table_header">
                                        <td>Д/Д</td>
                                        <td>Хичээлийн нэр</td>
                                        <td>Хичээлийн код</td>
                                        <td>Нийт оноо</td>
                                        <td>Ордог багшийн код</td>
                                        <td>Багшийн нэр</td>
                                    </tr>
                                    <?php 
                                    while($result = mysqli_fetch_assoc($query))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result["LsnCd"]; ?></td>
                                                <td><?php echo $result["LsnNm"]; ?></td>
                                                <td><?php echo Decode::GetTotalPoint($query_1,$result["LsnID"]); ?></td>
                                                <td><?php echo $result["UsrCd"]; ?></td>
                                                <td><?php echo $result["UsrNm"]; ?></td>
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
                                <table class="table table-bordered">
                                    <tr class="Table_header">
                                        <td>Хичээлийн Код</td>
                                        <td>Хичээлийн Нэр</td>
                                        <td>Кредит</td>
                                        <td>70 Оноо</td>
                                        <td>30 Оноо</td>
                                        <td>Нийт оноо</td>
                                        <td>Үсгэн үнэлгээ</td>
                                        <td>Чанрын оноо</td>
                                        <td>Улирал</td>
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
                                        <table class="table table-bordered">
                                            <tr class="Table_header">
                                                <td>Хичээлийн Код</td>
                                                <td>Хичээлийн Нэр</td>
                                                <td>Кредит</td>
                                                <td>70 Оноо</td>
                                                <td>30 Оноо</td>
                                                <td>Нийт оноо</td>
                                                <td>Үсгэн үнэлгээ</td>
                                                <td>Чанрын оноо</td>
                                                <td>Багшийн код</td>
                                                <td>Багшийн нэр</td>
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
                                                <td><?php ?></td>
                                                <td><?php ?></td>
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
                                                <td></td>
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
          Public static function DrawTeacherJournal_now_min($lesson,$type,$lsntm)
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
    
}



?>
