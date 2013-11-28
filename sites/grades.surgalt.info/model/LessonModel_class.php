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
                        $sql = "select b.LsnTpID,a.LsnID,a.LsnCd,c.LsnNm_delger,a.isAvailable from lesson a inner join studenttimetable b inner join lessontype c on a.LsnID = b.LsnID and b.LsnTpID = c.LsnID where StdID = ".$user_id." order by a.LsnCd,c.LsnNm";            
                        $query = $db->query($sql);                        
                        return $query;
    }
    public static function GetTeacherLesson()
            {
                        $user = User::getInstance();
                        $user_id = $user->getUsrID();
                        $db = DataBase::getInstance();
                        $sql = "select a.LsnID,a.LsnTm,a.TchID,a.LsnTpID,b.LsnNm_delger,c.LsnCd,c.LsnYear,c.LsnNm from teachertimetable a inner join lessontype b inner join lesson c on b.LsnID = a.LsnTpID and a.LsnID = c.LsnID where a.TchID = ".$user_id." order by c.LsnCd,a.LsnTpID";
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
                    $sql = "select a.`Pnt`,b.`Week`,b.`SelfPnt`,b.`Title`,c.`LsnNm`,c.`LsnCd`,d.`LsnNm_delger` from ((homework a inner join 
lessoncontent b on a.`LsnCntID` = b.`LsnCntID`) inner join lesson c on b.`LsnID` = c.`LsnID`)
inner join lessontype d on d.`LsnID` = b.`LsnTpID`
where b.`LsnID` = ".$lesson_id." and b.`LsnTpID` = ".$lesson_type_id." and c.`isAvailable` = ".$isa." 
and a.`StdID` = ".$user_id."
order by b.`Week`";
                    $query = $db->query($sql);
                    return $query;
            }
    public static function GetStudent_grade_mid($lesson)
            {
                    $lesson_id = $lesson;
                    $user = User::getInstance();
                    $user_id = $user->getUsrID();
                    $db = DataBase::getInstance();                    
                    $sql = "select a.`Pnt`,b.`Title`,b.`Week`,b.`SelfPnt`,c.`LsnNm`,c.`LsnCd`,d.`LsnNm_delger` from ((homework a inner join lessoncontent b on a.`LsnCntID`=b.`LsnCntID`)inner join lesson c 
on c.`LsnID`=b.`LsnID`) inner join lessontype d on d.`LsnID` = b.`LsnTpID`
where a.`StdID` = ".$user_id." and b.`LsnID` = ".$lesson_id."
order by b.`Week`";                    
                    $query = $db->query($sql);
                    return $query;
            }
    public static function GetStudent_grade_max()
            {
                    $user = User::getInstance();
                    $user_id = $user->getUsrID();
                    $db = DataBase::getInstance();
                    $sql = "select a.`Pnt`,c.`LsnNm`,d.UsrCd,d.UsrNm,c.`LsnNm`,c.`LsnID`,c.LsnCd from ((homework a inner join lessoncontent b on a.`LsnCntID`=b.`LsnCntID`)inner join lesson c on c.`LsnID`=b.`LsnID`
)inner join user d on d.UsrID = a.`InsID`
where a.`StdID` = ".$user_id."
order by b.`LsnID`";
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
     public static function GetTeacherLesson_now_grade_min_1($lsnid,$type,$lsntm)
             {
                            $lesson_id = $lsnid;
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $teacher_id = $user->getUsrID();
                            $type_id = $type;
                            $lsntm_id = $lsntm;
                            $sql = "select a.LsnID, b.Week, a.LsnTpID, c.LsnNm, a.StdID,d.Pnt,e.UsrNm,e.UsrCd,b.LsnCntID from (studenttimetable a 
                                    left join lessoncontent b on a.LsnID = b.LsnID and a.LsnTpID = b.LsnTpID
                                    left join lessontype c on c.LsnID = a.LsnTpID 
                                    left join homework d on b.LsnCntID = d.LsnCntID and a.StdID = d.StdID)
                                    inner join user e on e.UsrID = a.StdID
                                    where a.TchID = ".$teacher_id." and a.LsnTm = ".$lsntm_id." and a.LsnID = ".$lesson_id." and a.LsnTpID = ".$type_id." 
                                    order by b.Week,a.StdID";
                            $query = $db->query($sql);
                            return $query;
                            
             }
     public static function GetTeacherLesson_now_grade_min($lsnid,$type)
             {
                            $lesson_id = $lsnid;
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $teacher_id = $user->GetUsrID();
                            $type_id = $type;
                            $sql = "select a.LsnID, b.Week, a.LsnTpID, c.LsnNm, a.StdID,d.Pnt,e.UsrNm,e.UsrCd,b.LsnCntID from (studenttimetable a 
                                    left join lessoncontent b on a.LsnID = b.LsnID and a.LsnTpID = b.LsnTpID
                                    left join lessontype c on c.LsnID = a.LsnTpID 
                                    left join homework d on b.LsnCntID = d.LsnCntID and a.StdID = d.StdID)
                                    inner join user e on e.UsrID = a.StdID
                                    where a.TchID = ".$teacher_id." and a.LsnID = ".$lesson_id." and a.LsnTpID = ".$type_id."
                                    order by b.Week,a.StdID
                                    ";
                            $query = $db->query($sql);
                            return $query;;
             }
      public static function GetTeacherLesson_now_grade_mid($lsnid)
             {
                            $lesson_id = $lsnid;
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $teacher_id = $user->GetUsrID();
                            $sql = "select a.LsnID, b.Week, a.LsnTpID, c.LsnNm, a.StdID,d.Pnt,e.UsrNm,e.UsrCd,b.LsnCntID from (studenttimetable a 
                                    left join lessoncontent b on a.LsnID = b.LsnID and a.LsnTpID = b.LsnTpID
                                    left join lessontype c on c.LsnID = a.LsnTpID 
                                    left join homework d on b.LsnCntID = d.LsnCntID and a.StdID = d.StdID)
                                    inner join user e on e.UsrID = a.StdID
                                    where a.TchID = ".$teacher_id." and a.LsnID = ".$lesson_id."
                                    order by b.Week,a.StdID
                                    ";
                            $query = $db->query($sql);
                            return $query;
             }
       public static function GetStudentLesson_irts($lsnid)
               {
                            $lesson_id = $lsnid;
                            $db = DataBase::getInstance();
                            $user = User::getInstance();
                            $std_id = $user->GetUsrID();
                            $sql = "select a.`AttSta`,a.`UsrID`,b.`LsnID`,c.`LsnNm`,c.`LsnCd`,b.`LsnTpID`,d.`LsnNm`,b.`Week`,e.UsrNm,e.UsrCd,b.`Title` from (attendance a inner join lessoncontent b on a.`LsnCntID` = b.`LsnCntID` 
inner join lesson c on c.`LsnID` = b.`LsnID` inner join lessontype d on d.`LsnID` = b.`LsnTpID`)
left join user e on e.UsrID = a.`InsID`
where a.`UsrID` = ".$std_id." and b.`LsnID` = ".$lesson_id."
order by b.`Week`";
                            $query = $db->query($sql);
                            return $query;
               }
       public static function Oyuutnii_ners_avah($lsnid,$lsnTm=NULL)
             {
                if(isset($lsnTm))
                    {
                        $cond = " and a.LsnTm=".$lsnTm." ";
                    }
                    else 
                        {
                            $cond = "";
                        }
                $db = DataBase::getInstance();
                $tchid = 1;
                $sql = "select b.UsrID,b.UsrCd,b.UsrNm,a.`LsnTm`,a.StdID,a.LsnID from studenttimetable a 
                    inner join user b on a.`StdID` = b.UsrID where 
                    a.`LsnID` = ".$lsnid." and a.`TchID` = ".$tchid.$cond." 
                        order by a.StdID";
                $query = $db->query($sql);
                return $query;
             }
     public static function Hicheeliin_aguulga_avah($lsnid,$lsntp=NULL)
             {
                if(isset($lsntp))
                                {
                                    $cond = " and a.LsnTpID =".$lsntp." ";
                                }
                                else
                                    {
                                        $cond = "";
                                    }
                $db = DataBase::getInstance();
                $sql = "select a.`LsnCntID`,a.`Title`,b.`LsnNm`,a.`Week`,a.`LsnID`,a.LsnTpID,a.SelfPnt,b.LsnNm_delger,c.LsnCd from (lessoncontent a
inner join lessontype b on a.`LsnTpID` = b.`LsnID`) inner join lesson c on  c.`LsnID` = a.`LsnID`
where a.`LsnID` = ".$lsnid.$cond." and c.`isAvailable` = 1 order by  a.`Week`
";
                $query = $db->query($sql);
                return $query;
             }
     public static function Hicheeliin_dun_avah($lsnid,$lsntp=NULL)
             {
             if(isset($lsntp))
                                {
                                    $cond = " and a.LsnTpID =".$lsntp." ";
                                }
                                else
                                    {
                                        $cond = "";
                                    }
                $db = DataBase::getInstance();
                $sql = "select b.`StdID`,a.`Title`,d.`LsnCd`,b.`Pnt`,c.`LsnNm`,a.`Week`,b.`LsnCntID` from 
(((lessoncontent a inner join homework b on a.`LsnCntID` = b.`LsnCntID`) 
inner join lessontype c on c.`LsnID` = a.`LsnTpID`) 
inner join lesson d on d.`LsnID` = a.`LsnID`)
where a.`LsnID` = ".$lsnid.$cond." and d.`isAvailable` = 1 order by b.StdID
";
                $query = $db->query($sql);
                return $query;
             }
    public static function Oyuutnii_irts_avah()
             {
             $db = DataBase::getInstance();
             $sql = "select a.`LsnCntID`,a.`UsrID`,a.`AttSta` from attendance a";
             $query = $db->query($sql);
             return $query;
             }
    public static function GetTailan($lsnid,$cnt_id)
            {
             $db = DataBase::getInstance();
             $sql = "select a.`LsnCntID`,a.`StdID`,a.`Pnt`,b.`Title`,b.`Week`,b.`SelfPnt`,c.`LsnNm_delger`,d.`LsnNm`,d.`LsnCd`
from homework a inner join lessoncontent b on a.`LsnCntID`=b.`LsnCntID` 
inner join lessontype c on c.`LsnID`=b.`LsnTpID`
inner join lesson d on d.`LsnID`=b.`LsnID`
where a.`LsnCntID`=".$cnt_id." and b.`LsnID`=".$lsnid."";
             $query = $db->query($sql);
             return $query;
            }
}

?>
