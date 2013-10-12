<?php
$user = User::getInstance();
?>

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
