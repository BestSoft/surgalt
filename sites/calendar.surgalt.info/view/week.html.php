<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="btn-group">
            <a href="/surgalt/index.php?host=calendar.surgalt.info&m=view"><button class="btn">Сараар</button></a>
            <a href="/surgalt/index.php?host=calendar.surgalt.info&w=view"><button class="btn">7 хоногоор</button></a>
            <a href="/surgalt/index.php?host=calendar.surgalt.info&d=view"><button class="btn">Өдрөөр</button></a>
        </div>
        <a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $prev_month . "&year=" . $prev_year; ?>" style="float: right;">Өмнөх 7 хоног</a>
        <a class="btn" href="<?php echo BASE_URL . "?host=calendar.surgalt.info" . "&month=" . $next_month . "&year=" . $next_year; ?>" style="float: right;">Дараа 7 хоног</a>
        <?php
        
        ?>
        <table class="table table-hover">
            <?php for($m=0; $m<20; $m++) {
                $week_time = 6;
                
                ?>
            <tr>
                <td><?php
                if($m == 0){
                    echo 'Цаг';
                }
                else{
                    echo $week_time + $m;
                }
                ?></td>
                <?php
                for($d=0; $d<7; $d++)
                {
                ?>
                <td width="150">
                    <?php
                    if($m == 0){
                        switch ($d) {
                            case 0:
                        echo 'Даваа';
                            break;
                            case 1:
                        echo 'Мягмар';
                            break;
                            case 2:
                        echo 'Лхагва';
                            break;
                            case 3:
                        echo 'Пүрэв';
                            break;
                            case 4:
                        echo 'Баасан';
                            break;
                            case 5:
                        echo 'Бямба';
                            break;
                            case 6:
                        echo 'Ням';
                            break;
                    }}
                    ?>
                </td>
                <?php
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>
