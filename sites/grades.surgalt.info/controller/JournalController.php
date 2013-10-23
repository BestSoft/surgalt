<?php

include PATH_BASE . '/sites/'.HOSTNAME.'/view/JournalView_class.php';
    
    
    class DrawJournal
{
            Public static function DrawJournalStudent_min_cont()
                    {
                        ?>
                            <div class="journal">
                                <?php
                                $lesson = $_GET["lesson"];
                                $type = $_GET["type"];
                                $isav = $_GET["isa"];
                                     Journal::DrawStudentJournal_min($lesson, $type,$isav);
                                ?>
                            </div>
                        <?php
                    }
            Public static function DrawJournalStudent_mid_cont()
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                    $lesson = $_GET["lesson"];
                                    Journal::DrawStudentJournal_mid($lesson)
                                ?>
                            </div>
                        <?php
                    }
            Public static function DrawJournalStudent_max_cont()
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawStudentJournal_max();
                                ?>
                            </div>
                        <?php 
                    }
            Public static function DrawJournalStudent_max_cont_prev()
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawStudentJournal_max_prev();
                                ?>
                            </div>
                        <?php
                    }
}



?>
