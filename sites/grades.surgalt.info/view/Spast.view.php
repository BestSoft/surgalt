<?php 
$my_array = array();
$total_urt = 0;
    while($ugugdul = mysqli_fetch_assoc($result))
        {
            $my_array[] = $ugugdul;
            $total_urt++;
        }
function DrawJournal($data)
        {
            ?>
            <div class="garchig"><h3><?php 
            if(isset($_GET["yr"]))
                {
                    echo DecodeYear($_GET["yr"])."-н улиралд ";
                }
                else
                    {
                        echo "Өмнө ";
                    }
            echo "судалж байсан хичээлүүд"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=1"> > Өмнө судалж байсан хичээлүүд</a>
                <?php 
                    if(isset($_GET["yr"]))
                        {
                        ?>
                        <a href="?host=grades.surgalt.info&ac=1&yr=<?php echo $_GET["yr"]; ?>"> > <?php echo DecodeYear($_GET["yr"]); ?></a>
                        <?php
                        }
                ?>
            </div>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <input type="text" id="Lesson_code" size="6" name="haih">
                    </td>
                    <td>
                        <input type="text" id="Lesson_name" size="12" name="haih">
                    </td>
                </tr>
                <tr class="table_header">
                    <td class="table_cell_1st">Хич.код</td>
                    <td class="table_cell_1st">Хич.нэр</td>
                    <td class="table_cell_1st">Кредит</td>
                    <td class="table_cell_1st">70 оноо</td>
                    <td class="table_cell_1st">30 оноо</td>
                    <td class="table_cell_1st">Нийт.o</td>
                    <td class="table_cell_1st">Үсгэн.ү</td>
                    <td class="table_cell_1st">Чанрын.о</td>
                    <td class="table_cell_1st">Үзсэн жил</td>
                </tr>
                <?php 
                $i=0;
                    while(count($data) > $i)
                        {
                        ?>
                        <tr>
                            <td data_2="<?php echo $i; ?>" turul="Lesson_code">
                                <?php echo $data[$i]["LsnCd"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>" turul="Lesson_name">
                                <?php echo $data[$i]["LsnNm"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>" total="Lesson_credit">
                                <?php echo $data[$i]["LsnCrd"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>" class="dun" total="Lesson_point">
                                <?php echo $data[$i]["Point70"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>" class="dun" total="Lesson_point">
                                <?php echo $data[$i]["Point30"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>">
                                <?php $point = (int)$data[$i]["Point30"]+(int)$data[$i]["Point70"]; echo $point; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>">
                                <?php $dun = DecodeUseg($point);echo $dun["Useg"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>" total="Lesson_too">
                                <?php echo $dun["Too"]; ?>
                            </td>
                            <td data_2="<?php echo $i; ?>">
                                <?php echo DecodeYear($data[$i]["LsnYear"]); ?>
                            </td>
                        </tr>
                        <?php
                            $i++;
                        }
                ?>
                        <tr>
                            <td></td>
                            <td>Нийт кредит : </td>
                            <td total="Total_credit"></td>
                            <td colspan="2"></td>
                            <td colspan="2">Үнэлгээний голч : </td>
                            <td total="Total_gpa"></td>
                        </tr>
            </table>
            <?php
        }
?>
<div class="journal">
    <?php 
        DrawJournal($my_array);
    ?>
</div>