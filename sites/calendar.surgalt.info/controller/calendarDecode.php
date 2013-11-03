<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class calendarDecode{

    public static function DateFormat($Year, $Month, $Day, $Hour=null, $Minute=null, $Second=null) {
        
        if(isset($Hour))
            {
            $hour = $Hour;
            }
        else {$hour = "00";}
        if(isset($Minute))
            {
            $minute = $Minute;
            }
        else {$minute = "00";}
        if(isset($Second))
            {
            $second = $Second;
            }
        else {$second = "00";}
        if($Month<10){
            $month = "0".$Month;
        }
        else{
            $month = $Month;
        }
        if($Day<10){
            $day = "0".$Day;
        }
        else{
            $day = $Day;
        }
        
        $Date["date/"] = $Year."/".$month."/".$day." ".$hour.":".$minute.":".$second;
        $Date["date-"] = $Year."-".$month."-".$day." ".$hour.":".$minute.":".$second;
        
        return $Date;
        
        }
        public static function convertDate($Date) {
                        $StartDate = explode("-", $Date);
                        $i=0;
                        $StartDate_1 = null;
                        while(sizeof($StartDate) > $i)
                            {
                                $StartDate_1 = $StartDate_1.$StartDate[$i]; 
                                $i++;
                            }
                            
                            $StartDate = explode(" ", $StartDate_1);
                                $result = $StartDate[0]; 
                                
        return (double)$result;
                       }
                       
    
    
    
}

?>