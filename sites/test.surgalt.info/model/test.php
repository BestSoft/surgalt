<?php

class TestModel {

    public static function getUserTest($usrId) {
        $db = DataBase::getInstance();
        $sql = 'SELECT c.* FROM userlesson AS a LEFT JOIN test AS c ON a.LsnID = c.LsnID WHERE a.UsrID = ' . $usrId;
        $query = $db->query($sql);
        $result = array();
        while($test = $query->fetch_assoc()){
            $result[] = $test;
        }
        return $result;
    }

}