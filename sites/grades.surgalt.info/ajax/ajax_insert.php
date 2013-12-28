<?php
include_once 'database1.php';

class Dun
{
    public static function Insert_dun($std_id,$cnt_id)
            {
                $db =  DataBase::getInstance();
                $sql = "select Pnt from homework where StdID='$std_id' and LsnCntID='$cnt_id'";
                $query = $db->query($sql);
                $available = mysqli_num_rows($query);
                if($available == 1)
                    {
                        return true;
                    }
                    else
                        {
                            return false;
                        }
            }
}


function insert_and_update()
{
    $db = DataBase::getInstance();
    
    
    
    
    if(isset($_POST["pk"]) && isset($_POST["name"]) && isset($_POST["value"]))
        {
        $cnt_id = $_POST["pk"];
        $std_id = $_POST["name"];
        $value = $_POST["value"];
        $tch_id = 1;
            if(is_numeric($value))
                {
                    if(Dun::Insert_dun($std_id, $cnt_id))
                        {
                            $sql = "update homework set Pnt=".$value.",UpdID='".$tch_id."' where LsnCntID=".$cnt_id." and StdID=".$std_id."";
                            if($db->query($sql))
                                {
                                    $data = array();
                                    $data["pk"] = $cnt_id;
                                    $data["name"] = $std_id;
                                    
                                    echo 1;
                                }
                                else
                                    {
                                        echo "Дүн өөрчлөгдсөнгүй";
                                    }
                        }
                        else
                            {
                                $sql = 'insert into homework values("'.$cnt_id.'","'.$std_id.'","","'.$value.'","'.$tch_id.'",1,1,1)';
                                if($db->query($sql))
                                    {
                                        echo 1;
                                    }
                                    else
                                        {
                                            echo "Дүн хадгалагдсангүй";
                                        }
                            }
                }
                else
                    {
                        echo "Та тоо оруулна уу!";
                    }
        }
        else
        {
        }
}
insert_and_update();

?>
