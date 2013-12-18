<?php

class TestModel {

    public static function getUserTest($usrId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT b.* FROM userlesson AS a INNER JOIN test AS b ON a.LsnID = b.LsnID WHERE a.UsrID = ' . $usrId;
        $query = $db->query($sql);
        $result = array();
        while($test = $query->fetch_assoc()){
            $result[] = $test;
        }
        return $result;
    }

    public static function getLessonTest($lsnId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT c.* FROM test AS a WHERE a.LsnID = ' . $lsnId;
        $query = $db->query($sql);
        $result = array();
        while($test = $query->fetch_assoc()){
            $result[] = $test;
        }
        return $result;
    }

}