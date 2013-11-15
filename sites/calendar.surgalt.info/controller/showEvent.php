<?php
class dateEncode{
    
    public static function dateEncoding($StrtDt, $EndDt, $Format=null) {
        if(isset($Format)){
            $format = $Format;
        }
        else{
            $format = "date/";
        }
        
        $sql = "select Title from calendar where StrtDt";
        
    }
    
}
?>

