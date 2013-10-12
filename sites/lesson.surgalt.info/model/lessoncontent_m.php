<?php

/*
 * Хичээлийн агуулга модел класс
 */

class lessoncontent_m {
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
        
    
}

?>
