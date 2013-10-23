<?php

include PATH_BASE . '/sites/'.HOSTNAME.'/view/JournalView_class.php';
    
    
    class DrawJournal
{
            Public static function DrawJournalStudent_min()
                    {
                        ?>
                            <div class="journal">
                                <?php
                                $lesson = $_GET["lesson"];
                                $type = $_GET["type"];
                                     Journal::DrawStudentJournal_min($lesson, $type);
                                ?>
                            </div>
                        <?php
                    }
}



?>
