<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Цахим сургалтын систем</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">  <li><a href="?host=lesson.surgalt.info"><span class="ext mn"></span><i class="icon icon-book"></i> Хичээл</a></li>
            <li><a href="?host=test.surgalt.info"><span class="ext net"></span><i class="icon icon-file"></i> Шалгалт</a></li>
            <li><a href="?host=grades.surgalt.info"><span class="ext mobi"></span><i class="icon icon-ok"></i> Журнал</a></li>
            <li><a href="?host=calendar.surgalt.info"><span class="ext co"></span><i class="icon icon-calendar"></i> Цаглабар</a></li>
            <li><a href="?host=credit.surgalt.info"><span class="ext tv"></span><i class="icon icon-time"></i> Цагийн тооцоо</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            $user = User::getInstance();
            ?>
            <?php if (User::getInstance()->isGuest()) { ?>
                <li><i class="icon icon-user"></i>Зочин байна!</li>
            <?php } else { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><?php echo " " . $user->getEmail() ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php include 'miniProfile.php'; ?></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo BASE_URL; ?>/?action=logout">гарах</a></li>
                    </ul>
                </li>
            <?php } ?>
            <li><a href="#">Тусламж</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div>