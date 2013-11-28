<?php



class Decode
    {
    public static function checkTuluv($useg)
             {
                if($useg == 1)
                    {
                        return 'И';
                    }
                if($useg == 2)
                    {
                        return "Т";
                    }
                if($useg == 3)
                    {
                        return 'Ө';
                    }
                if($useg == 4)
                    {
                        return 'Ч';
                    }
             }
    public static function DecodePar($argument)
                        {
                            $argument = (int)$argument;
                            $argument1 = floor($argument / 100);
                            $argument2 = floor(($argument - ($argument1 * 100))/10);
                            $argument3 = $argument % 10 ;
                            if($argument3 == 1)
                                {
                                    $result["tegsh_sondgoi"] = "Сондгой";
                                    $result["par"] = $argument1."-".$argument2;
                                    goto end1;
                                }                            
                                else
                                {
                                    if($argument3 == 2)
                                        {
                                            $result["tegsh_sondgoi"] = "Тэгш";
                                            $result["par"] = $argument1."-".$argument2;
                                            goto end1;
                                        }
                                    if($argument3 == 3)
                                        {
                                            $result["tegsh_sondgoi"] = "Бүтэн";
                                            $result["par"] = $argument1."-".$argument2;
                                            goto end1;
                                        }
                                            $result["tegsh_sondgoi"] = "unknown";
                                            $result["par"] = "0-0";
                                }
                                            end1:
                                            return $result["par"]." ".$result["tegsh_sondgoi"];
                        }
    
                public static function DecodeYear($argument)
                {
                    $argument = (int)$argument;
                    $argument1 =  $argument % 10 ;
                    $argument2 = ($argument - $argument1)/10;
                    if($argument1 == 1)
                        {
                            $result["Season"] = "Намар";
                            $result["Year"] = $argument2;
                            goto end;
                        }
                        else
                            {
                            if($argument1 == 2)
                                {
                                    $result["Season"] = "Өвөл";
                                    $result["Year"] = $argument2;
                                    goto end;
                                }
                            if($argument1 == 3)
                                {
                                    $result["Season"] = "Хавар";
                                    $result["Year"] = $argument2;
                                    goto end;
                                }
                            if($argument1 == 4)
                                {
                                    $result["Season"] = "Зун";                                    
                                    $result["Year"] = $argument2;
                                    goto end;
                                }
                            $result["Season"] = "unknown";
                            $result["Year"] = "0000";
                            end:
                            }
                     return $result["Year"]." оны ".$result["Season"];
                }
                
                public static function GetTotalPoint($query,$LsnID)
                        {                            
                            $sum_attendance = 0;
                            $sum_homework = 0;
                            $total = 0;
                            while($result = mysqli_fetch_assoc($query))
                                {
                                if($result["LsnID"] == $LsnID)
                                    {                                
                                    $sum_homework+=$result["Pnt"];
                                    if($result["AttSta"] == 1)
                                        {
                                            $sum_attendance+=0; // Тасалсан бол 
                                        }
                                        else
                                            {
                                                if($result["AttSta"] == 2)
                                                    {
                                                        $sum_attendance+=0.3; // Өвчтэй байсан бол 
                                                    }
                                                if($result["AttSta"] == 3)
                                                    {
                                                        $sum_attendance+=0.5; // Чөлөөтэй байсан бол 
                                                    }
                                                if($result["AttSta"] == 4)
                                                    {
                                                        $sum_attendance+=0.7; // Хоцорсон бол 
                                                    }
                                                if($result["AttSta"] == 5)
                                                    {
                                                        $sum_attendance+=1; // Ирсэн бол 
                                                    }
                                            }
                                    }
                                    else
                                        {
                                            $sum_attendance+=0;
                                            $sum_homework+=0;
                                        }
                                        $total = $sum_attendance + $sum_homework;
                                }
                                        return $total;
                        }
                        
        public static function GetRealGrade($grade)
                {
                    if(96<=$grade && $grade<=100)
                        {
                            $alpha["sym"] = '4.0';
                            $alpha["number"] = 4;
                            $alpha["useg"] = 'A';
                            return $alpha;
                        }
                        else
                            {
                            if(91<=$grade && $grade<=95)
                                {
                                    $alpha["sym"] = '3.7';
                                    $alpha["number"] = 3.7;
                                    $alpha["useg"] = 'A-';
                                    return $alpha;
                                }
                            if(88<=$grade && $grade<=90)
                                {
                                    $alpha["sym"] = '3.4';
                                    $alpha["number"] = 3.4;
                                    $alpha["useg"] = 'B+';
                                    return $alpha;
                                }
                            if(84<=$grade && $grade<=87)
                                {
                                    $alpha["sym"] = '3.0';
                                    $alpha["number"] = 3;
                                    $alpha["useg"] = 'B';
                                    return $alpha;
                                }
                            if(81<=$grade && $grade<=83)
                                {
                                    $alpha["sym"] = '2.7';
                                    $alpha["number"] = 2.7;
                                    $alpha["useg"] = 'B-';
                                    return $alpha;
                                }
                            if(78<=$grade && $grade<=80)
                                {
                                    $alpha["sym"] = '2.4';
                                    $alpha["number"] = 2.4;
                                    $alpha["useg"] = 'C+';
                                    return $alpha;
                                }
                            if(74<=$grade && $grade<=77)
                                {
                                    $alpha["sym"] = '2.0';
                                    $alpha["number"] = 2;
                                    $alpha["useg"] = 'C';
                                    return $alpha;
                                }
                            if(71<=$grade && $grade<=73)
                                {
                                    $alpha["sym"] = '1.7';
                                    $alpha["number"] = 1.7;
                                    $alpha["useg"] = 'C-';
                                    return $alpha;
                                }
                            if(68<=$grade && $grade<=70)
                                {
                                    $alpha["sym"] = '1.3';
                                    $alpha["number"] = 1.3;
                                    $alpha["useg"] = 'D+';
                                    return $alpha;
                                }
                            if(64<=$grade && $grade<=67)
                                {
                                    $alpha["sym"] = '1.0';
                                    $alpha["number"] = 1;
                                    $alpha["useg"] = 'D';
                                    return $alpha;
                                }
                            if(61<=$grade && $grade<=63)
                                {
                                    $alpha["sym"] = '0.7';
                                    $alpha["number"] = 0.7;
                                    $alpha["useg"] = 'D-';
                                    return $alpha;
                                }
                            if(0<=$grade && $grade<=60)
                                {
                                    $alpha["sym"] = '0.0';
                                    $alpha["number"] = 0;
                                    $alpha["useg"] = 'F';
                                    return $alpha;
                                }
                                    $alpha["sym"] = '0.0';
                                    $alpha["number"] = 0;
                                    $alpha["useg"] = 'U';
                                    return $alpha;
                                
                            }
                }
    }
    



?>
