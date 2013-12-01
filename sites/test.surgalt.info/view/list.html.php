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
        <div id="content" class="container">
            <div class="page-header">
                <h1><?php echo $this->title; ?></h1>
            </div>
            <?php if (User::getInstance()->isGuest()) { ?>
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
            <?php } else { ?>
                <div class="items">
                    <?php foreach ($this->lessons as $lesson) { ?>
                        <h3 class="lsn-<?php echo $lesson['LsnID']; ?>">
                            <?php echo $lesson['LsnNm']; ?>
                        </h3>
                    <p>Энэ хичээлд нийт <a href="<?php echo BASE_URL; ?>/?host=<?php echo HOSTNAME; ?>&view=question&lsnId=<?php echo $lesson['LsnID']; ?>"><?php echo $lesson['QstCnt']; ?> асуулт</a> оруулсан байна.</p>
                        <?php
                        if (array_key_exists($lesson['LsnID'], $this->tests)) {
                            foreach ($this->tests[$lesson['LsnID']] as $test) {
                                ?>
                                <div>
                                    <strong><?php echo $test['TstNm']; ?></strong> нь
                                    <strong><?php echo $test['Duration']; ?></strong> минут үргэлжилэх бөгөөд нийт
                                    <strong><?php echo $test['Pnt']; ?></strong> оноотой. Дээд талын оноог
                                    <strong><?php echo $test['Line']; ?></strong> оноогоор таслаж
                                    <strong><?php echo $test['PerPnt']; ?></strong> оноо руу хувилна.
                                    <strong><?php echo $test['Status']; ?></strong>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 