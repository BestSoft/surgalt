<?php
    
    
    Class DrawLeftMenu
{
        public static function DrawLeftMenu_Now()
                {
                    ?>
                    <div class="Menu_tree_form">
                        <?php
                    $user = User::getInstance();
                    $user_perm = $user->getUsrTpID();
                    if($user_perm == 3)
                        {
                            GradePage::DrawTeacherMenu_now();
                            GradePage::DrawTeacherMenu_prev();
                            GradePage::DrawSubMenu();
                        }
                        else
                            {
                                if($user_perm == 1)
                                {
                                    GradePage::DrawTeacherMenu_now();
                                    GradePage::DrawTeacherMenu_prev();
                                    GradePage::DrawSubMenu();
                                }
                                if($user_perm == 4)
                                {
                                    GradePage::DrawStudentMenu_now();
                                    GradePage::DrawStudentMenu_prev();
                                    GradePage::DrawSubMenu();
                                }
                                if($user_perm == 2 || $user_perm == 5)
                                {
                                    echo "Erh";
                                }
                            } 
                            ?>
                        </div>
                                <?php
                }
}
    
    
?>
