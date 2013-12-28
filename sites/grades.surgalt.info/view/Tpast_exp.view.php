<?php 
    function Draw($data,$data_1)
            {
                $my_array = array();
                $niit_bichleg = 0;
                while($ugugdul = mysqli_fetch_assoc($data))
                    {
                        $my_array[] = $ugugdul;
                        $niit_bichleg++;
                    }
                $utga = mysqli_fetch_assoc($data_1);
            ?>
            <div class="garchig"><h3><?php echo $utga["LsnNm"]."- н хичээлийн дүн"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=1"> > Өмнө жилд зааж байсан хичээлүүд</a>
                <a href="?host=grades.surgalt.info&ac=1&li=<?php echo $_GET["li"]; ?>"> > <?php echo $utga["LsnCd"]; ?></a>
            </div>
                    <table class="table table-bordered">
                        <tr>
                            <td></td>
                            <td><input type="text" name="haih" id="Student_code" size="13"></td>
                            <td><input type="text" name="haih" id="Student_name" size="13"></td>
                        </tr>
                        <tr class="table_header">
                            <td class="table_cell_1st">Д/д</td>
                            <td class="table_cell_1st">Оюутны код</td>
                            <td class="table_cell_1st">Оюутны нэр</td>
                            <td class="table_cell_1st">70 оноо</td>
                            <td class="table_cell_1st">30 оноо</td>
                            <td class="table_cell_1st">Нийт.о</td>
                            <td class="table_cell_1st">Үсгэн үнэлгээ</td>
                            <td class="table_cell_1st">Чанрын.о</td>
                        </tr>
                        <?php 
                        $i = 0;
                        while($i < $niit_bichleg)
                            {
                            ?>
                            <tr>
                                <td data_2="<?php echo $i; ?>"><?php echo $i+1; ?></td>
                                <td data_2="<?php echo $i; ?>" turul="Student_code"><?php echo $my_array[$i]["UsrCd"]; ?></td>
                                <td data_2="<?php echo $i; ?>" turul="Student_name"><?php echo $my_array[$i]["UsrNm"]; ?></td>
                                <td data_2="<?php echo $i; ?>"><?php echo $my_array[$i]["Point70"]; ?></td>
                                <td data_2="<?php echo $i; ?>"><?php echo $my_array[$i]["Point30"]; ?></td>
                                <td data_2="<?php echo $i; ?>"><?php $total = ($my_array[$i]["Point70"] + $my_array[$i]["Point30"]); echo $total; ?></td>
                                <td data_2="<?php echo $i; ?>"><?php $useg = DecodeUseg($total); echo $useg["Useg"]; ?></td>
                                <td data_2="<?php echo $i; ?>"><?php echo $useg["Too"]; ?></td>
                            </tr>
                            <?php
                                $i++;
                            }
                        ?>
                    </table>
                    <?php
            }
?>
<div class="journal">
    <?php 
    Draw($result,$ner);
    ?>
</div>