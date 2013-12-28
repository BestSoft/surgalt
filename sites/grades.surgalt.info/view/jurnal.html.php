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
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/my_function.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/Leftmenu.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/script.js"></script>
        
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <?php include PATH_BASE . '/sites/' . HOSTNAME . '/decode/decode.php'; ?>
        <?php include PATH_BASE.'/sites/'.HOSTNAME."/controller/left_menu_cont.php";?>
        <?php include PATH_BASE.'/sites/'.HOSTNAME."/controller/Spast.cont.php"; ?>
        <?php include PATH_BASE.'/sites/'.HOSTNAME."/controller/Tpast.cont.php"; ?>
        <div id="content" class="container">
            <div class="page-header">
                <h1>Журнал <small>
                    <?php 
                    if($user->getUsrTpID() == 4)
                        {
                            echo "оюутны";
                        }
                        else
                            {
                            echo "багшийн";
                            }
                ?></small></h1>
                
            </div>
            <?php 
                include 'content.php'; 
            ?>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 