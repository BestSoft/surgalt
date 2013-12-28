<?php 
//oyuutnii huwid shuu :)

    function DrawSubMenu()
               {
                    ?>
                       <a href="#">Туслах</a> <i class="glyphicon glyphicon-plus white ded_menu"></i>
                            <div class="neg_2 dotorhi_1"><a href="http://www.unimis.edu.mn/student/oyutan.pdf">Оюутны гарын авлага</a>
                            </div>
                            <div class="neg_2 dotorhi_1"><a href="http://must.edu.mn/beta3/menu136">Дүгнэх журам үзэх</a>
                            </div>
                            <div class="neg_2 dotorhi_1"><a href="#">Хичээлийн хувиар үзэх</a>
                            </div>
                    <?php
               }

    function DrawSubMenuReport()
            {
                    ?>
                        <a href="#">Тайлан</a> <i class="glyphicon glyphicon-plus white ded_menu"></i>
                            <div class="neg_2 dotorhi_1"><a href="?host=<?php echo HOSTNAME ?>&view=report_column">Оюутны жилийн тайлан</a></div>
                            <div class="neg_2 dotorhi_1"><a href="#">Оюутны улирлын тайлан</a></div>
                            <div class="neg_2 dotorhi_1"><a href="#">Оюутны чадварын тайлан</a></div>
                    <?php
            }

    function DrawStudentMenu_prev()
            {        
                $query = Get_hicheel::GetStudentLesson_prev();
                $prev = 0;
                $start = null;
        if(mysqli_num_rows($query) > 0)
            { ?>
            <a href="?host=<?php echo HOSTNAME ?>&ac=1">Өмнө судалж байсан хичээлүүд</a> <i class="glyphicon glyphicon-plus white ded_menu"></i>
                <?php
                while($result = $query->fetch_assoc())
                    {
                        $year = DecodeYear($result["LsnYear"]);
                        if($prev != $result["LsnYear"])
                            {
                                if(isset($start))
                                    {
                                        $start.="</div>";
                                    }
                                    $start.= "<div class='neg_2 dotorhi_1'><a href='?host=".HOSTNAME."&ac=1&yr=".$result["LsnYear"]."'>".$year."</a> ";
                            }
                        $prev = $result["LsnYear"];
                    }
                    $start.="</div>";
                    echo $start;
            }
            else
                {?>
                <a href='#'>Өмнө үзсэн хичээл байхгүй байна</a> <i class='glyphicon glyphicon-remove white ded_menu'></i><?php 
                }
            }
            
   function DrawTeacherMenu_prev()   
           {
                $query = Get_hicheel::GetTeacherLesson_prev();
                if(mysqli_num_rows($query) > 0)
                    {
                $start = null;
                $prev = 0;
                ?>
                    <a href="?host=<?php echo HOSTNAME; ?>&ac=1">Өмнө зааж байсан хичээлүүд</a> <i class="glyphicon white glyphicon-plus ded_menu"></i>
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
                                    $start.= '<div class="neg_2 dotorhi_1"><a href="'."?host=".HOSTNAME."&ac=1&yr=".$result["LsnYear"].'">'. DecodeYear($result["LsnYear"]).'</a> <i class="glyphicon glyphicon-plus"></i>';
                            }                
                            $middle = "<div class='neg_2 dotorhi_1'><a href='"."?host=".HOSTNAME."&ac=1&li=".$result["LsnID"]."' class='underline_1'>".$result["LsnCd"]."</a></div>";
                            $start.= $middle;
                            $prev = $result["LsnYear"];
                    }
                    echo $start.="</div>";
                    }
                    else
                        {
                        ?><a href='#'>Танд өмнө зааж байсан хичээл алга</a> <i class='glyphicon white glyphicon-remove ded_menu'></i><?php
                        }
           }

           
           
