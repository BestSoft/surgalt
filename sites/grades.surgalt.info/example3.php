<link rel="stylesheet" href="css/bootstrap.css">
<style>
    .zoodog
    {
        overflow-x: scroll;
    }
    .ehlel
    {
        margin-left: 0px;
    }
    .table_1
    {        
        border-right-color: black;       
    }
    .table_3
    {
        border-left: 1px;
        border-style: solid;
        border-left-color: black;
    }
    .neg_1
    {
        padding-left: 5px;        
    }
    .neg_2
    {
        padding-left: 10px;
    }
    .neg_3
    {
        padding-left: 15px;
    }
    .dotorhi_1
    {
        display: none;
    }
    .ded_menu
    {
        text-decoration: underline;
        font-style: normal;
        font-size: 20px;
    }
</style>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <?php 
                        $ded_menu[0]["title"] = "Өмнө үзэж байсан хичээлүүд";
                        $ded_menu[1]["title"] = "Одоо судалж буй хичээлүүд";
                        $ded_menu[2]["title"] = "Туслах";
                        $ded_menu[0]["url"] = "http://www.1.com";
                        $ded_menu[1]["url"] = "http://www.2.com";
                        $ded_menu[2]["url"] = "http://www.3.com";
                        $dund_menu[0][0]["title"] = "CS200";
                        $dund_menu[0][1]["title"] = "CS2001";
                        $dund_menu[0][2]["title"] = "SE304";
                        $dund_menu[0][0]["url"] = "#";
                        $dund_menu[0][1]["url"] = "#";
                        $dund_menu[0][2]["url"] = "#";
                        $dund_menu[1][0]["title"] = "CS200";
                        $dund_menu[1][1]["title"] = "CS2001";
                        $dund_menu[1][2]["title"] = "SE304";
                        $dund_menu[1][0]["url"] = "#";
                        $dund_menu[1][1]["url"] = "#";
                        $dund_menu[1][2]["url"] = "#";
                        $dund_menu[1][0]["title"] = "CS200";
                        $dund_menu[1][1]["title"] = "CS2001";
                        $dund_menu[1][2]["title"] = "SE304";
                        $dund_menu[1][0]["url"] = "#";
                        $dund_menu[1][1]["url"] = "#";
                        $dund_menu[1][2]["url"] = "#";
                        $dood_menu[0][0][0]["title"] = "Lab";
                        $dood_menu[0][0][0]["url"] = "#";    
                        $dood_menu[0][0][1]["title"] = "Lekts";
                        $dood_menu[0][0][1]["url"] = "#";        
                        $dood_menu[0][0][2]["title"] = "Lekts";
                        $dood_menu[0][0][2]["url"] = "#";
                    
                        function Menu_uusgeh($ded_menu,$dund_menu,$dood_menu)
                    {
                            $i = 0;
                            $j = 0;
                            $k = 0;
                            echo "<div class='Menu_tree_form'>";
                                while($i < sizeof($ded_menu))
                                    {
                                    echo "<div class='neg_2'>";
                                    echo "<a class='ded_menu' href='".$ded_menu[$i]["url"]."'>".$ded_menu[$i]["title"]."</a> <i class='icon-plus'></i>";
                                    while($j < sizeof($dund_menu))
                                        {
                                        echo "<div class='neg_2 dotorhi_1'>";
                                            echo "<a class='dund_menu' href='".$dund_menu[$i][$j]["url"]."'>".$dund_menu[$i][$j]["title"]."</a> <i class='icon-plus'></i>";
                                            while($k < sizeof($dood_menu))
                                                {
                                                echo "<div class='neg_2 dotorhi_1'>";
                                                    echo "<a class='dood_menu' href='".$dood_menu[$i][$j][$k]["url"]."'>".$dood_menu[$i][$j][$k]["title"]."</a> ";
                                                echo "</div>";
                                                    $k++;
                                                }
                                        echo "</div>";
                                            $j++;                        
                                        }
                                    echo "</div>";
                                        $i++;
                                    }
                            echo "</div>";
                    }
                    Menu_uusgeh($ded_menu, $dund_menu, $dood_menu);
                    ?>
            </div>
            <div class="span9">
                <?php 
        function Global_1()
    {
            $i = 1;
            $j = 0;
            $k = 0;
            $h = 1;
            $g = 0;
            $ogogdol = "sw00d00";
            // Байнга байрлах глобал өгөгдөл маань энд байна (Зүүн хэсэг)            
            echo "<div class='span2 global_1 ehlel'>";
                echo "<table class='table table-bordered table_1'>";                    
                    echo "<tr class='global_row_1'>";    
                    while($k < 2)
                        {
                            echo "<td class='global_col_".$k."'>";
                            echo $k;
                            echo "</td>";                                                        
                            $k++;
                        }
                    echo "</tr>";
                while($i<=10)
                    {
                    echo "<tr>";
                            echo "<td>";
                            echo $i;
                            echo "</td>";
                            echo "<td>";
                            echo $ogogdol.$i;
                            echo "</td>";
                    echo "</tr>";
                        $i++;
                    }
                echo "</table>";
            echo "</div>";
            // зөөдөг менү маань одоо эхэлж байна (Дунд хэсэг)
            $j = 0;            
            echo "<div class='span7 zoodog ehlel'>";
                echo "<table class='table table-bordered table_2'>";
                    echo "<tr class='zoodog_row_1'>";
                        while($j<10)
                            {
                                echo "<td>";
                                    echo "Lab - ".$j;
                                echo "</td>";
                                $j++;
                            }
                    echo "</tr>";                                    
                        while($h <= 10)
                            {
                    echo "<tr>";
                            $r = 0;                            
                                while($r < 10)
                                    {
                                        echo "<td>";
                                            echo "content";
                                        echo "</td>";
                                        $r++;
                                    }                                
                    echo "</tr>";
                            $h++;
                            }
                echo "</table>";
            echo "</div>";
                // Баруун талын Global мэнү маань эхэлж байна :)) (Баруун хэсэг)
            $q = 0;
            $z = 0;
            echo "<div class='span2 global_2 ehlel'>";
                echo "<table class='table table-bordered table_3'>";
                    echo "<tr>";    
                        while($q < 2)
                            {
                                echo "<td>";
                                    echo "title";
                                echo "</td>";
                                $q++;
                            }
                    echo "</tr>";
                        while($z < 10)
                            {
                            $t = 0;
                    echo "<tr>";
                            while($t < 2)
                                {
                                echo "<td>";
                                    echo "contnet";
                                echo "</td>";
                                    $t++;
                                }                                
                    echo "</tr>";
                                $z++;
                            }
                echo "</table>";
            echo "</div>";                        
    }      
    Global_1();
    ?>
            </div>
        </div>
    </div>
<script src="js/jquery 1.10.2.js"></script>
<script>
    $(document).ready(function(){
        $(".neg_2").children(".icon-plus").click(function(){
            $(this).attr("class","icon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i").attr("class","icon-plus");
        });
    });
</script>