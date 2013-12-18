<?php
class Draw
{
public static function DrawLessonMenu()
        {
            echo "<div class='Menu_tree_form'>";
            $user = User::getInstance();
            $user_perm = $user->getUsrTpID();
            // Хэрэглэгчийн төрөл шалгах
            // 3 = 
            // 4 = 
            // 1 =
                        
            if($user_perm == 3)
            {       
            $user_id = $user->getUsrID();
            $query = LessonContentModel::GetTeacherLesson($user_id);
            }
            else
                            {
                                if($user_perm == 1)
                                {
                                   $user_id = $user->getUsrID();
                                   $query = LessonContentModel::GetUserLesson_name($user_id);
                                }
                                if($user_perm == 4)
                                {
                                   $user_id = $user->getUsrID();
                                   $query = LessonContentModel::GetUserLesson_name($user_id);                                  
                                }
                                else
                                {
                                    echo "Хичээл хэсэгт нэвтрэх эрхгүй байна.";
                                }
                            }
             echo "<div>";
            while($result = mysqli_fetch_assoc($query))
                {
                $a= $result["LsnCd"];
                        echo "<div class='neg_2'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessonInstance&Lid=$a'>";
                        echo $result["LsnCd"];
                        echo "</a><i class='glyphicon glyphicon-chevron-right'></i>";
                  
                        echo "<div class='neg_2 dotorhi_1'><a href='?host=lesson.surgalt.info&Lid=$a'>";
                        echo 'Хичээлүүд';
                        echo "</a></div>";
                
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Шинэ мэдээ';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Оюутнууд';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Бүх файлууд';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href='?host=lesson.surgalt.info&Lid=$a&type=5&user=$user_perm'>";
                        echo 'Хичээлийн тодорхойлолт';
                        echo "</a></div>";
                        
                        echo "</div>";
                       
                }
                echo "</div>";
            echo "</div>";
            
            
        }
        
        public static function DrawLessonInstanceMenu()
        {
            echo "<div class='Menu_tree_form'>";
            $user = User::getInstance();
            $user_perm = $user->getUsrTpID();
     
           
            
            // Хэрэглэгчийн төрөл шалгах
            // 3 = Багш
            // 4 = Оюутан
            // 1 = Админ
                        
            if($user_perm == 3)
            {       
            $user_id = $user->getUsrID();
            $query = LessonContentModel::GetTeacherLesson($user_id);
            $view='teacherlessoncontent';
            }
            else
                            {
                                if($user_perm == 1)
                                {
                                   $user_id = $user->getUsrID();
                                   $query = LessonContentModel::GetUserLesson_name($user_id);
                                    $view='teacherlessoncontent';
                                }
                                if($user_perm == 4)
                                {
                                   $user_id = $user->getUsrID();
                                   $query = LessonContentModel::GetUserLesson_name($user_id);     
                                   $view='showlessoncontent';
                                }
                                else
                                {
                                    echo "Хичээл хэсэгт нэвтрэх эрхгүй байна.";
                                }
                            }
             echo "<div>";
            
           
             $result = mysqli_fetch_assoc($query);
                    
                      $i = 1;
                    while($i<17){
                    $a= $result["LsnCd"];
                    // 1 - Лаб
                    // 2 - Лекц
                    // 3 - Семинар
                    // 4 - Бие даалт
                            echo "<div class='neg_2'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessonInstance&Lid=$a'>";
                            echo $i.'-р долоо хоног';
                            echo "</a><i class='glyphicon glyphicon-chevron-right'></i>";

                            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=2'>";
                            echo 'Лекц';
                            echo "</a></div>";

                            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=3'>";
                            echo 'Семинар';
                            echo "</a></div>";

                            echo "<div class='neg_2 dotorhi_1'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=$view&Lid=$a&wk=$i&ltype=1'>";
                            echo 'Лабортори';
                            echo "</a></div>";               
                            echo "</div>";
                       $i++;
                    
             }
                    
                 
                echo "</div>";
            echo "</div>";
            
            
        }
        
        public static function DrawStudentLessonpartMenu()
        {
            echo "<div class='Menu_tree_form'>";
//            $user = User::getInstance();
//            $user_id = $user->getUsrID();
//            $query = LessonContentModel::GetUserLesson_name($user_id);
             echo "<div>";
//            while($result = mysqli_fetch_assoc($query))
//                {
//                $a= $result["LsnCd"];
                        echo "<div class='neg_2'><a href=''>";
                        echo '1-р долоо хоног';
                        echo "</a><i class='icon-plus'></i>";
                  
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Лекц';
                        echo "</a></div>";
                
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Лабортори';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Семинар';
                        echo "</a></div>";
                                              
                        echo "</div>";
                            echo "<div class='neg_2'><a href=''>";
                        echo '2-р долоо хоног';
                        echo "</a><i class='icon-plus'></i>";
                  
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Лекц';
                        echo "</a></div>";
                
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Лабортори';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Семинар';
                        echo "</a></div>";
                                              
                        echo "</div>";
                       
//                }
                echo "</div>";
            echo "</div>";
            
        }
        
         
        public static function Drawstudentgroupmenu()
        {
            echo "<div class='Menu_tree_form'>";
            $user = User::getInstance();
            $user_perm = $user->getUsrTpID();
            // Хэрэглэгчийн төрөл шалгах
            // 3 = 
            // 4 = 
            // 1 =
           echo "<div>";
            
                        echo "<div class='neg_2'><a href='/surgalt/index.php?host=lesson.surgalt.info&view=lessonInstance'>";
                        echo '-р долоо хоног';
                        echo "</a><i class='glyphicon glyphicon-chevron-right'></i>";
                  
                        echo "<div class='neg_2 dotorhi_1'><a href='?host=lesson.surgalt.info&Lid=$a'>";
                        echo 'Лекц';
                        echo "</a></div>";
                
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Семинар';
                        echo "</a></div>";
                        
                        echo "<div class='neg_2 dotorhi_1'><a href=''>";
                        echo 'Лабортори';
                        echo "</a></div>";               
                        echo "</div>";
             
                echo "</div>";
            echo "</div>";
            
            
        }
        
         public static function getcon()
        {
          //  $user = User::getInstance();
         //   $user_perm = $user->getUsrTpID();
           // $user_id = $user->getUsrID();
            $query = LessonContentModel::GetContent();
            echo $query;
            
            }
  
}


?>
