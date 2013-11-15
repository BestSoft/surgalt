<!DOCTYPE HTML>
<html>
    <head>
        <title>Цахим Сургалтын Систем</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" class="bootstrap" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" class="bootstrap" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" class="bootstrap" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/style.css" />
        <link rel="stylesheet" class="bootstrap" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/bootstrap.css" />
        <link rel="stylesheet" class="bootstrap" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/bootstrap.min.css" />
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/script.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <main class="bs-masthead" id="content" role="main" style="margin-top: 0%; background-color: #eee;">
            <div class="row-fluid" style="height: 494px; margin-top: 7%;">
                <div class="span11" style="margin-left: 50px;">
                    <?php 
                    include_once PATH_BASE."/sites/".HOSTNAME."/controller/calendarCon.php";
                    CalendarControllerClass::checkAction();?>
                </div>
            </div>
        </main>
        <div style="background-color: #eee;">
            <?php include PATH_BASE . '/tpl/footer.php'; ?>
        </div>
    </body>
</html>
 