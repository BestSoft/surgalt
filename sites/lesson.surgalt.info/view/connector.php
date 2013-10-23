<?php
//require 'database.php';
//require_once PATH_BASE . '/lib/database.php';
class DataBase {

    static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = '173.254.28.91';
            $user = 'humuunco_surgalt';
            $password = 'Surg@lt';
            $database = 'humuunco_surgalt';
            self::$instance = mysqli_connect($host, $user, $password, $database);
            self::$instance->set_charset('utf8');
        }
        return self::$instance;
    }
}
if (isset($_POST["insertlessoncontent"]))
{
	if (isset($_POST["title"]) && isset($_POST["ltype"]) && isset($_POST["desc"])&& isset($_POST["attachment"]) && isset($_POST["usemtrl"])
                && isset($_POST["week"]) && isset($_POST["sort"])&& isset($_POST["selfpnt"]) && isset($_POST["selfenddt"])
                && isset($_POST["insid"]) && isset($_POST["insdt"])
                && isset($_POST["updid"]) && isset($_POST["upddt"]))
	{
		$insQuery = "insert into lessoncontent value('', ".$_POST["title"]."','".$_POST["ltype"]."','".$_POST["desc"]."',
                    '".$_POST["attachment"]."', '".$_POST["usemtrl"]."', '".$_POST["week"]."' ,'".$_POST["sort"]."',
                        '".$_POST["selfpnt"]."', '".$_POST["selfenddt"]."','8',  '".$_POST["insid"]."', '".$_POST["insdt"]."', 
                            '".$_POST["updid"]."', ".$_POST["upddt"].")";
		mysql_query($insQuery);
                echo 'insertes lessoncontent';
//		header("Location: index.php");
	}
        else {
            echo 'utga orj ireegui';
        }
        
}
else {
    echo 'button';
}
?>
