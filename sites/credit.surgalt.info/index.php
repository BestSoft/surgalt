<!DOCTYPE HTML>
<html>
    <head>
        <title>Цахим Сургалтын Систем</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/sites/credit.surgalt.info/css/bootstrap-editable.css">
        <script src="<?php echo BASE_URL; ?>/sites/credit.surgalt.info/js/bootstrap-editable.min.js"></script> 
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <main class="bs-masthead" id="content" role="main" style="margin-top: 0%; background-color: #eee;">
            <div class="container" style="height: 700px; margin-top: 6%;">
                 <?php include 'home.php'; ?>
            </div>
        </main>
        <div style="background-color: #eee;">
             <?php include PATH_BASE . '/tpl/footer.php'; ?>
        </div>
    </body>
</html> 