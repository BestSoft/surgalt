<?php

/*
 * Хичээлийн модел
 */

class LessonModel {

      public static function getLessonlist($usrId) {
    $db = DataBase::getInstance();
    $sql = 'SELECT b.* FROM userlesson AS a LEFT JOIN lesson AS b ON a.LsnID = b.LsnID WHERE a.UsrID = ' . $usrId;
    $query = $db->query($sql);
    return $query;
    }
    public static function getLessonContentTopic() {
    $db = DataBase::getInstance();
        $sql = 'SELECT `TpcNm`, `TpcContent` , `TpcUseful` FROM `topic` WHERE `LsnID` =1';
    $query = $db->query($sql);
    return $query;
    }
    
    public static function insertTopic(){
    $db = DataBase::getInstance();
    $topic = $_REQUEST['topic'];
    $topiccon = $_REQUEST['topiccontent'];
    $topicuse = $_REQUEST['topicuseful'];
    
        if (isset($_POST["addtopic"]))
        {                     
        $sql = "INSERT INTO `humuunco_surgalt`.`topic` VALUES ('', '$topic', '$topiccon', '$topicuse', '', '', '', '', '');";
        $query = $db->query($sql);
        return $query;    
        echo 'inserted';
        }
        else{
            echo 'алдаа';
        }    
    }
    
    
      // Тухайн хичээлийг судалж буй оюутнуудыг ӨС -с авах функц
    public static function getLessonStudents() {
        $db = DataBase::getInstance();
        $lessoncode= $_GET["Lid"];
        $sql = "SELECT defform.FldNm, def.FldVal 
        FROM `lessondefinition` def inner join lessondefinitionform defform
        On def.FldID=defform.FldID 
        inner join lesson 
        on lesson.LsnID=def.LsnID
        Where lesson.LsnCd ='$lessoncode'";
        $query = $db->query($sql);
        return $query;
    }
    // Тухайн хичээлийн тодорхойлолтыг харуулна
    public static function getLessondefinition() {
        $db = DataBase::getInstance();
        $lessoncode= $_GET["Lid"];
        $sql = "SELECT defform.FldNm, def.FldVal 
        FROM `lessondefinition` def inner join lessondefinitionform defform
        On def.FldID=defform.FldID 
        inner join lesson 
        on lesson.LsnID=def.LsnID
        Where lesson.LsnCd ='$lessoncode'";
        $query = $db->query($sql);
        return $query;
    }
      // Тухайн хичээлийн тодорхойлолтыг өгөгдлийн сан руу оруулна
    
    public static function insertLessondefinition() {
        $db = DataBase::getInstance();
        $lessoncode= $_GET["Lid"];
        $sql = "SELECT defform.FldNm, def.FldVal 
        FROM `lessondefinition` def inner join lessondefinitionform defform
        On def.FldID=defform.FldID 
        inner join lesson 
        on lesson.LsnID=def.LsnID
        Where lesson.LsnCd ='$lessoncode'";
        $query = $db->query($sql);
        return $query;
    }
    
    public static function GetLessonContent() {
        // Хичээлийн агуулга авах
        //LsnTpID
        //Week
        //LsnID
            $week = $_GET["wk"];
            $ltype = $_GET["ltype"];
            $lessoncode = $_GET["Lid"];
            $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $queryid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($queryid);
            $lessonID=$row["LsnID"];
        $sql = "SELECT * FROM `lessoncontent` WHERE `LsnID`='$lessonID' AND `Week`='$week' AND `LsnTpID`='$ltype'";
        $query = $db->query($sql);
        return $query;
    }
      public static function GetLessonContentID() {
        // Хичээлийн агуулгын даалгаврыг авахад хэрэглэгдэнэ.
        //LsnTpID
        //Week
        //LsnID
            $week = $_GET["wk"];
            $ltype = $_GET["ltype"];
            $lessoncode = $_GET["Lid"];
            $db = DataBase::getInstance();
            $getlessonid= "SELECT `LsnID` FROM `lesson` WHERE `LsnCd`='$lessoncode'";
            $queryid = $db->query($getlessonid);
            $row = mysqli_fetch_assoc($queryid);
            $lessonID=$row["LsnID"];
            
            $getlessoncontentid= "SELECT `LsnCntID` FROM `lessoncontent` WHERE `LsnID`='$lessonID' and `Week`='$week' and `LsnTpID`='$ltype'";
            $queryconid = $db->query($getlessoncontentid);
            $rowconid = mysqli_fetch_assoc($queryconid);
            $LsnCntID=$rowconid["LsnCntID"];
        $sql = "SELECT * FROM `lessontask` WHERE `LsnCntID`='$LsnCntID'";
        $querytask = $db->query($sql);
        return $querytask;
    }

}

?>
