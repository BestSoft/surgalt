<?php 
        function DecodeUseg($point)
                {
                    $point = (int)$point;
                    $result = array();
                    if(0<=$point && $point<=60)
                        {
                            $result["Useg"] = "F";
                            $result["Too"] = "0";
                        }
                    if(60<=$point && $point<=63)
                        {
                            $result["Useg"] = "D-";
                            $result["Too"] = "0.7";
                        }
                    if(64<=$point && $point<=67)
                        {
                            $result["Useg"] = "D";
                            $result["Too"] = "1.0";
                        }
                    if(68<=$point && $point<=70)
                        {
                            $result["Useg"] = "D+";
                            $result["Too"] = "1.3";
                        }
                    if(71<=$point && $point<=73)
                        {
                            $result["Useg"] = "C-";
                            $result["Too"] = "1.7";
                        }
                    if(74<=$point && $point<=77)
                        {
                            $result["Useg"] = "C";
                            $result["Too"] = "2.0";
                        }
                    if(78<=$point && $point<=80)
                        {
                            $result["Useg"] = "C+";
                            $result["Too"] = "2.4";
                        }
                    if(81<=$point && $point<=83)
                        {
                            $result["Useg"] = "B-";
                            $result["Too"] = "2.7";
                        }
                    if(84<=$point && $point<=87)
                        {
                            $result["Useg"] = "B";
                            $result["Too"] = "3.0";
                        }
                    if(88<=$point && $point<=90)
                        {
                            $result["Useg"] = "B+";
                            $result["Too"] = "3.4";
                        }
                    if(91<=$point && $point<=95)
                        {
                            $result["Useg"] = "A-";
                            $result["Too"] = "3.7";
                        }
                    if(96<=$point && $point<=100)
                        {
                            $result["Useg"] = "A";
                            $result["Too"] = "4.0";
                        }
                        return $result;
                }
        function DecodePar($param)
                {
                    $par = (int)$param;
                    if(99<$par && $par<1000)
                        {
                            $type = $par%10;
                            $hour = (($par-$type)/10)%10;
                            $day = ($par - ($hour*10 + $type))/100;
                            $turul = "";
                            if($type == 1)
                                {
                                    $turul = "(бүх)";
                                }
                            if($type == 2)
                                {
                                    $turul = "(тэгш)";
                                }
                            if($type == 3)
                                {
                                    $turul = "(сондгой)";
                                }
                            $string = $day." - ".$hour." ".$turul;
                            return $string;
                        }
                        else
                            {
                                return "Unknown";
                            }
                }
                function DecodeYear($data)
                {
                    $year = 0000;
                    $season = ((int)$data)%10;
                    $year = (((int)$data)-$season)/10;
                    $season_name = "Unknown";
                    if($season == 1)
                        {
                            $season_name = "Намар";
                        }
                    if($season == 2)
                        {
                            $season_name = "Өвөл";
                        }
                    if($season == 3)
                        {
                            $season_name = "Хавар";
                        }
                    if($season == 4)
                        {
                            $season_name = "Зун";
                        }
                        return $year."-оны ".$season_name;
                        
                }
    
?>