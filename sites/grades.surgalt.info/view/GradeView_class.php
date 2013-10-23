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
                                    $middle = "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&lesson=".$result["LsnID"]."&type=".$result["LsnTpID"]."'>".$result["LsnNm"]."</a></div>";                                               
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
          $i = 0;
          $prev_LsnID = 0;
          $prev_LsnTpID = 0;
          if(mysqli_num_rows($query) > 0)
              {
              echo "<div class='neg_2'><a href='#'>Одоо зааж буй хичээлүүд</a> <i class='icon-plus'></i>";
                  while($result = mysqli_fetch_assoc($query))
                      {
                        if($prev_LsnID != $result["LsnID"])
                            {
                                if(isset($start))
                                    {
                                        $start.="</div>";
                                    }
                                    $start.= "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnCd"]."</a> <i class='icon-plus'></i>";
                            }
                        if($prev_LsnTpID != $result["LsnTpID"])
                            {
                                if($i != 0)
                                    {
                                        $start.="</div>";
                                    }
                                    $start.= "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnNm"]."</a> <i class='icon-plus'></i>";
                            }                        
                        $middle = "<div class='neg_2 dotorhi_1'><a href='#'>".Decode::DecodePar($result["LsnTm"])."</a></div>";
                        $start.=$middle;
                        $prev_LsnID = $result["LsnID"];
                        $prev_LsnTpID = $result["LsnTpID"];
                        $i++;
                      }
                      echo $start."</div></div>";
              echo "</div>";
              }
          else
              {
                echo "<div class='neg_2'><a href='#'>Та энэ семистер хичээл заагаагүй байна</a> <i class='icon-remove'></div>";
              }
    }
    
    public static function DrawStudentMenu_prev()
            {        
                $query = Lesson::GetStudentLesson_prev();
                $prev = 0;
                $start = null;
        if(mysqli_num_rows($query) > 0)
            { ?>
            <div class="neg_2"><a href="#">Өмнө судалж байсан хичээлүүд</a> <i class="icon-plus"></i>
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
                                    $start.= "<div class='neg_2 dotorhi_1'><a href='3'>".$year."</a> <i class='icon-plus'></i>";
                            }
                        $middle = "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnCd"]."</a></div>";
                        
                        $prev = $result["LsnYear"];
                        $start.=$middle;
                    }
                    $start.="</div>";
                    echo $start;
                ?>
            </div>            
    <?php
            }
            else
                {?>
                <div class='neg_2'><a href='#'>Өмнө үзсэн хичээл байхгүй байна</a> <i class='icon-remove'></i></div><?php 
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
                    <div class="neg_2"><a href="#">Өмнө зааж байсан хичээлүүд</a> <i class="icon-plus"></i>
                <?php 
                while($result = mysqli_fetch_assoc($query))
                    {
                        if($prev != $result["LsnYear"])
                            {                                
                                if(isset($start))
                                    {
                                        $start .= "</div>";
                                    }                    
                                    $start.= '<div class="neg_2 dotorhi_1"><a href="#">'.  Decode::DecodeYear($result["LsnYear"]).'</a><i class="icon-plus"></i>';
                            }                
                            $middle = "<div class='neg_2 dotorhi_1'><a href='#'>".$result["LsnCd"]."</a></div>";
                            $start.= $middle;
                            $prev = $result["LsnYear"];
                    }
                    echo $start.="</div>";
                    ?>
                        </div>
                    <?php 
                    }
                    else
                        {
                        ?><div class='neg_2'><a href='#'>Танд өмнө зааж байсан хичээл алга</a> <i class='icon-remove'></i></div><?php
                        }
           }
           
   Public static function DrawSubMenu()
           {
                ?>
                   <div class="neg_2"><a href="#">Туслах</a> <i class="icon-plus"></i>
                        <div class="neg_2 dotorhi_1"><a href="#">Оюутны гарын авлага</a>
                        </div>
                        <div class="neg_2 dotorhi_1"><a href="#">Дүгнэх журам үзэх</a>
                        </div>
                        <div class="neg_2 dotorhi_1"><a href="#">Хичээлийн хувиар үзэх</a>
                        </div>
                   </div>
                <?php
           }
            
}


?>
