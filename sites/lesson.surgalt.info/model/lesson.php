<?php

/*
 * Хичээлийн модел
 */

class LessonModel {

    //put your code here
    public $lCode;
    public $lName;
    public $lCredit;
    public $lYear;
    public $lWeek;
    public $lTime;

    function checkUser() {

        // Хэрэглэгчийн хичээл эсэх
        function checkUserType() {
            // Хэрвээ хичээлийн хэрэглэгч бол багш эсвэл сурагч аль нь болох
        }

    }

    public static function getLessonlist($usrId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT b.* FROM userlesson AS a LEFT JOIN lesson AS b ON a.LsnID = b.LsnID WHERE a.UsrID = ' . $usrId;
        $query = $db->query($sql);
        $result = array();
        while ($test = $query->fetch_assoc()) {
            $result[] = $test;
        }
        return $result;
    }

    function getLessonContent($lCode) {
        // Хичээлийн агуулга авах
    }

    function getLessonNews($lCode) {
        //Хичээлтэй холбоотой мэдээг авах
    }

}

?>
