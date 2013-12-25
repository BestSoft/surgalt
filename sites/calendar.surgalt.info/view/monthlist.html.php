<?php
require_once("database.php");
class daylist{
    
    function __construct() {
        $user = User::getInstance();
    }
    
    public static function selectdaylist() {
        $db = DataBase::getInstance();
        $sql = "select * from calendar";
        $query = $db->query($sql);

        $result = mysqli_fetch_assoc($query);

        echo $result['Title'];
    }
}
daylist::selectdaylist();
?>

<h4>Сарын үйл ажиллагааны жагсаалт</h4>

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