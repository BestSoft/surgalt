<link rel="stylesheet" href="css/bootstrap.css">
<style>
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
?>



<?php 
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