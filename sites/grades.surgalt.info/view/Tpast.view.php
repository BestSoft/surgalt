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
                if(isset($_GET["yr"]))
                    {
                        $nuhtsol = DecodeYear($_GET["yr"])."-н";
                    }
                    else
                        {
                            $nuhtsol = "Өмнө";
                        }
                ?>
            <div class="garchig"><h3><?php echo $nuhtsol." жилд зааж байсан хичээлүүд"; ?></h3></div>
            <div class="Zanguu">
                <a href="?host=grades.surgalt.info&ac=1"> > Өмнө жилд зааж байсан хичээлүүд</a>
                <?php 
                    if(isset($_GET["yr"]))
                        {
                            ?>
                            <a href="?host=grades.surgalt.info&ac=1&yr=<?php echo $_GET["yr"]; ?>"> > <?php echo DecodeYear($_GET["yr"]) ?></a>
                            <?php
                        }
                ?>
            </div>
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2"><input type="text" size="18" id="Hicheeliin_code" name="haih"></td>
                        <td colspan=""><input type="text" size="12" id="Hicheeliin_name" name="haih"></td>
                    </tr>
                    <tr class="table_header">
                        <td>Д/д</td>
                        <td>Хичээлийн код</td>
                        <td>Хичээлийн нэр</td>
                        <td>Хичээлийн кредит</td>
                        <td>Хичээл орсон жил</td>
                    </tr>
                    <?php 
                    $i=0;
                    while($i<$niit_bichleg)
                        {
                        ?>
                        <tr>
                            <td data_2="<?php echo $i; ?>"><?php echo $i+1; ?></td>
                            <td data_2="<?php echo $i; ?>" turul="Hicheeliin_code"><?php echo $my_array[$i]["LsnCd"]; ?></td>
                            <td data_2="<?php echo $i; ?>" turul="Hicheeliin_name"><?php echo $my_array[$i]["LsnNm"]; ?></td>
                            <td data_2="<?php echo $i; ?>"><?php echo $my_array[$i]["LsnCrd"]; ?></td>
                            <td data_2="<?php echo $i; ?>"><?php echo DecodeYear($my_array[$i]["LsnYear"]); ?></td>
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
    <?php Draw($result); ?>
</div>