<?php 
    include PATH_BASE.'/sites/'.HOSTNAME."/model/Sjournal.model.php";
class SpastCont
    {
        Public static function DrawJournalStudent()
                {
                $get_data = Get_Journal::GetInstance();
                if(isset($_GET["ac"]))
                    {
                        if((int)$_GET["ac"] == 1)
                            {
                                if(isset($_GET["yr"]))
                                    {
                                        $year = $_GET["yr"];
                                    }
                                    else
                                        {
                                            $year = null;
                                        }
                                        $result = $get_data->Student_journal_past($year);
                                        include PATH_BASE.'/sites/'.HOSTNAME."/view/Spast.view.php";

                            }
                        if((int)$_GET["ac"] == 2)
                            {
                            $type = null;
                                if(isset($_GET["li"]))
                                    {
                                       $lsnID = (int)$_GET["li"];
                                       if(isset($_GET["lt"]))
                                           {
                                               $type = (int)$_GET["lt"];
                                           }
                                           $result = $get_data->Student_journal_now_exp($lsnID,$type);
                                           include PATH_BASE.'/sites/'.HOSTNAME."/view/Snow_exp.view.php";
                                    }
                                    else
                                        {
                                        $result = $get_data->Student_journal_now();
                                        include PATH_BASE.'/sites/'.HOSTNAME."/view/Snow.view.php";
                                        }
                            }
                    }
                    else
                        {
                            if(count($_GET) == 1)
                                {
                                    $result = $get_data->Student_journal_now();
                                    include PATH_BASE.'/sites/'.HOSTNAME."/view/Snow.view.php";
                                }
                                
                        }
                }
    }
?>
