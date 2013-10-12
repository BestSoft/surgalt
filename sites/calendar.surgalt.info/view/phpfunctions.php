<?php
function checkDay($d) {
        switch ($d) {
        case 0:
            return 'Гариг ';
            break;
        case 1:
            return 'Даваа ';
            break;
        case 2:
            return 'Мягмар ';
            break;
        case 3:
            return 'Лхагва';
            break;
        case 4:
            return 'Пүрэв';
            break;
        case 5:
            return 'Баасан';
            break;
        case 6:
            return 'Бямба';
            break;
        case 7:
            return 'Ням';
            break;
        break;
        }
    }
function monthDays($m) {
    for($m=1; $m<32; $m++){        
        return $m;
        if($m%7==0){
            return $m.'</td><td>';
        }
    }
}

$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");


function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

?>
