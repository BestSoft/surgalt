<?php
require_once("database.php");
require_once("user.php");

class daylist{
    
    private $year;
    private $month;
    private $day;
    private $db;
    private $user;
    
    function __construct() {
        $this->year = $_POST["year"];
        $this->month = $_POST["month"];
        $this->day = $_POST["day"];
        
        $this->user = User::getInstance();
        
        $this->db = DataBase::getInstance();
    }
    
    function selectdaylist() {
        
        $sql = "select CalID, Location, StrtDt, EndDt, Title, Tag from calendar where StrtDt <= '" . $this->year . "/" . $this->month . "/".$this->day." 23:59:59' and '" . $this->year . "/" . $this->month . "/".$this->day." 00:00:00' <= EndDt and TpUsrID =".$this->user->getUsrTpID() ."0000000" . $this->user->getUsrID();
        echo $sql;
        $query = $this->db->query($sql);

        $result = mysqli_fetch_assoc($query);
        
        echo "<h4>Сарын үйл ажиллагааны жагсаалт</h4>

            <div>
                <table class='table table-bordered table-hover'>
                    <thead>
                        <td><strong>Огноо</strong></td>
                        <td><strong>Гарчиг</strong></td>
                        <td><strong>Байршил</strong></td>
                    </thead>
                    <tr>
                        <td>". $result["StrtDt"]." - ".$result["EndDt"]."</td>
                        <td>". $result["Title"]."</td>
                        <td>". $result["Location"]."</td>
                    </tr>
                </table>
            </div>";
    }
}
$daylist = new daylist();
$daylist->selectdaylist();

?>

