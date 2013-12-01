<?php

class QuestionModel {

    public static function getLessonQuestion($lsnId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT a.*, b.TpcNm FROM question AS a INNER JOIN topic AS b ON a.TpcID = b.TpcID WHERE b.LsnID = ' . $lsnId;
        $query = $db->query($sql);
        $result = array();
        while ($test = $query->fetch_assoc()) {
            $result[] = $test;
        }
        return $result;
    }

    public static function getLessonQuestionCount($lsnId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT count(*) AS QstCnt FROM question AS a INNER JOIN topic AS b ON a.TpcID = b.TpcID WHERE b.LsnID = ' . $lsnId;
        $query = $db->query($sql);
        $result = $query->fetch_assoc();
        return $result["QstCnt"];
    }
}