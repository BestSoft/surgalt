<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
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
</style>
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
            echo "<br>";
       echo "<div class='container'>";
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
       echo "</div>";
            
    }      
    Global_1();
    ?>