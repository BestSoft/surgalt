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
                                                <td class="Average_journal"><?php echo $total_chan/$total_crd; ?></td>
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
    
}



?>
