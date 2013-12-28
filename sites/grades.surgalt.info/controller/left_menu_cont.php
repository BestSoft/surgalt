<?php 
include PATH_BASE.'/sites/'.HOSTNAME."/model/Left_menu.model.php";
    class LeftMenuCont
    {
        Public static function DrawLeftMenu()
                {
                     $get_hicheel = Get_hicheel::getInstance();
                     $result_odoo = $get_hicheel->odoo_suraltsaj(1);
                     $user = User::getInstance();
                     include PATH_BASE.'/sites/'.HOSTNAME."/view/Lmenu.view.php";
                }
    }
?>