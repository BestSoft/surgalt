<?php 
    class Get_hicheel
    {
        private $db;
        private $user_id;
        static private $instance;
        public function __construct() 
                {
                    $this->db = DataBase::getInstance();
                    $this->user_id = User::getInstance();
                }
                public static function getInstance()
                {
                    if (!isset(self::$instance)) 
                    {
                        self::$instance = new Get_hicheel();
                    }
                    return self::$instance;
                }

                public function odoo_suraltsaj($enejil_eseh)
                {
                    $usr_id = $this->user_id->getUsrID();
                    $usr_perm = $this->user_id->getUsrTpID();
                    if((int)$usr_perm == 3)
                        {
                           $param_table = "teachertimetable"; 
                           $param_table_usr = "TchID";
                        }
                        else
                            {
                                $param_table = "studenttimetable";
                                $param_table_usr = "StdID";
                            }
                    $sql = "select d.`LsnNm_delger`,a.`LsnID`,a.`LsnTm`,c.`LsnTpID`,b.`LsnCd`,c.`Title`,d.`LsnNm` from ".$param_table." a 
inner join lesson b on a.`LsnID` = b.`LsnID`
inner join lessoncontent c on a.`LsnID` = c.`LsnID` and a.`LsnTpID` = c.`LsnTpID`
inner join lessontype d on c.`LsnTpID` = d.`LsnID`
where b.`isAvailable` = '".$enejil_eseh."' and a.`".$param_table_usr."` = '".$usr_id."' order by a.LsnID";
                    $result = $this->db->query($sql);
                    return $result;
                }
                
                public static function GetStudentLesson_prev()
                        {
                            $user = User::getInstance();
                            $user_id = $user->getUsrID();
                            $user_type = $user->getUsrTpID();
                            if($user_type == 3)
                                {
                                    $user_rlt = 1;
                                }
                                else 
                                    {
                                        $user_rlt = 2;
                                    }
                            $db = DataBase::getInstance();
                            $sql = "select a.LsnCd,a.LsnID,a.LsnYear from lesson a "
                                    . "inner join userlesson b on a.LsnID = b.LsnID where b.UsrID = ".$user_id." "
                                    . "and a.isAvailable = 0 and b.RltnID = ".$user_rlt." order by a.LsnYear";
                            $query = $db->query($sql);
                            return $query;
                        } 
                public static function GetTeacherLesson_prev()
                        {
                            $user = User::getInstance();
                            $user_id = $user->getUsrID();
                            $user_type = $user->getUsrTpID();
                            if($user_type == 3)
                                {
                                    $user_rlt = 1;
                                }
                                else 
                                    {
                                        $user_rlt = 2;
                                    }
                            $db = DataBase::getInstance();
                            $sql = "select b.LsnCd,b.LsnYear,b.LsnID from userlesson a inner join 
                                lesson b on a.LsnID = b.LsnID where 
                                a.RltnID = ".$user_rlt." and a.UsrID = ".$user_id." and b.isAvailable = 0 order by b.LsnYear";
                            $query = $db->query($sql);
                            return $query;
                        }
    }
?>
