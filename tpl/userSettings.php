<?php
$user = User::getInstance();
?>
<button id="btn" class="btn btn-default" style="position: absolute; margin-left: 30%; margin-top: 0.5%"><i class="icon icon-user"></i><?php echo " ".$user->getEmail() ?></button>
<div id="Settings" style="display: none; width: 450px;">
<div>
    <img src="<?php echo BASE_URL; ?>/img/avatar.jpg" class="img-polaroid" style="height: 100px;"><br>
    <i><b>Овог нэр:</b> <?php echo $user->getUsrLnm()." ".$user->getUsrNm() ?></i><br>
    <i><b>Е-мэйл:</b> <?php echo $user->getEmail() ?></i><br>
    <i><b>Оюутны код:</b> <?php echo $user->getUsrCd() ?></i><br>
    <i><b>Мэргэжлийн индэкс:</b> D524000</i><br>
    <i><b>Кредит:</b> 118</i><br>
    <i><b>ҮГД:</b> 2.64</i>
    <br>
    <button class="btn btn-default" style="float: right;">
    Гарах
    </button>
</div>
    </div>
