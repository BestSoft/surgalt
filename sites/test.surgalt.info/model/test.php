<?php

class TestModel {

    public static function getUserTest() {
        $db = DataBase::getInstance();
        $sql = 'SELECT b.LsnNm, c.TstNm FROM userlesson AS a LEFT JOIN lesson AS b ON a.LsnID = b.LsnID LEFT JOIN test AS c ON a.LsnID = c.LsnID WHERE a.UsrID = ' . User::getInstance()->getUsrID();
        $query = $db->query($sql);
        $result = array();
        while($test = $query->fetch_assoc()){
            $result[] = $test;
        }
        return $result;
    }

}