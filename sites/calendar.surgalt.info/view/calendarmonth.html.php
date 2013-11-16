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
                <h1>Цаглабар <small>сараар</small></h1>
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
                    <table width="100%" border="2" cellpadding="2" cellspacing="2" class="table table-bordered">
                        <tr align="center">
                            <td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth - 1] . ' ' . $cYear; ?></strong></td>
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
                        $timestamp = mktime(0, 0, 0, $cMonth, 1, $cYear);
                        $maxday = date("t", $timestamp);
                        $thismonth = getdate($timestamp);
                        $startday = $thismonth['wday'];
                        $nMonth = $cMonth + 1;
                        $db = DataBase::getInstance();
                        $user = User::getInstance();
                        $sql = "select CalID, StrtDt, EndDt, Title, Tag from calendar where ((StrtDt between '" . $cYear . "/" . $cMonth . "/01' and '" . $cYear . "/" . $nMonth . "/01') or (EndDt between '" . $cYear . "/" . $cMonth . "/01' and '" . $cYear . "/" . $nMonth . "/01')) and TpUsrID =10000000" . $user->getUsrID();
                        $query = $db->query($sql);
                        include PATH_BASE . "/sites/" . HOSTNAME . "/controller/calendarDecode.php";
                        $minii = array();
                        while ($result = mysqli_fetch_assoc($query)) {
                            $minii[] = $result;
                        }
                        for ($i = 0; $i < ($maxday + $startday); $i++) {
                            if (($i % 7) == 0)
                                echo "<tr>";
                            if ($i < $startday)
                                echo "<td></td>";
                            else {
                                echo "<td align='center' valign='middle' height='50px' class='mymodal' day='" . ($i - $startday + 1) . "'><p>" . ($i - $startday + 1) . "</p>";
                                echo "<div id='event'>";
                                $j = 0;
                                $cday = ($i - $startday + 1);
                                if ($cday < 10) {
                                    $cDay = "0" . $cday;
                                } else {
                                    $cDay = $cday;
                                }
                                while (sizeof($minii) > $j) {
                                    $startdate = calendarDecode::convertDate($minii[$j]["StrtDt"]);
                                    $enddate = calendarDecode::convertDate($minii[$j]["EndDt"]);
                                    $now = $cYear . $cMonth . $cDay;
                                    $now = (double) $now;
                                    if ($startdate <= $now && $now <= $enddate) {
                                        echo "<a class='badge' data-toggle='tooltip' data-original-title='" . $minii[$j]["Title"] . "'>" . $minii[$j]["CalID"] . "</a>";
                                    }
                                    $j++;
                                    echo "<br>";
                                }
                                echo "</div>";
                            }
                            echo "</td>";
                            if (($i % 7) == 6)
                                echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarmonth">Сараар</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarweek">7 хоногоор</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarday">Өдрөөр</a></li>
                    </ul>
                    <?php include PATH_BASE . "/sites/" . HOSTNAME . "/view/list.view.php"; ?>
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