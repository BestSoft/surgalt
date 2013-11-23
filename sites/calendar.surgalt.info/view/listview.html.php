<table class="table-bordered" border="2" style="width: 100%;">
                <tr>
                    <td class="Table_header" colspan="3">
                        Жагсаалтууд
                    </td>
                </tr>
                <tr>
                    <td>
                        Гарчиг
                    </td>
                    <td>
                        Эхлэх огноо
                    </td>
            <?php
            While ($result = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <input type="checkbox" id='checkinput'>
                        <a id="checktitle"><?php echo $result['Title'] ?></a>
                    </td>
                    <td>
                        <a id='checkdate'><?php echo $result['StrtDt']?></a>
                    </td>
                </tr>
                    <?php
            }
            ?>
            </table>