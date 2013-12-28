<?php 
    include PATH_BASE.'/sites/'.HOSTNAME."/model/Tjournal.model.php";
class TpastCont
    {
        Public static function DrawJournalTeacher()
                {
                    $get_data = Get_Journal_teacher::GetInstance();
                    $lsn_id_need = null;
                    $lsn_tp_need = null;
                    $lsn_tm_need = null;
                    if(isset($_GET["ac"]))
                        {
                            if($_GET["ac"] == 2)
                                {
                                    if(isset($_GET["li"]))
                                        {
                                            $lsn_id = $_GET["li"];
                                            if(isset($_GET["lt"]))
                                                {
                                                    $lsn_tp = $_GET["lt"];
                                                    if(isset($_GET["lts"]))
                                                        {
                                                            $lsn_tm = $_GET["lts"];
                                                            $lsn_id_need = $_GET["li"];
                                                            $lsn_tp_need = $_GET["lt"];
                                                            $lsn_tm_need = $_GET["lts"];
                                                        }
                                                        else
                                                            {
                                                            $lsn_id_need = $_GET["li"];
                                                            $lsn_tp_need = $_GET["lt"];
                                                            }
                                                }
                                                else
                                                    {
                                                        $lsn_id_need = $_GET["li"];
                                                        
                                                    }
                                                    include PATH_BASE.'/sites/'.HOSTNAME."/model/Tjournal_exp.model.php";
                                                    include PATH_BASE.'/sites/'.HOSTNAME."/view/Tnow_exp.view.php";
                                        }
                                        else
                                            {
                                            $result = $get_data->Teacher_journal_now();
                                            include PATH_BASE.'/sites/'.HOSTNAME."/view/Tnow.view.php";
                                            }
                                }
                             if($_GET["ac"] == 1)
                                 {
                                    if(isset($_GET["li"]))
                                        {
                                            $lsnID = $_GET["li"];
                                            $result = $get_data->Teacher_journal_past_exp($lsnID);
                                            $ner = $get_data->Get_LsnNm($_GET["li"]);
                                            include PATH_BASE.'/sites/'.HOSTNAME."/view/Tpast_exp.view.php";
                                        }
                                        else
                                            {
                                            if(isset($_GET["yr"]))
                                                {
                                                    $yr = $_GET["yr"];
                                                }
                                                else
                                                    {
                                                        $yr = null;
                                                    }
                                            $result = $get_data->Teacher_journal_past($yr);
                                            include PATH_BASE.'/sites/'.HOSTNAME."/view/Tpast.view.php";
                                            }
                                 }
                        }
                        else
                            {
                                if(count($_GET) == 1)
                                    {
                                        $result = $get_data->Teacher_journal_now();
                                        include PATH_BASE.'/sites/'.HOSTNAME."/view/Tnow.view.php";
                                    }
                                
                            }
                }
    }
?>
