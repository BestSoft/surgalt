<?php
  
   if(isset($_GET["url"]))
    {
     if($_GET["url"] == 1)
           {
         require_once PATH_BASE . "/sites/".HOSTNAME."/view/insertlessoncont.php";}
//     else {
//    require_once PATH_BASE . "/sites/".HOSTNAME."/view/studentlessons.php";
////            }
//    }
           
    }
?>
<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <body>
        
       <style>
            .dotorhi_1
            {
                display:none;
            }
            .neg_2
            {
                padding-left: 10px;
            }
            .top{ margin-top: -20px;}
            .left{ margin-left: 200px;}
        </style>
<div class="container-fluid">
    <h4 class='left' > Багийн самбар</h4>
  <div class="row-fluid top">
        <div class="span3">
          <!--Sidebar content-->
        <ul> 
         <li><a href='?host=lesson.surgalt.info&url=1'> Хичээл оруулах</a></li>

         <li><a href="<?php PATH_BASE . "/sites/".HOSTNAME."/view/homeview.php" ?>">Багийн гишүүд</a> </li> 
         <li><a href="">Файлууд</a> </li> 
        </ul>  
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
     
      </div>
      </div>
    </div>
    </body>
</html>
