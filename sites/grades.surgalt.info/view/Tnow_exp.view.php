<?php


function Draw_journal_Lsn($lesson_id,$lsntp=NULL,$lsnTm=NULL)
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
    $array_niit_doloohong = array();
    $array_hich_cnt_id = array();
    $summer = array();
    $prev_cnt = array();
    $prev_usr = array();
    $oyuutan_niit_name = array();
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
                        $oyuutan_niit_name[] = $result["UsrNm"];
                        $oyuutan_niit_id[] = $result["UsrID"];
                        $oyuutan_niit_too++;
                    }
                $prev_oyuutan[] = $result["UsrID"];
            }
            $utga = $array_hich_aguulga[0]["LsnNm_1"];
            if(isset($_GET["lt"]))
                {
                    $utga.=" ".$array_hich_aguulga[0]["LsnNm_delger"];
                }
                else
                    {
                        $utga.=" хичээл";
                    }
     ?>
            <div class="garchig"><h3><?php echo $utga." - н дүн"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=2"> > Энэ жил зааж буй хичээлүүд</a>
                <a href="?host=grades.surgalt.info&ac=2&li=<?php echo $array_hich_aguulga[0]["LsnID"]; ?>"> > <?php echo $array_hich_aguulga[0]["LsnCd"]; ?></a>
                <?php 
                    if(isset($_GET["lt"]))
                        {
                            ?>
                                <a href="?host=grades.surgalt.info&ac=2&li=<?php echo $array_hich_aguulga[0]["LsnID"]; ?>&lt=<?php echo $_GET["lt"]; ?>"> > <?php echo $array_hich_aguulga[0]["LsnNm"]; ?></a>
                            <?php
                        }
                ?>
            </div>
     <?php
     if($dun_too == 0 || $oyuutan_niit_too == 0 || $hich_aguulga_too == 0)
         {
            echo "Одоогоор энэ хичээл дээр оюутан алга байна";
         }
         else
             {
        $i = 0;
     echo "<table border='1' class='global_1 mytable table table-bordered'>";
        echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "<td>";
                echo "<input type='text' size='10' name='haih' id='Student_code'>"; // filter heseg end baina 
            echo "</td>";
        echo "</tr>";
        echo "<tr class='table_header'>";
            echo "<td>";
                echo "Д/д";
            echo "</td>";
            echo "<td rowspan='3'>";
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
                echo "<td data_2='";
                    echo $oyuutan_niit_id[$i]."'>";
                    echo $i+1;
                echo "</td>";
                echo "<td data_2='";
                    echo $oyuutan_niit_id[$i]."'  turul='Student_code'>";
                    echo $oyuutan_niit_code[$i];
                echo "</td>";
            echo "</tr>";
                $i++;
            }
         echo "<tr>";
            echo "<td colspan='2'>";
                echo "Авж болох оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2'>";
                echo "Дундаж оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2'>";
                echo "Дээд оноо:";
            echo "</td>";
         echo "</tr>";
         echo "<tr>";
            echo "<td colspan='2'>";
                echo "Доод оноо:";
            echo "</td>";
         echo "</tr>";
     echo "</table>";
     
     echo "<div class='zoodog'><table class='mytable table table-bordered' border='1'>";
        echo "<tr>";
            echo "<td>";                                // Filter heseg end baina 
                echo "<input type='text' size='10' name='haih' id='Student_name'>";
            echo "</td>";
        echo "</tr>";
            echo "<tr class='table_header'>";
                echo "<td rowspan='3' class='First_cell'>";
                    echo "Оюутны нэр";
                echo "</td>";
                echo "<td colspan='".$hich_aguulga_too."'>";
                    echo "Ирцийн оноо";
                echo "</td>";
                echo "<td colspan='".$hich_aguulga_too."'>";
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
                    echo "<td";
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
                echo "<td>";
                    echo $summer[$o];
                echo "</td>";
                $o++;
            }}         
            echo "</tr>";
            $i = 0;
            while($oyuutan_niit_too > $i)
                {
                echo "<tr>";
                echo "<td data_2='";
                    echo $oyuutan_niit_id[$i]."' turul='Student_name'>";
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
                                                        $useg = Lesson::checkTuluv($array_irts[$y]["AttSta"]);
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
                    echo "<td data_2='";
                    echo $oyuutan_niit_id[$i]."'>";
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
                    echo "<td colspan='".$hich_aguulga_too."' rowspan='5'>";
                        
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
                        echo "<td class='average' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  $j = 0;
                  echo "<tr>";
                  while($hich_aguulga_too > $j)
                      {
                        echo "<td class='max_pnt' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  $j = 0;
                  echo "<tr>";
                  while($hich_aguulga_too > $j)
                      {
                        echo "<td class='min_pnt' data-pk='".$array_hich_aguulga[$j]["LsnCntID"]."'>";
                            echo "&nbsp";
                        echo "</td>";
                        $j++;
                      }
                  echo "</tr>";
                  echo "<tr>";
                  $j = 0;
                  while($hich_aguulga_too > $j)
                      {
                      echo "<td>";
                        echo "<a href='?host=".HOSTNAME."&view=report&li=".$_GET["li"]."&lci=".$array_hich_aguulga[$j]["LsnCntID"]."'><input type='button' value='Тайлан' class='btn'></a>";
                      echo "</td>";
                      $j++;
                      }
                  echo "</tr>";
     echo "</table></div>";   
     
     echo "<table class='global_2 mytable table table-bordered' border='1'>";
        echo "<tr>";
            echo "<td>";
                echo "&nbsp";
            echo "</td>";
        echo "</tr>";
        echo "<tr class='table_header'>";
            echo "<td rowspan='3'>";
                echo "Нийт дүн";
            echo "</td>";
            echo "<td rowspan='3'>";
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
                    echo "<td class='total_pnt' data-name='".$oyuutan_niit_id[$i]."' data_2='";
                    echo $oyuutan_niit_id[$i]."'>";
                    echo "</td>";
                    echo "<td data_2='";
                        echo $oyuutan_niit_id[$i]."'>";
                        echo "&nbsp";
                    echo "</td>";
                    echo "<td data_2='";
                    echo $oyuutan_niit_id[$i]."'>";
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
}



?>
<div class="journal">
    <div id="songolt_dun" class="affix">
        <button value='0.5' class='dun btn btn_float' tovch="Ч">Ч</button>
        <button value='0.6' class='dun btn btn_float' tovch="Ө">Ө</button>
        <button value='1' class='dun active btn btn-primary btn_float' tovch="И">И</button>
        <button value='0' class='dun btn btn_float' tovch="Т">Т</button>
    </div>
    <?php 
        $a = Draw_journal_Lsn($lsn_id_need,$lsn_tp_need,$lsn_tm_need);
    ?>
</div>
<script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/my_func.js"></script>
<script>
        $(document).ready(function(){
            $(".dun_2").editable({
                url: 'sites/grades.surgalt.info/ajax/ajax_insert.php',
                title: 'Дүн оруулах',
                success : function()
                {
                     huuchin_utga = (this.value);
                     shine_utga = (this.$input.val());
                     pk = this.settings.pk;
                     name = this.name;
                        rework_average(pk,huuchin_utga,shine_utga);
                        rework_max(pk,huuchin_utga,shine_utga);
                        rework_min(pk,huuchin_utga,shine_utga);
                        rework_total(name,huuchin_utga,shine_utga);
                } 
                }); 
                
        $(".dun").click(function(){
            $(this).siblings().attr("class","dun btn btn_float");
            $(this).addClass("active btn-primary");
        });
        $(".dun_1").click(function(){
            ene = $(this);
            value = $("#songolt_dun .dun.active");
            pk = ene.attr("data_1");
            name = ene.attr("data_2");
            utga = value.val();
            tovch = value.attr("tovch");
            $(this).html("<img src='sites/grades.surgalt.info/ajax/4.gif'>");
            $.ajax({
                url: 'sites/grades.surgalt.info/ajax/my_22.php',
                type: 'POST',
                data: {
                    pk: pk,
                    name: name,
                    onoo: utga,
                    useg: tovch
                },
                success: function(result)
                {
                    ene.text(result);
                },
                fail: function(result)
                {
                    alert(result);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
       <?php 
       $i = 0;
       while($a["niit_aguulga"] > $i)
       {
           echo "Average_my('".$a["niit_cnt_id"][$i]."');";
           echo "Max_my('".$a["niit_cnt_id"][$i]."');";
           echo "Min_my('".$a["niit_cnt_id"][$i]."');";
           $i++;
       } 
       $i=0;
       while($a["niit_oyuutan"] > $i)
           {
                echo "Total_my('".$a["niit_oyuutan_id"][$i]."');";
                $i++;
           }
       ?>
    });
</script>