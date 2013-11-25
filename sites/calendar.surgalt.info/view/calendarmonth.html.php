<!DOCTYPE HTML>
<html>
    <head>
        <title>Цахим Сургалтын Систем</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-editable.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/style.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-datetimepicker.min.js"></script>
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
                <?php
                    include_once PATH_BASE . "/sites/" . HOSTNAME . "/model/modCalendar.php";
                    /*$timetable = Calendar::selectStudentTimeTable();*/
                    ?>
                <div class="col-md-12">
                    <!--<ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarmonth">Сараар</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarweek">7 хоногоор</a></li>
                        <li><a href="/surgalt/index.php?host=calendar.surgalt.info&view=calendarday">Өдрөөр</a></li>
                    </ul>-->
                    
                    <table width="100%" class="table table-bordered" style="height: 500px;">
                        <tr align="center">
                            <td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth - 1] . ' ' . $cYear; ?></strong><a class="mymodal2" data-toggle='tooltip' data-original-title='Сараар жагсаалт харах' year='".$cYear."' month='".$cMonth."' day='".($i - $startday + 1)."'><span style='float: right;' class='glyphicon glyphicon-align-justify'></span></a></td>
                        </tr>
                        <tr>
                            <div style="position: absolute; margin-top: -20px;">
                            <span class="glyphicon glyphicon-pushpin" style="color: green"> - Хичээлийн цагийн хуваарийн тэмдэглэгээ </span><br>
                            <span class="glyphicon glyphicon-pushpin" style="color: red"> - Хувийн тэмдэглэл, үйл ажиллагааний тэмдэглэгээ</span><br>
                            <span class="glyphicon glyphicon-pushpin" style="color: blue"> - Нийтийн үйл ажиллагааны тэмдэглэгээ</span>
                            </div>
                            <ul class="pager" style="float: right;">
                                <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $prev_month . "&year=" . $prev_year; ?>">Өмнөх сар</a></li>
                                <li><a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $next_month . "&year=" . $next_year; ?>">Дараа сар</a></li>
                            </ul>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Ням&nbsp;&nbsp;&nbsp;</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Даваа&nbsp;</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Мягмар</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Лхагва</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Пүрэв</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Баасан</strong></td>
                            <td align="center" bgcolor="#999999" style="color:#FFFFFF;"><strong>Бямба</strong></td>
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
                        $calendarsql = "select CalID, Location, StrtDt, EndDt, Title, Tag from calendar where ((StrtDt between '" . $cYear . "/" . $cMonth . "/01' and '" . $cYear . "/" . $nMonth . "/01') or (EndDt between '" . $cYear . "/" . $cMonth . "/01' and '" . $cYear . "/" . $nMonth . "/01')) and TpUsrID =".$user->getUsrTpID() ."0000000" . $user->getUsrID();
                        $query = $db->query($calendarsql);
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
                                echo "<td class='dayselect' align='center' valign='middle' height='120px' width='120px'><p>" . ($i - $startday + 1);
                                echo "<a data-toggle='tooltip' data-original-title='Үйл ажиллагаа нэмэх'><span style='float:left;' class='glyphicon glyphicon-plus mymodal' day='".($i - $startday + 1)."'></span></a>";
                                echo "<a class='mymodal1' data-toggle='tooltip' data-original-title='Жагсаалт хэлбэрээр харах' year='".$cYear."' month='".$cMonth."' day='".($i - $startday + 1)."'><span style='float: right;' class='glyphicon glyphicon-align-justify'></span></a></p>";
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
                                        echo "<a class='glyphicon glyphicon-pushpin privateevent' data-toggle='tooltip' data-original-title='" . $minii[$j]["Title"] . " => " . $minii[$j]["Location"] . "' >"." ".$minii[$j]["Title"]."</a>";
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
                <!--<div class="col-md-3">
                    <?php include PATH_BASE . "/sites/" . HOSTNAME . "/view/listview.php"; ?>
                </div>-->
            </div>
            <div id="myModal" class="modal fade">
                <form class="form-horizontal" role="form" method="POST" action="/surgalt/index.php?host=calendar.surgalt.info&action=1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Үйл ажиллагаа оруулах</h4>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                      <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </form>
              </div>
            
            <div id="myModal1" class="modal fade">
                <form class="form-horizontal" role="form" method="POST" action="/surgalt/index.php?host=calendar.surgalt.info&action=1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Тухайн өдрийн үйл ажиллагаа</h4>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </form>
              </div>
            
            <div id="myModal2" class="modal fade">
                <form class="form-horizontal" role="form" method="POST" action="/surgalt/index.php?host=calendar.surgalt.info&action=1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Тухайн Сарын үйл ажиллагаа</h4>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </form>
              </div>
            
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html>