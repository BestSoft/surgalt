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
if (!isset($_REQUEST["month"]))
    $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"]))
    $_REQUEST["year"] = date("Y");
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];

$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth - 1;
$next_month = $cMonth + 1;

if ($prev_month == 0) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>
<div class="row-fluid">
    <div class="span9">
        <h3>Өнөөдрийн тойм календар харуулах</h3>
        <?php
        include 'week.html.php';
        ?>
    </div>
    <div class="span3">
        <?php include_once PATH_BASE . "/sites/" . HOSTNAME . "/view/list.view.php"; ?>
    </div>
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="POST" action="/surgalt/index.php?host=calendar.surgalt.info&action=1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Шинэ үйл ажиллагаа нэмэх</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Хаах</button>
            <input class="btn btn-primary" type="submit" value="Хадгалах"/>
        </div>
    </form>
</div>