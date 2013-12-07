<?php
     if(isset($_GET["Lid"]))
    {
     // Lid - хичээлийн код
     if($_GET["user"] == 3 && $_GET["type"] == 5)
           {require_once PATH_BASE . "/sites/".HOSTNAME."/view/lessondefinition.php";}
     if($_GET["user"] == 4 && $_GET["type"] == 5)
           {require_once PATH_BASE . "/sites/".HOSTNAME."/view/showLdefinition.php";}
     else {
    require_once PATH_BASE . "/sites/".HOSTNAME."/view/studentlessons.php";
    }
    }
    if(isset($_GET["type"]) && $_GET["type"]==edit)
    {
    require_once PATH_BASE . "/sites/".HOSTNAME."/view/lessondefinitionedit.php";
    }    
    
    if (isset($_POST["savebttn"]))
{
	if (isset($_POST["b"]))
//	{
//		$upQuery = "update student set scode='".$_POST["escode"]."', sname='".$_POST["esname"]."', sage=".$_POST["esage"]." where scode='".$_POST["code"]."'";
//		//echo $upQuery; 
//		mysql_query($upQuery);
//		
//		header("Location: index1.php");
//	}
        {   
        $b=$_POST["b"]; 
        echo $b;
        }

 else {
     echo 'a b orj ireegui';
      }
            // require_once PATH_BASE . "/sites/".HOSTNAME."/view/lessondefinition.php"; }

}
?>
<html>
    <head> 
   
        <style>
            .dotorhi_1
            {
                display:none;
            }
            .neg_2
            {
                padding-left: 10px;
            }
            .top{ margin-top: 50px;}
            
            .left{ margin-left: 200px;}
            
        </style>
    </head>
    <body>
<div class="container-fluid top">
     <h3> Хичээлийн самбар</h3>
     <br><br>
<div class="row-fluid">
<div class="span3">
<!--Sidebar content-->
    <?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    Draw::DrawLessonMenu();                    
    ?>
</div>
<div class="span8">
<table class="table table-hover" >
        <tr>
        <td> <a href="">Гарчиг </a> </td>
        <td width="80"> Пүүжээ </td>
        </tr>
        <tr class="error" height="100"><td colspan="2"> Шинэ мэдээний товч тодорхойлолт </td></tr>
        <tr><td> 2013/10/23 2:01</td>
        <td>Нийт 12 <i class="icon-edit"></i></td>
        </tr>
    </table>
    <br>
    <table class="table table-hover" >
        <tr>
        <td> <a href="">Гарчиг </a></td>
        <td width="80"> Пүүжээ </td>
        </tr>
        <tr class="warning" height="100"><td colspan="2"> Шинэ мэдээний товч тодорхойлолт </td></tr>
        <tr><td> 2013/10/23 2:01</td>
        <td>Нийт 12 <i class="icon-edit"></i></td>
        </tr>
    </table>
<script>
$(document).ready(function(){
        $(".neg_2").children("i.icon-plus").click(function(){
            $(this).attr("class","icon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i.icon-minus").attr("class","icon-plus");
        });
    });
</script>
</div>
</div>
</div>
</body>
</html>
