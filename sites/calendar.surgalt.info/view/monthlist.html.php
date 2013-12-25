<?php
require_once("database.php");
require_once("user.php");

class monthlist{
    
    private $year;
    private $nyear;
    private $month;
    private $nmonth;
    private $db;
    private $user;
    
    function __construct() {
        $this->year = $_POST["year"];
        $this->month = $_POST["month"];
        
        $this->user = User::getInstance();
        
        $this->db = DataBase::getInstance();
    }
    
    function selectmonthlist() {
        
        $this->nyear = $this->year;
        $this->nmonth = $this->month + 1;
        if($this->nmonth == 13){
            $this->nmonth = 1;
            $this->nyear = $this->year + 1;
        }
        $sql = "select CalID, Location, StrtDt, EndDt, Title, Tag from calendar where StrtDt >= '" . $this->year . "/" . $this->month . "/1 00:00:00' and '" . $this->nyear . "/" . $this->nmonth . "/1 00:00:00' >= EndDt and TpUsrID =".$this->user->getUsrTpID() ."0000000" . $this->user->getUsrID();
      
        $query = $this->db->query($sql);
            echo "<h4>".$this->month."-р сарын үйл ажиллагааны жагсаалт</h4>

            <div>
                <table class='table table-bordered table-hover'>
                    <thead>
                        <td><strong>Огноо</strong></td>
                        <td><strong>Гарчиг</strong></td>
                        <td><strong>Байршил</strong></td>
                    </thead>";
        while($result = mysqli_fetch_assoc($query))
        {
         echo "<tr>
                        <td>". $result["StrtDt"]." - ".$result["EndDt"]."</td>
                        <td>". $result["Title"]."</td>
                        <td>". $result["Location"]."</td>
                    </tr>";
                
    }
    echo "</table>
            </div>";
}   }
$monthlist = new monthlist();
$monthlist->selectmonthlist();

?>

