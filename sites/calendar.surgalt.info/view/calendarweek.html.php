<!DOCTYPE HTML>
<html>
    <head>
        <title>Цахим Сургалтын Систем</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-editable.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/style.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/script.js"></script>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <div class="page-header">
                <h1>Цаглабар <small>долоо хоногоор</small></h1>
            </div>
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
            <div class="row">
                <div class="col-md-9">
                    <ul class="pager">
                        <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $prev_month . "&year=" . $prev_year; ?>">Өмнөх 7 хоног</a></li>
                        <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $next_month . "&year=" . $next_year; ?>">Дараа 7 хоног</a></li>
                    </ul>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td><b>Цаг</b></td>
                                <td><b>Даваа</b></td>
                                <td><b>Мягмар</b></td>
                                <td><b>Лхагва</b></td>
                                <td><b>Пүрэв</b></td>
                                <td><b>Баасан</b></td>
                                <td><b>Бямба</b></td>
                                <td><b>Ням</b></td>
                            </tr>
                        </thead>
                        <?php
                        for($i=7; $i<21; $i++){
                        ?>
                        <tr>
                            <td><?php echo $i.":00";?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarmonth">Сараар</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarweek">7 хоногоор</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarday">Өдрөөр</a></li>
                    </ul>
                    <?php include_once PATH_BASE . "/sites/" . HOSTNAME . "/view/listview.php"; ?>
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
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html>