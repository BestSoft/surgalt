<?php


        //Хичээлийн тухаи бүхий мэдээллийг авдаг класс юм 
        // Model Class


class Lesson
{
    private static $instance;
    private $UsrID;
    private $UsrCd;
    private $UsrTpID;   
    private $errMsg;
    private $db;    
    
    
    function CheckUserPerm() //Багшийн болон оюутны хичээл мөн эсэх шалгадаг функц 
    {
        
    }
    public static function GetStudentLesson() //Багшийн болон оюутны хичээлүүдийг шүүж авна парамерт ээр жилийн мэдээлэл эсвэл ...
    {         
                        $user = User::getInstance();
                        $user_id = $user->getUsrID();
                        $db = DataBase::getInstance();
                        $sql = "select b.LsnTpID,a.LsnID,a.LsnCd,c.LsnNm from lesson a inner join studenttimetable b inner join lessontype c on a.LsnID = b.LsnID and b.LsnTpID = c.LsnID where StdID = ".$user_id." order by a.LsnCd,c.LsnNm";            
                        $query = $db->query($sql);                        
                        return $query;
    }
    public static function GetTeacherLesson()
            {
                        $user = User::getInstance();
                        $user_id = $user->getUsrID();
                        $db = DataBase::getInstance();
                        $sql = "select a.LsnID,a.LsnTm,a.TchID,a.LsnTpID,b.LsnNm,c.LsnCd,c.LsnYear from teachertimetable a inner join lessontype b inner join lesson c on b.LsnID = a.LsnTpID and a.LsnID = c.LsnID where a.TchID = ".$user_id." order by c.LsnCd,a.LsnTpID";
                        $query = $db->query($sql);
                        return $query;
                        
            }
    public static function GetStudentLesson_prev()
            {
                $user = User::getInstance();
                $user_id = $user->getUsrID();
                $user_type = $user->getUsrTpID();
                if($user_type == 3)
                    {
                        $user_rlt = 1;
                    }
                    else 
                        {
                            $user_rlt = 2;
                        }
                $db = DataBase::getInstance();
                $sql = "select a.LsnCd,a.LsnID,a.LsnYear from lesson a inner join userlesson b on a.LsnID = b.LsnID where b.UsrID = ".$user_id." and a.isAvailable = 0 and b.RltnID = ".$user_rlt." order by a.LsnYear";
                $query = $db->query($sql);
                return $query;
            } 
    public static function GetTeacherLesson_prev()
            {
                $user = User::getInstance();
                $user_id = $user->getUsrID();
                $user_type = $user->getUsrTpID();
                if($user_type == 3)
                    {
                        $user_rlt = 1;
                    }
                    else 
                        {
                            $user_rlt = 2;
                        }
                $db = DataBase::getInstance();
                $sql = "select b.LsnCd,b.LsnYear,b.LsnID from userlesson a inner join 
                    lesson b on a.LsnID = b.LsnID where 
                    a.RltnID = ".$user_rlt." and a.UsrID = ".$user_id." and b.isAvailable = 0 order by b.LsnYear";
                $query = $db->query($sql);
                return $query;
            }           
}

?>
