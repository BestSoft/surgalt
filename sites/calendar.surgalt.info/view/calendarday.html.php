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
                <h1>Цаглабар <small>өдрөөр</small></h1>
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
                        <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $prev_month . "&year=" . $prev_year; ?>">Өмнөх өдөр</a></li>
                        <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $next_month . "&year=" . $next_year; ?>">Дараа өдөр</a></li>
                    </ul>
                    <table Class="table table-hover">
                        <thead>
                        <tr>
                            <td><b>Дугаар</b></td>
                            <td><b>Гарчиг</b></td>
                            <td><b>Хаана</b></td>
                            <td><b>Хамрах хугацаа</b></td>
                            <td><b>Тайлбар</b></td>
                        </tr>
                        </thead>
                        <tr>
                            <td>Дугаар 1</td>
                            <td>Гарчиг 1</td>
                            <td>Хаана 1</td>
                            <td>Хамрах хугацаа 1</td>
                            <td>Тайлбар 1</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarmonth">Сараар</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarweek">7 хоногоор</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarday">Өдрөөр</a></li>
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