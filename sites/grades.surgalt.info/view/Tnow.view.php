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
?>
            <div class="garchig"><h3><?php echo "Энэ жил зааж буй хичээлүүд"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=2"> > Энэ жил зааж буй хичээлүүд</a>
            </div>
        <table class="table table-bordered">
            <tr class="table_header">
                <td class="table_cell_1st">Д/д</td>
                <td class="table_cell_1st">Хичээлийн код</td>
                <td class="table_cell_1st">Хичээлийн нэр</td>
            </tr>
            <?php 
                $i = 0;
                while($niit_bichleg > $i)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i+1; ?>
                            </td>
                            <td>
                                <?php echo $my_array[$i]["LsnCd"] ?>
                            </td>
                            <td>
                                <?php echo $my_array[$i]["LsnNm"] ?>
                            </td>
                        </tr>
                        <?php
                        $i++; 
                    }
            ?>
        </table>
        <?php }?>
<div class="journal">
    <?php 
                Draw($result)
    ?>
</div>