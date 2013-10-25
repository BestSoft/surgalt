<?php


        //Хичээлийн тухаи бүхий мэдээллийг авдаг класс юм 
        // Model Class


class Lesson
{
    private static $instance;
    private static $user_id;
    private $UsrID;
    private $UsrCd;
    private $UsrTpID;   
    private $errMsg;
    private $db;    
    
    function __construct()
    {
        $user = User::getInstance();
        Lesson::$user_id = $user->getUsrID();
    }
    
    function CheckUserPerm() //Багшийн болон оюутны хичээл мөн эсэх шалгадаг функц 
    {
        
    }
    public static function GetStudentLesson() //Багшийн болон оюутны хичээлүүдийг шүүж авна парамерт ээр жилийн мэдээлэл эсвэл ...
    {         
                        $user = User::getInstance();
                        $user_id = $user->getUsrID();
                        $db = DataBase::getInstance();
                        $sql = "select b.LsnTpID,a.LsnID,a.LsnCd,c.LsnNm,a.isAvailable from lesson a inner join studenttimetable b inner join lessontype c on a.LsnID = b.LsnID and b.LsnTpID = c.LsnID where StdID = ".$user_id." order by a.LsnCd,c.LsnNm";            
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
    public static function GetStudent_grade_min($lesson,$type,$isav)
            {
                    $lesson_type_id = $type;
                    $lesson_id = $lesson;
                    $user = User::getInstance();
                    $user_id = $user->getUsrID();
                    $db = DataBase::getInstance();
                    $isa = $isav;
                    $sql = "select a.Week,c.TpcNm,a.SelfPnt,d.Pnt from lessoncontent a inner join 
            lessoncontenttopic b inner join topic c inner join homework d inner join lesson e on 
            a.LsnCntID = b.LsnCntID and b.TpcID = c.TpcID and a.LsnCntID = d.LsnCntID and e.LsnID = a.LsnID
            where d.StdID = ".$user_id." and a.LsnTpID = ".$lesson_type_id." and a.LsnID = ".$lesson_id." and e.isAvailable = ".$isa." order by a.Week";                    
                    $query = $db->query($sql);
                    return $query;
            }
    public static function GetStudent_grade_mid($lesson)
            {
                    $lesson_id = $lesson;
                    $user = User::getInstance();
                    $user_id = $user->getUsrID();
                    $db = DataBase::getInstance();                    
                    $sql = "select a.Title,a.LsnTpID,a.Week,a.SelfPnt,b.Pnt,c.LsnNm from 
lessoncontent a inner join homework b inner join lessontype c
on a.LsnCntID = b.LsnCntID and a.LsnTpID = c.LsnID where
a.LsnID = ".$lesson_id." and b.StdID = ".$user_id." order by a.LsnTpID";                    
                    $query = $db->query($sql);
                    return $query;
            }
    public static function GetStudent_grade_max()
            {
                    $user = User::getInstance();
                    $user_id = $user->getUsrID();
                    $db = DataBase::getInstance();
                    $sql = "select Distinct b.LsnCd,b.LsnID,b.LsnNm,c.UsrNm,c.UsrCd from 
                        studenttimetable a inner join lesson b inner join user c on
                        a.LsnID = b.LsnID and a.TchID = c.UsrID where 
                        a.StdID = ".$user_id." order by a.LsnID ";
                    $query = $db->query($sql);
                    return $query;
            }
    public static function GetStudent_Grade_isa()
            {
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $user_id = $user->getUsrID();
                            $sql = "select a.Title,b.AttSta,c.Pnt,a.LsnID from 
                                lessoncontent a inner join attendance b inner join 
                                homework c on a.LsnCntID = b.LsnCntID and 
                                a.LsnCntID = c.LsnCntID where b.UsrID = '".$user_id."' order by a.LsnID";
                            $query = $db->query($sql);
                            return $query;
            }
    public static function GetStudentLesson_prev_grade_max()
            {
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $user_id = $user->getUsrID();
                            $sql = "select a.LsnNm,a.LsnCd,a.LsnCrd,a.LsnYear,b.Point70,b.Point30,a.LsnYear from 
                                    lesson a inner join userlesson b on
                                    a.LsnID = b.LsnID where b.UsrID = ".$user_id." and a.isAvailable = 0 and b.RltnID = 2";
                            $query = $db->query($sql);
                            return $query;
            }
    public static function GetStudentLesson_prev_grade_mid($year)
            {
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $user_id = $user->getUsrID();
                            $year_id = $year;
                            $sql = "select a.Point70,a.Point30,b.LsnNm,b.LsnCd,b.LsnCrd from userlesson a inner join 
                                lesson b on a.LsnID = b.LsnID 
                                where a.UsrID = ".$user_id." and a.RltnID = 2 and 
                                b.LsnYear = '".$year_id."' and b.isAvailable = 0";
                            $query = $db->query($sql);
                            return $query;
            }
}

?>
