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
    public static function DrawStudentJournal_min($lesson,$type)
                {
        $query = Lesson::GetStudent_grade_min($lesson, $type);
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
    
}



?>
