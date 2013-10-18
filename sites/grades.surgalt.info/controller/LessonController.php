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
                        }
                        else
                            {
                                if($user_perm == 1)
                                {
                                    GradePage::DrawTeacherMenu_now();
                                }
                                if($user_perm == 4)
                                {
                                    GradePage::DrawStudentMenu_now();
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
