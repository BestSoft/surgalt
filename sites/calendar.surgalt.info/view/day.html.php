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
            <?php
            
            ?>
        </table>
    </body>
</html>
