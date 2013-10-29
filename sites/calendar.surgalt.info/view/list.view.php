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
            <?php
            While ($result = $query->fetch_assoc()) {
                echo "<tr>";
                Echo "<td>Гүйцэтгэл</td>";
                Echo "<td>" . $result['Title'] . "</td>";
                Echo "<td>Гүйцэтгэл</td>";
                echo "</tr>";
            }
            ?>
            </table>
                <?php
            }
        }

    }

    listViewEvent::select();
    ?>