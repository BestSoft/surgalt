<?php




class Lesson
{
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
                $sql = "select a.`LsnCntID`,a.`Title`,b.`LsnNm`,c.LsnNm LsnNm_1,b.LsnNm_delger,c.LsnCd,a.`Week`,a.`LsnID`,a.LsnTpID,a.SelfPnt from (lessoncontent a
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
             public static function checkTuluv($useg)
             {
                if($useg == 1)
                    {
                        return 'И';
                    }
                if($useg == 2)
                    {
                        return "Т";
                    }
                if($useg == 3)
                    {
                        return 'Ө';
                    }
                if($useg == 4)
                    {
                        return 'Ч';
                    }
             }
}



?>