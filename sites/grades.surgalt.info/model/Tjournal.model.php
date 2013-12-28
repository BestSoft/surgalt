<?php
    class Get_Journal_teacher
    {
        private static $instance;
        private $db;
        private $user;
        private $user_id;
        private $user_tpid;
                function __construct() {
            $this->db = DataBase::getInstance();
            $this->user = User::getInstance();
            $this->user_id = $this->user->getUsrID();
            $this->user_tpid = $this->user->getUsrTpID();
        }
        public static function GetInstance()
        {
            if (!isset(self::$instance)) 
                    {
                        self::$instance = new Get_Journal_teacher();
                    }
                    return self::$instance;
        }
        function Teacher_journal_past($year=null)
        {
            $yr = $year;
            $usr_id = $this->user_id;
            $isa = 0;
            $rlt_id = 1;
            if(isset($year))
                {
                    $cond = " and b.LsnYear = '".$yr."' ";
                }
                else
                    {
                        $cond = "";
                    }
            $sql = "select b.LsnNm,b.LsnCd,b.LsnCrd,b.LsnYear from userlesson a inner join lesson b "
                    . "on a.LsnID = b.LsnID where a.RltnID = '".$rlt_id."'".$cond." and b.isAvailable = '".$isa."'"
                    . " and a.UsrID = '".$usr_id."' order by b.LsnYear";
            $result = $this->db->query($sql);
            return $result;
        }
        function Teacher_journal_now()
        {
            $usr_id = $this->user_id;
            $sql = "select Distinct c.LsnNm,c.LsnCd from teachertimetable a 
                    inner join lesson c on a.LsnID = c.LsnID 
                    where a.TchID = ".$usr_id." and c.isAvailable = 1";
            $result = $this->db->query($sql);
            return $result;
        }
        function Teacher_journal_past_exp($lsn_id)
        {
            $lsnID = $lsn_id;
            $sql = "select b.UsrNm,b.UsrCd,a.Point70,a.Point30 from userlesson a inner join user b on a.UsrID = b.UsrID
where a.LsnID = '".$lsnID."' and a.RltnID = 2";
            $result = $this->db->query($sql);
            return $result;
        }
        function Get_LsnNm($lsnID)
        {
            $lsn_id = $lsnID;
            $sql = "select LsnNm,LsnCd from lesson where LsnID = '".$lsn_id."'";
            $result = $this->db->query($sql);
            return $result;
        }
    }
?>
