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
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
    </head>
    <body>
        <div class="panel-heading">
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
            </div>
    <div id="content" class="container">
        <img src="<?php echo BASE_URL; ?>/images/main.png" style="margin-left: 23%;">
        <?php if (User::getInstance()->isGuest()) {
            ?>
        <form class="form-inline" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-left: 25%; ">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Цахим хаяг</label>
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Цахим хаяг" name="email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="exampleInputPassword2">Нууц үг</label>
              <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Нууц үг" name="password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Сануулах
              </label>
            </div>
            <button type="submit" class="btn btn-default">Нэвтрэх</button>
        </form>
            <?php
        } else {
            $user = User::getInstance();
            echo '<div style="margin-left: 40%;"><h3><small>Сайн байна уу,</small> ' . $user->getUsrNm() . '!</h3></div>';
        }
        ?>
    </div>
        <div class="panel-footer" style="margin-top: 0%;"><?php include PATH_BASE . '/tpl/footer.php'; ?></div>
    
</body>
</html> 