<?php

function Draw($data)
{
    $my_array = array();
    $niit_bichleg = 0;
    
    while($ugugdul = mysqli_fetch_assoc($data))
        {
            $my_array[] = $ugugdul;
            $niit_bichleg++;
        }
        if($niit_bichleg != 0)
            {
        ?>
            <div class="garchig"><h3><?php echo $my_array[0]["LsnNm"];
            if(isset($_GET["lt"]))
                {
                    echo "-н ".strtolower($my_array[0]["LsnNm_delger"])."-н дүн";
                }
                else
                    {
                        echo "-н дүн";
                    }
            ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=2"> > Одоо суралцаж буй хичээлүүд</a>
                <a href="?host=grades.surgalt.info&ac=2&li=<?php echo $_GET["li"]; ?>"> > <?php echo $my_array[0]["LsnCd"]; ?></a>
                <?php 
                    if(isset($_GET["lt"]))
                        {
                        ?>
                        <a href="?host=grades.surgalt.info&ac=2&li=<?php echo $_GET["li"]; ?>&lt=<?php echo $_GET["lt"];?>"> > <?php echo $my_array[0]["LsnNm_delger"]; ?></a>
                        <?php
                        }
                ?>
            </div>
        <table class="table table-bordered">
            <tr>
                <td colspan="2"><input type="text" id="Lesson_week" name="haih" size="16"></td>
                <td><input type="text" id="Lesson_title" size="13" name="haih"></td>
            </tr>
            <tr class="table_header">
                <td class="table_cell_1st">Д/д</td>
                <td class="table_cell_1st">7 хоног</td>
                <td class="table_cell_1st">Сэдэв</td>
                <td class="table_cell_1st">Төрөл</td>
                <td class="table_cell_1st">Авах.o</td>
                <td class="table_cell_1st">Авсан.o</td>
                <td class="table_cell_1st">Дүн тавьсан багш</td>
            </tr>
            <?php 
            $i = 0;
                while($niit_bichleg > $i)
                    {
                        ?>
                        <tr>
                            <td <?php echo "data_2='".$i."'"; ?>><?php echo $i+1; ?></td>
                            <td turul="Lesson_week" <?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["Week"]."-р долоо хоног"; ?></td>
                            <td turul="Lesson_title" <?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["Title"]; ?></td>
                            <td <?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["LsnNm_delger"]; ?></td>
                            <td total="Avah"<?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["SelfPnt"]; ?></td>
                            <td total="Avsan"<?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["Pnt"]; ?></td>
                            <td <?php echo "data_2='".$i."'"; ?>><?php echo $my_array[$i]["UsrCd"]; ?></td>
                        </tr>
                        <?php
                            $i++;
                    }
            ?>
            <tr>
                <td colspan="4" class="baruun">Нийт оноо:</td>
                <td total="Total_pnt"></td>
                <td total="Total_pnt_get"></td>
            </tr>
        </table>
        <?php
            }
            else
                {
                    ?>
                        <div class="error_msg">Одоогоор энэ хичээл дээр дүн алга байна</div>
                    <?php 
                }
}
?>
<div class="journal">
    <?php 
        Draw($result);
    ?>
</div>