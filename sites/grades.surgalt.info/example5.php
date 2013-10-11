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
</style>
<!--<div class="span3 ehlel">
<table class="table table-striped">
    <div class="global_table">
    <tr>
        <td>
            ssssss
        </td>
        <td>
            sss
        </td>
    </tr>
    <tr>
        <td>
            ssssss
        </td>
        <td>
            sss
        </td>
    </tr>
</table>
</div>
    <div class="span5 ehlel" id="zoodog">
        <table class="table table-striped">
        <tr>
            <td>
                ssasldkjasdlkjasdlkjasdlkasdjlasd
            </td>
            <td>
                ssasdklasjdlkasjdklasjda
            </td>
            <td>
                sssalkdjaskldjaslkdja
            </td>
            <td>
                sss;adlka;sldkasl;dkas
            </td>
            <td>
                ssaklsdjlaksdjal;sd
            </td>
            <td>
                ss;lsakd;lasdk;
            </td>
        </tr>
        <tr>
            <td>
                10
            </td>
            <td>
                10
            </td>
            <td>
                10
            </td>
            <td>
                10
            </td>
            <td>
                10
            </td>
            <td>
                10
            </td>
        </tr>          
        </table>
    </div>
    <div class="span5 ehlel">
        <table class="table table-striped">
        <tr>
            <td>
                ss
            </td>
            <td>
                ss
            </td>
            <td>
                ss
            </td>
        </tr>
        </table>
    </div>-->

    
    <?php 
        function Global_1()
    {
            $i = 1;
            $j = 0;
            $k = 0;
            $ogogdol = "sw00d00";
            // Байнга байрлах глобал өгөгдөл маань энд байна (Зүүн хэсэг)
            echo "<div class='span3 global_1 ehlel'>";
                echo "<table class='table table-striped table_1'>";
                    echo "<tr class='global_row_1'>";
                        echo "<td class='global_col_1'>ss";
                        echo "</td>";
                        echo "<td class='global_col_2'>ss";
                        echo "</td>";
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
            echo "<div class='span5 zoodog ehlel'>";
                echo "<table class='table table-striped table_2'>";
                    echo "<tr class='zoodog_row_1'>";
                        echo "<td class='global_col_1'>ss";
                        echo "</td>";
                        echo "<td class='global_col_2'>ss";
                        echo "</td>";
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
            
    }      
    Global_1();
    ?>