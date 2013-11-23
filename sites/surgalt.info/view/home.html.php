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
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
    <div id="content" class="container">
        <?php if (User::getInstance()->isGuest()) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" class="namefield" tabindex="1" size="18" placeholder="Цахим шуудангийн хаяг">
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span><input type="password" name="password" class="passfield" tabindex="2" size="18" placeholder="Нууц үг">
                </div>
                <button type="submit" tabindex="3" name="signin" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span></button>
                <div id="form-login-remember" class="control-group checkbox">
                    <label for="modlgn-remember" class="control-label"><input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes">Сануулах</label>
                </div>
            </form>
            <?php
        } else {
            $user = User::getInstance();
            echo 'Сайн байна уу, ' . $user->getUsrNm() . '!';
        }
        ?>
    </div>
    <?php include PATH_BASE . '/tpl/footer.php'; ?>
</body>
</html> 