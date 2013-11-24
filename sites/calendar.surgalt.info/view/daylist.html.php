<button class="back">Буцах</button>

<?php

include_once '../model/modCalendar.php';

$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];

$Year = $year;
if($month<10){
    $Month = "0".$month;
}
else{
    $Month = $month;
}
if($day<10){
    $Day = "0".$day;
}
else{
    $Day = $day;
}

echo $Year;
echo $Month;
echo $Day;

$user = User::getInstance();
$db = DataBase::getInstance();

$daylistsql = "select * from calendar";
$query = $db->query($calendarsql);

$result = $query->fetch_assoc();

echo $result['Title'];
?>