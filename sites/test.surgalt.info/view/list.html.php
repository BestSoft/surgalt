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
        <div class="container" style="height: 700px; margin-top: 82px;">

            <p></p>
            <p></p>
            <?php if (User::getInstance()->isGuest()) {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" class="namefield" tabindex="1" size="18" placeholder="Цахим шуудангийн хаяг">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-key"></i></span><input type="password" name="password" class="passfield" tabindex="2" size="18" placeholder="Нууц үг">
                    </div>
                    <button type="submit" tabindex="3" name="signin" class="btn btn-primary"><i class="icon-arrow-right"></i></button>
                    <div id="form-login-remember" class="control-group checkbox">
                        <label for="modlgn-remember" class="control-label"><input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes">Сануулах</label>
                    </div>
                </form>
                <?php
            } else {
                ?>
                <h1><?php echo $this->title; ?></h1>
                <div class="items">
                    <?php foreach ($this->lessons as $lesson) { ?>
                        <div>
                            <?php echo $lesson['LsnNm']; ?>
                        </div>
                        <?php foreach ($this->tests['LsnID'] as $test) { ?>
                            <div>
                                <?php echo $test['TstNm']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </main>
    <div style="background-color: #eee;">
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </div>
</body>
</html> 