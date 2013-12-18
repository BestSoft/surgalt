<?php

/*
 * Хичээлийн агуулга модел класс
 */

class LessonContentModel {
    //put your code here
    public $l_ConId; // 
    public $l_Title; //
    public $l_TypeId; //
    public $l_Desc; //
    public $l_Usemtrl ; //
    public $l_attachment; //
    public $l_week;
    public $l_sort;
    public $l_Selfpnt;
    public $l_SelfEndDt;
    public $l_LsnId;
    
    function save(){}
    function getLcontentList($l_LsnId){}
    function getLcontent($l_ConId){}
    
    public static function GetUserLesson_name($User_id)
            {
                $db = DataBase::getInstance();                
                $sql = "select DISTINCT a.LsnNm,a.LsnCd from lesson a inner join studenttimetable b on a.LsnID = b.LsnID where b.StdID = ".$User_id." ";
                $query = $db->query($sql);
                return $query;
            }
   public static function GetTeacherLesson($User_id)
        {
                    
                    $db = DataBase::getInstance();
                    $sql = "select DISTINCT a.LsnID, a.LsnTm,a.TchID,a.LsnTpID,b.LsnNm,c.LsnCd,c.LsnYear from teachertimetable a inner join lessontype b inner join lesson c on b.LsnID = a.LsnTpID and a.LsnID = c.LsnID where a.TchID = ".$User_id." order by c.LsnCd,a.LsnTpID";
                    $query = $db->query($sql);
                    return $query;

        }
    public static function GetContent()
        {
                    
                    $db = DataBase::getInstance();
                    $sql = "INSERT INTO `humuunco_surgalt`.`lessoncontent` (`LsnCntID`, `Title`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`, `Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`) 
                        VALUES ('32', 'Гарчиг', '2', 'DESCRIPTION', 'MATERIAL', NULL, '2', '1', NULL, NULL, '2', NULL, NULL, NULL, NULL)";
                    $db -> query($sql);
                    $query = $db->query($sql);
                    return $query;
                    echo 'amjilttai hadgalagdlaa';

        }
}

?>
