<?php
$user = User::getInstance();
?>
<?php
if (User::getInstance()->isGuest()){
    echo '<button id="btn" class="btn btn-default" style="position: absolute; margin-left: 30%; margin-top: 0.5%"><i class="icon icon-user"></i>Зочин байна!</button>';
}else{
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
    <?php echo '<a href="' . BASE_URL . '/?action=logout" type="button" class="btn">гарах</a>'; ?>
</div>
    </div>
<?php }?>