function Draw_left($data,$mode)
{
    $user = User::getInstance();
    $array_odoo = array();
    $total_LsnID = array();
    $prev_LsnTp = array();
    $prev_LsnTm = array();
    $total_LsnCd = array();
    $total_LsnTpNm = array();
    $total_LsnTpID = array();
    $total_LsnTm = array();
    $niit_urt_odoo = 0;
    $prev_LsnID = -1;
    $i=0;
    $j=0;
        while($ugugdul_0 = mysqli_fetch_assoc($data))
            {
            $array_odoo[] = $ugugdul_0;
                if($prev_LsnID == $ugugdul_0["LsnID"])
                    {
                        if(!in_array($ugugdul_0["LsnTpID"], $prev_LsnTp))
                            {
                                $j++;
                                $total_LsnTpNm[$i][$j] = $ugugdul_0["LsnNm_delger"];
                                $total_LsnTpID[$i][$j] = $ugugdul_0["LsnTpID"];
                                $total_LsnTm[$i][$j][] = $ugugdul_0["LsnTm"];
                            }
                            else
                                {
                                    if(!in_array($ugugdul_0["LsnTm"], $prev_LsnTm))
                                        {
                                            $total_LsnTm[$i][$j][] = $ugugdul_0["LsnTm"];
                                        }
                                }
                    }
                    else
                        {
                            $i++;
                            $j=0;
                            $total_LsnCd[$i] = $ugugdul_0["LsnCd"];
                            $total_LsnID[$i] = $ugugdul_0["LsnID"];
                            $total_LsnTpNm[$i][$j] = $ugugdul_0["LsnNm_delger"];
                            $total_LsnTpID[$i][$j] = $ugugdul_0["LsnTpID"];
                            $total_LsnTm[$i][$j][] = $ugugdul_0["LsnTm"];
                            $prev_LsnTm = array();
                            $prev_LsnTp = array();
                        }
            $prev_LsnID = $ugugdul_0["LsnID"];
            $prev_LsnTp[] = $ugugdul_0["LsnTpID"];
            $prev_LsnTm[] = $ugugdul_0["LsnTm"];
            $niit_urt_odoo++;
            }
            if($niit_urt_odoo == 0)
                {
                ?>
                    <a href="#">Хичээлгүй байна</a> <i class="glyphicon glyphicon-remove white ded_menu"></i>
                <?php
                }
                else
                    {
                    ?>
                        <?php 
                            if($mode == 1)
                                {
                        ?>
                    <a href='<?php echo "?host=".HOSTNAME."&ac=2"; ?>'>Энэ жил 
                            <?php 
                                if((int)($user->getUsrTpID()) == 3)
                                    {
                                        echo "зааж";
                                    }
                                    else
                                        {
                                            echo "суралцаж";
                                        }
                            ?>
                                 буй хичээлүүд</a> <i class='glyphicon glyphicon-plus white ded_menu'></i>
                            <?php
                                }
                                else
                                    {
                                    ?>
                                    <a href='#'>Өмнө жил 
                                    <?php 
                                        if((int)($user->getUsrTpID()) == 3)
                                            {
                                                echo "зааж";
                                            }
                                            else
                                                {
                                                    echo "суралцаж";
                                                }
                                    ?>
                                         байсан хичээлүүд</a> <i class='glyphicon white glyphicon-plus ded_menu'></i>
                                    <?php
                                    }
                            $i=1;
                            while(count($total_LsnCd) >= $i)
                                {
                                ?>
                                <div class='neg_2 dotorhi_1'>
                                    <a href="<?php echo "?host=".HOSTNAME."&ac=2&li=".$total_LsnID[$i].""; ?>" class="underline_1">
                                    <?php 
                                        echo $total_LsnCd[$i];
                                    ?>
                                    </a> <i class="glyphicon glyphicon-plus"></i>
                                    <?php 
                                        $j=0;
                                        while(count($total_LsnTpNm[$i]) > $j)
                                            {
                                                ?>
                                            <div class="neg_2 dotorhi_1">
                                                <a href="<?php echo "?host=".HOSTNAME."&ac=2&li=".$total_LsnID[$i]."&lt=".$total_LsnTpID[$i][$j].""; ?>">
                                                    <?php 
                                                        echo $total_LsnTpNm[$i][$j];
                                                    ?>
                                                </a> 
                                                <?php 
                                                if($mode == 1)
                                                {
                                                    if((int)($user->getUsrTpID()) == 3)
                                                    {
                                                ?>
                                                <i class='glyphicon glyphicon-plus'></i>
                                                <?php 
                                                $k=0;
                                                    while(count($total_LsnTm[$i][$j]) > $k)
                                                        {
                                                        ?>
                                                        <div class="neg_2 dotorhi_1">
                                                            <a href="<?php echo "?host=".HOSTNAME."&ac=2&li=".$total_LsnID[$i]."&lt=".$total_LsnTpID[$i][$j]."&lts=".$total_LsnTm[$i][$j][$k].""; ?>">
                                                                <?php 
                                                                    echo DecodePar($total_LsnTm[$i][$j][$k]);
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <?php
                                                        $k++;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                                <?php
                                                $j++;
                                            }
                                    ?>
                                </div>
                                <?php
                                $i++;
                                }
                    }

}

?>
<div class="Left_menu">
    <ul class="nav nav-pills nav-stacked">
        <li class="neg_2 active">
            <?php 
            Draw_left($result_odoo, 1);
            ?>
        </li>
        <li class="neg_2 active">
            <?php 
            if((int)($user->getUsrTpID()) == 3)
                {
                    DrawTeacherMenu_prev();
                }
                else
                    {
                        DrawStudentMenu_prev();
                    }
            ?>
        </li>
        <?php 
            if((int)($user->getUsrTpID()) == 3)
                {
                    echo "<li class='neg_2 active'>";
                    DrawSubMenuReport();
                    echo "</li>";
                }
        ?>
        <li class="neg_2 active">
            <?php DrawSubMenu(); ?>
        </li>
    </ul>
</div>