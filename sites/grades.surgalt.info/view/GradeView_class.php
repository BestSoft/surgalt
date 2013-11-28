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
                    <a href="?host=<?php echo HOSTNAME ?>">Одоо судалж буй хичээлүүд</a> <i class="glyphicon glyphicon-plus"></i>
                <?php 
                $i = 0;
                while($result = $query->fetch_assoc())
                    {
                            if($prev != $result["LsnID"])
                                {
                                   if(isset($start))
                                       {
                                            $start = $start."</div>"; 
                                            $davhardal = array();
                                       }      
                                       $start = $start."<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."'>".$result["LsnCd"]."</a> <i class='glyphicon glyphicon-plus'></i>";
                                       $i=0;
                                }  
                                if(!in_array($result["LsnTpID"], $davhardal))
                                {
                                    if($i == 0)
                                        {
                                            $start.= "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."&irts=1'>"."Ирц"."</a></div>";
                                        }
                                    $middle = "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."&type=".$result["LsnTpID"]."&isa=".$result["isAvailable"]."'>".$result["LsnNm_delger"]."</a></div>";                                               
                                    $davhardal[] = $result["LsnTpID"];                            
                                    $start = $start.$middle;
                                    $i++;
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
                    <div class="neg_2"><a href="#">Та энэ жил хичээл үзээгүй байна</a> <i class="glyphicon glyphicon-plus"></i></div>
                        <?php
          }
  }
  
  
  
  
  public static function DrawTeacherMenu_now()
            {
            $query = Lesson::GetTeacherLesson();
            $omnoh_lesson = array();
            $i = 0;
            $omnoh_type = -1;
            if(mysqli_num_rows($query) > 0)
                {
                       echo "<div class='neg_2'>";
                        echo "<a href='?host=".HOSTNAME."'>Одоо зааж буй хичээлүүд</a> <i class='glyphicon glyphicon-plus'></i>";
                            while($result = mysqli_fetch_assoc($query))
                                {
                                    if(!in_array($result["LsnID"], $omnoh_lesson))
                                        {
                                            $i++;
                                            if($i>1)
                                                {
                                                    echo "</div>";
                                                        echo "</div>";
                                                }
                                            echo "<div class='neg_2 dotorhi_1'>";
                                                echo "<a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."'>".$result["LsnCd"]."</a> <i class='glyphicon glyphicon-plus'></i>";
                                            $j = 0;
                                        }
                                        if($omnoh_type != $result["LsnTpID"])
                                            {
                                                if($j > 0)
                                                    {
                                                       echo "</div>"; 
                                                    }
                                                echo "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."&type=".$result["LsnTpID"]."'>".$result["LsnNm_delger"]."</a> <i class='glyphicon glyphicon-plus'></i>";
                                                    $j++;
                                            }
                                            echo "<div class='neg_2 dotorhi_1'>";
                                                echo "<a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."&type=".$result["LsnTpID"]."&par=".$result["LsnTm"]."'>".Decode::DecodePar($result["LsnTm"])."</a>";
                                            echo "</div>";
                                    $omnoh_lesson[] = $result["LsnID"];
                                    $omnoh_type = $result["LsnTpID"];
                                }
                       echo "</div>";
                      echo "</div>";
                    echo "</div>";
                }
                else
                    {
                        echo "<div class='neg_2'><a href='#'>Та энэ семистер хичээл заагаагүй байна</a> <i class='glyphicon glyphicon-remove'></div>";
                    }
            }
 
    
    public static function DrawStudentMenu_prev()
            {        
                $query = Lesson::GetStudentLesson_prev();
                $prev = 0;
                $start = null;
        if(mysqli_num_rows($query) > 0)
            { ?>
            <div class="neg_2"><a href="?host=<?php echo HOSTNAME ?>&action=2">Өмнө судалж байсан хичээлүүд</a> <i class="glyphicon glyphicon-plus"></i>
                <?php
                while($result = $query->fetch_assoc())
                    {
                        $year = Decode::DecodeYear($result["LsnYear"]);
                        if($prev != $result["LsnYear"])
                            {
                                if(isset($start))
                                    {
                                        $start.="</div>";
                                    }
                                    $start.= "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&year=".$result["LsnYear"]."'>".$year."</a> ";
                            }
                        $prev = $result["LsnYear"];
                    }
                    $start.="</div>";
                    echo $start;
                ?>
            </div>            
    <?php
            }
            else
                {?>
                <div class='neg_2'><a href='#'>Өмнө үзсэн хичээл байхгүй байна</a> <i class='glyphicon glyphicon-remove'></i></div><?php 
                }
            }
            
   public static function DrawTeacherMenu_prev()   
           {
                $query = Lesson::GetTeacherLesson_prev();
                if(mysqli_num_rows($query) > 0)
                    {
                $start = null;
                $prev = 0;
                ?>
                    <div class="neg_2"><a href="?host=<?php echo HOSTNAME; ?>&action=1">Өмнө зааж байсан хичээлүүд</a> <i class="glyphicon glyphicon-plus"></i>
                <?php 
                $a = '?host='.HOSTNAME.'&action=3';
                $b = "?host=".HOSTNAME."&action=2";
                while($result = mysqli_fetch_assoc($query))
                    {
                        if($prev != $result["LsnYear"])
                            {                                
                                if(isset($start))
                                    {
                                        $start .= "</div>";
                                    }                    
                                    $start.= '<div class="neg_2 dotorhi_1"><a href="'.$b.'">'.  Decode::DecodeYear($result["LsnYear"]).'</a><i class="glyphicon glyphicon-plus"></i>';
                            }                
                            $middle = "<div class='neg_2 dotorhi_1'><a href='".$a."'>".$result["LsnCd"]."</a></div>";
                            $start.= $middle;
                            $prev = $result["LsnYear"];
                            $a="?host=".HOSTNAME."&action=4";
                            $b="?host=".HOSTNAME."&action=5";
                    }
                    echo $start.="</div>";
                    ?>
                        </div>
                    <?php 
                    }
                    else
                        {
                        ?><div class='neg_2'><a href='#'>Танд өмнө зааж байсан хичээл алга</a> <i class='glyphicon glyphicon-remove'></i></div><?php
                        }
           }
           
   Public static function DrawSubMenu()
           {
                ?>
                   <div class="neg_2"><a href="#">Туслах</a> <i class="glyphicon glyphicon-plus"></i>
                        <div class="neg_2 dotorhi_1"><a href="http://www.unimis.edu.mn/student/oyutan.pdf">Оюутны гарын авлага</a>
                        </div>
                        <div class="neg_2 dotorhi_1"><a href="http://must.edu.mn/beta3/menu136">Дүгнэх журам үзэх</a>
                        </div>
                        <div class="neg_2 dotorhi_1"><a href="#">Хичээлийн хувиар үзэх</a>
                        </div>
                   </div>
                <?php
           }
    public static function DrawSubMenuReport()
            {
                    ?>
                        <div class="neg_2"><a href="#">Тайлан</a> <i class="glyphicon glyphicon-plus"></i>
                            <div class="neg_2 dotorhi_1"><a href="#">Оюутны жилийн тайлан</a></div>
                            <div class="neg_2 dotorhi_1"><a href="#">Оюутны улирлын тайлан</a></div>
                            <div class="neg_2 dotorhi_1"><a href="#">Оюутны чадварын тайлан</a></div>
                        </div>
                    <?php
            }
            
}


?>
