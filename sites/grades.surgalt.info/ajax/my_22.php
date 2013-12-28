<?php

include_once 'database1.php';
$db = DataBase::getInstance();
$tch_id = 1;
function CheckUporIns($cntid,$usrid)
{
    
    $db = DataBase::getInstance();
    $sql = "select a.UsrID from attendance a where a.LsnCntID = '$cntid' and a.UsrID = '$usrid'";
    if($db->query($sql))
                {
                $query = $db->query($sql);
                    if(mysqli_num_rows($query) == 1)
                        {
                            return true;
                        }
                        else
                            {
                                return false;
                            }
                }
                else
                    {
                        echo "Дүн нэмэгдсэнгүй";
                    }
    
}
function checkTuluv($useg)
{
            if($useg == 'И')
                {
                    return 1;
                }
            if($useg == "Т")
                {
                    return 2;
                }
            if($useg == 'Ө')
                {
                    return 3;
                }
            if($useg == 'Ч')
                {
                    return 4;
                }
}

if(isset($_POST["pk"]) && isset($_POST["name"]) && isset($_POST["onoo"]) && isset($_POST["useg"]))
    {
        $cnt_id = $_POST["pk"];
        $usr_id = $_POST["name"];
        $useg = $_POST["useg"];
        if(!CheckUporIns($cnt_id, $usr_id))
            {
                $insq = "insert into attendance values('".$cnt_id."','".$usr_id."','".checkTuluv($useg)."','".$tch_id."','1','".$tch_id."','1')";
                if($db->query($insq))
                    {
                        echo $useg;
                    }
                    else
                        {
                            echo "Дүн нэмэгдсэнгүй";
                        }
            }
            else
                {
                    $updq = "update attendance set AttSta = '".checkTuluv($useg)."',UpdID = '".$tch_id."',UpdDt = '1' 
                        where LsnCntID = '".$cnt_id."' and UsrID = '".$usr_id."'";
                    if($db->query($updq))
                        {
                            echo $useg;
                        }
                }
    }



?>
