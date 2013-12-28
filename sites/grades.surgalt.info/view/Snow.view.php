<?php 
        
        function Draw($data)
        {
        $my_array = array();
        $prev_lsn = array();
        $total_lsnNm = array();
        $total_lsnCd = array();
        $total_tchNm = array();
        $total_tchCd = array();
        $dun = array();
        $total = 0;
        $total_hicheel = 0;

            while($ugugdul = mysqli_fetch_assoc($data))
                {
                    $my_array[] = $ugugdul;
                    if(!in_array($ugugdul["LsnID"],$prev_lsn))
                        {
                            $total_hicheel++;
                            $total_lsnNm[] = $ugugdul["LsnNm"];
                            $total_lsnCd[] = $ugugdul["LsnCd"];
                            $total_tchNm[] = $ugugdul["UsrNm"];
                            $total_tchCd[] = $ugugdul["UsrCd"];
                        }
                        $prev_lsn[] = $ugugdul["LsnID"];
                }
                $i = 0;
                $prev_lsn = array();
                while(count($my_array) > $i)
                    {
                        if(!in_array($my_array[$i]["LsnID"], $prev_lsn))
                            {
                                $dun[] = $total;
                                $total = 0;
                                $total = $total + $my_array[$i]["Pnt"];
                            }
                            else
                                {
                                    $total = $total + (int)$my_array[$i]["Pnt"];
                                }
                        if($i == count($my_array) - 1)
                            {
                                $dun[] = $total;
                            }
                        $prev_lsn[] = $my_array[$i]["LsnID"];
                        $i++;
                    }
            ?><div class="garchig"><h3><?php echo "Одоо суралцаж буй хичээлүүд-н дүн"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=2"> > Одоо суралцаж буй хичээлүүд</a>
            </div>
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2"><input type="text" id="Lesson_name" size="38" name="haih"></td>
                        <td><input type="text" id="Lesson_code" size="3" name="haih"></td>
                    </tr>
                    <tr class="table_header">
                        <td class="table_cell_1st">
                            Д/д
                        </td>
                        <td class="table_cell_1st">
                            Хичээлийн нэр
                        </td>
                        <td class="table_cell_1st">
                            Хич.код
                        </td>
                        <td class="table_cell_1st">
                            Нийт.O
                        </td>
                        <td class="table_cell_1st">
                            Багшийн код
                        </td>
                        <td class="table_cell_1st">
                            Багшийн нэр
                        </td>
                    </tr>
                    <?php 
                    $i = 0;
                        while($total_hicheel > $i)
                            {
                                ?>
                                <tr>
                                    <td  <?php echo "data_2='".$i."'"; ?>>
                                        <?php echo $i+1; ?>
                                    </td>
                                    <td <?php echo "data_2='".$i."'"; ?> turul="Lesson_name">
                                        <?php echo $total_lsnNm[$i]; ?>
                                    </td>
                                    <td <?php echo "data_2='".$i."'"; ?> turul="Lesson_code">
                                        <?php echo $total_lsnCd[$i]; ?>
                                    </td>
                                    <td <?php echo "data_2='".$i."'"; ?>>
                                        <?php echo $dun[$i+1]; ?>
                                    </td>
                                    <td <?php echo "data_2='".$i."'"; ?>>
                                        <?php echo $total_tchNm[$i]; ?>
                                    </td>
                                    <td <?php echo "data_2='".$i."'"; ?>>
                                        <?php echo $total_tchCd[$i]; ?>
                                    </td>
                                <?php
                                    $i++;
                                ?>
                                </tr>
                                <?php
                            }
                    ?>
                </table>
            <?php 
        }
?>
<div class="journal">
    <?php 
        Draw($result);
    ?>
</div>
