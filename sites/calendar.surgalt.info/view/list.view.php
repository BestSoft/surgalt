<?php
include PATH_BASE . "/sites/" . HOSTNAME . "/model/modCalendar.php";

class listViewEvent {

    static private $instance;
    static private $user_id;

    function __construct() {
        $user = User::getInstance();
        listViewEvent::$user_id = $user->getUsrID();
    }

    public static function select() {
        $query = Calendar::selectAllEvent();
        if (isset($query)) {
            ?>
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
                <tr>
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
                <?php
            }
        }

    }

    listViewEvent::select();
    ?>