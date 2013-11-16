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
        <main class="bs-masthead" id="content" role="main" style="margin-top: 0%; background-color: #eee;">
            <div class="container" style="height: 700px; margin-top: 6%;">
                 <?php include $include; ?>
            </div>
        </main>
        <div style="background-color: #eee;">
             <?php include PATH_BASE . '/tpl/footer.php'; ?>
        </div>
    </body>
</html> 