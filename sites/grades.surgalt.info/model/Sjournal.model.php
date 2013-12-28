<?php
    class Get_Journal
    {
        private static $instance;
        private $db;
        private $user;
        private $user_id;
        function __construct() {
            $this->db = DataBase::getInstance();
            $this->user = User::getInstance();
            $this->user_id = $this->user->getUsrID();
        }
        public static function GetInstance()
        {
            if (!isset(self::$instance)) 
                    {
                        self::$instance = new Get_Journal();
                    }
                    return self::$instance;
        }
        function Student_journal_past($year=null)
        {
            $usr_id = $this->user_id;
            if(isset($year))
                {
                    $cell_name = " and b.LsnYear = '".$year."' ";
                }
                else
                    {
                        $cell_name = "";
                    }
            $sql = "select a.Point70,a.Point30,b.LsnNm,b.LsnCd,b.AttPnt,b.LsnCrd,b.LsnYear from userlesson a 
                inner join lesson b on a.LsnID = b.LsnID
                where a.UsrID = '".$usr_id."' and a.RltnID = '2' 
                ".$cell_name." and b.isAvailable = '0'";
            $result = $this->db->query($sql);
            return $result;
        }
        function Student_journal_now()
        {
            $usr_id = $this->user_id;
            $sql = "select a.SelfPnt,b.Pnt,c.LsnNm,c.LsnCd,d.UsrNm,d.UsrCd,a.LsnID from 
                lessoncontent a inner join homework b on a.LsnCntID = b.LsnCntID
                inner join lesson c on a.LsnID = c.LsnID
                inner join user d on d.UsrID = b.InsID
                where b.StdID = '".$usr_id."' and c.isAvailable = 1 order by a.LsnID";
            $result = $this->db->query($sql);
            return $result;
        }
        function Student_journal_now_exp($lsnCd,$type=null)
        {
            $usr_id = $this->user_id;
            $cond = "";
            if(isset($type))
                {
                    $cond = " and a.LsnTpID = '".$type."'";
                }
            $sql = "select a.Title,a.Week,a.SelfPnt,a.LsnID,b.Pnt,e.UsrCd,d.LsnNm_delger,c.LsnCd,c.LsnNm 
                from lessoncontent a inner join homework b
                on a.LsnCntID = b.LsnCntID inner join lesson c on c.LsnID = a.LsnID
                inner join lessontype d on d.LsnID = a.LsnTpID
                inner join user e on e.UsrID = b.InsID
                where b.StdID = '".$usr_id."' and c.isAvailable = 1 and c.LsnID = '".$lsnCd."'".$cond." order by "
                    . " a.Week";
            $result = $this->db->query($sql);
            return $result;
        }
    }
?>
