<?php
$user = User::getInstance();
?><div class="mini-profile media">
    <a href="#">
        <img src="<?php echo BASE_URL; ?>/img/avatar.jpg" class="media-object" height="100">
    </a>
    <div class="media-body">
        <dl class="dl-horizontal">
            <dt>Овог нэр:</dt><dd><?php echo $user->getUsrLnm() . " " . $user->getUsrNm() ?></dd>
            <dt>Е-мэйл:</dt><dd><?php echo $user->getEmail() ?></dd>
            <dt>Оюутны код:</dt><dd><?php echo $user->getUsrCd() ?></dd>
            <dt>Мэргэжлийн индэкс:</dt><dd>D524000</dd>
            <dt>Кредит:</dt><dd>118</dd>
            <dt>ҮГД:</dt><dd>2.64</dd>
        </dl>
    </div>
</div>