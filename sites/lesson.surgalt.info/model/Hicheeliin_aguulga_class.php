<?php



    class Aguulga
{
        public static function Aguulga_avah($lesson_id)
                {
                    $db = Database::getInstance();
                    $sql = "select `Title`,`Desc`,`LsnTpID`,`UseMtrl`,`Week`,`SelfEndDt` from lessoncontent where `LsnID` = ".$lesson_id." order by `Week`,`LsnTpID`";
                    $query = $db->query($sql);
                    return $query;
                }
        public static function DrawAguulga($lesson_id)
                {
                    $query = Aguulga::Aguulga_avah($lesson_id);
                        while($result = mysqli_fetch_assoc($query))
                            {
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                        echo "<td>"."Aguulga"."</td>";
                                        echo "<td>".$result["Title"]."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td colspan=2>".$result["Desc"]."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>On sar odor</td>";
                                        echo "<td>".$result["SelfEndDt"]."</td>";
                                    echo "</tr>";
                                echo "</table>";
                            }
                }

}



?>
