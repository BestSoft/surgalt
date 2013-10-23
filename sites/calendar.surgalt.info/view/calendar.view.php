<?php
$monthNames = Array("Нэгдүгээр сар", 
                    "Хоёрдугаар сар", 
                    "Гуравдугаар сар", 
                    "Дөрөвдүгээр сар", 
                    "Тавдугаар", 
                    "Зуравдугаар", 
                    "Долдугаар сар", 
                    "Наймдугаар сар", 
                    "Есдүгээр сар", 
                    "Аравдугаар сар", 
                    "Арваннэгдүгээр сар", 
                    "Арванхоёрдугаар сар");
?>
<?php
if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
?>
<?php
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>
<a class="btn" href="<?php echo BASE_URL."?host=calendar.surgalt.info" . "&month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Өмнөх сар</a>
<a class="btn" href="<?php echo BASE_URL."?host=calendar.surgalt.info" . "&month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Дараагийн сар</a> 

<table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered">
 

<tr align="center">
<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
</tr>
<tr>
    <td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Ням&nbsp;&nbsp;&nbsp;</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Даваа&nbsp;</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Мягмар</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Лхагва</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Пүрэв</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Баасан</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Бямба</strong></td>
</tr>
<?php 
$link = BASE_URL;
$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>";
    if($i < $startday) echo "<td></td>";
    else echo "<td align='center' valign='middle' height='50px'><a class='mymodal' link='".$link."' day='".($i - $startday + 1)."' href='#'><p style='font-size: xx-large;'>". ($i - $startday + 1) . "</p></a></td>";
    if(($i % 7) == 6 ) echo "</tr>";
}
?>
</table>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Шинэ үйл ажиллагаа нэмэх</h3>
  </div>
  <div class="modal-body">
    <p>
        <?php include 'event.html.php';?>
    </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Хаах</button>
    <button class="btn btn-primary">Хадгалах</button>
  </div>
</div>
    