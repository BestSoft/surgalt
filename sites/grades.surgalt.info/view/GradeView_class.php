<?php

                            //        Дүнгийн мэдээллийг цуглуулан HTML дээр зурдаг класс 
                            //        View Class

class GradePage
{
    function DrawGradePage()    // Дүнгийн хуудсыг зурдаг функц юм 
    {
        
    }
    Public static function DrawStudentMenu_now()
            {
              $query = Lesson::GetStudentLesson();
              if(mysqli_num_rows($query) > 0)
              {        
                $prev = 0;
                $davhardal = array();
                $start = null;?>
                <div class="neg_2">
                    <a href="#">Одоо судалж буй хичээлүүд</a> <i class="icon-plus"></i>
                <?php 
                while($result = $query->fetch_assoc())
                    {
                            if($prev != $result["LsnID"])
                                {
                                   if(isset($start))
                                       {
                                            $start = $start."</div>"; 
                                            $davhardal = array();
                                       }      
                                       $start = $start."<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnCd"]."</a> <i class='icon-plus'></i>";
                                }  
                                if(!in_array($result["LsnTpID"], $davhardal))
                                {
                                    $middle = "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnNm"]."</a></div>";                                               
                                    $davhardal[] = $result["LsnTpID"];                            
                                    $start = $start.$middle;
                                }
                                    $prev = $result["LsnID"];                                                
                    }
                    echo $start."</div>";
                    ?>
                    </div>        
                  <?php 
              }
              else
                  {
                    ?>
                    <div class="neg_2"><a href="#">Та энэ жил хичээл үзээгүй байна</a> <i class="icon-remove"></i></div>
                        <?php
          }
  }
  public static function DrawTeacherMenu_now()
    {
        $query = Lesson::GetTeacherLesson();
        $start = null;
        $middle = null;
        $prev = 0;
        $prev_1 = 0;
        if(mysqli_num_rows($query) > 0)
            {        
        ?>
        <div class="neg_2"><a href="#">Одоо зааж буй хичээлүүд</a> <i class='icon-plus'></i>
        <?php
            while($result = $query->fetch_assoc())
                {                    
                    if($prev != $result["LsnID"])
                        {
                            if(isset($start))
                                {
                                    $start.="</div>";
                                }                                                    
                        $start.= "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnCd"]."</a> <i class='icon-plus'></i>";
                        }
                        if($prev_1 != $result["LsnTpID"])
                            {
                                if(isset($middle))
                                    {
                                        $middle.="</div>";
                                    }
                        $middle.= "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnNm"]."</a> <i class='icon-plus'></i>";
                            }                        
                    $middle_1 = "<div class='neg_2 dotorhi_1'><a href='#'>".  Decode::DecodePar($result["LsnTm"])."</a></div>";
                    
                    $start.= $middle.$middle_1;
                    $middle = "";
                    $prev = $result["LsnID"];
                    $prev_1 = $result["LsnTpID"];
                }
                echo $start."</div>";
        ?>
        </div>
                    
        <?php
            }
             else 
                 {
                    echo '<div class="neg_2"><a href="#">Та энэ жил хичээл үзээгүй байна</a> <i class="icon-remove"></i></div>';
                 }
    }    
            
}


?>
