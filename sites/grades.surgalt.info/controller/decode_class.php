<?php



class Decode
    {
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
                     return $result;
                }
    }
    



?>
