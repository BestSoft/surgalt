<?php

class daylist{
    private $db;
    
    function __construct() {
        $user = User::getInstance();
        $this->db = DataBase::getInstance();
    }
    
    public static function selectdaylist() {
        $sql = "select * from calendar";
        $query = $this->db->query($sql);

        $result = mysqli_fetch_assoc($query);

        echo $result['Title'];
    }
}
daylist::selectdaylist();
?>

<h4>Сарын жагсаалт харуулах</h4>
<div>
    <table class="table table-bordered table-hover">
        <thead>
            <td><strong>Огноо</strong></td>
            <td><strong>Гарчиг</strong></td>
            <td><strong>Байршил</strong></td>
        </thead>
        <tr>
            <td>Огноо</td>
            <td>Гарчиг</td>
            <td>Байршил</td>
        </tr>
    </table>
</div>