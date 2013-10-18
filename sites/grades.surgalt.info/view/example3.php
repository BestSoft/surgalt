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
        margin-right: 0px;
    }
    .table_3
    {
        border-left: 1px;
        border-style: solid;
        border-left-color: black;
        margin-right: 0px;
    }
    .neg_2
    {
        padding-left: 5px;
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
        font-size: 12px;
    }
    .container-fluid
    {
        margin-top: 100px;
    }
    .table
    {
        margin-bottom: 0px;
        border-radius: 0px 0px 0px 0px;
    }
    .row-fluid
    [class*="span"]
    {
        margin-left: 0px;
    }
    .journal
    {
        margin-left: 20px;
    }
</style>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <?php 
                    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php"; 
                    DrawLeftMenu::DrawLeftMenu_Now();                    
                ?>
            </div>
            <div class="span8">
            <div class="journal">
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