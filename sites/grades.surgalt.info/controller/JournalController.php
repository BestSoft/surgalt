<?php

include PATH_BASE . '/sites/'.HOSTNAME.'/view/JournalView_class.php';
    
    
    class DrawJournal
{
            Public static function DrawJournalStudent_min_cont()// Одоо үзэж буй хичээлийн хичээлийн төрөл сонгох үе
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
            Public static function DrawJournalStudent_mid_cont()// Одоо үзэж буй хичээлийн хичээл сонгох үе
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
            Public static function DrawJournalStudent_max_cont()// Одоо үзэж буй хичээлийн дэд мэнү ээр сонгох үе
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawStudentJournal_max();
                                ?>
                            </div>
                        <?php 
                    }
            Public static function DrawJournalStudent_max_cont_prev()// Өмнө судалж байсан хичээлийн дэд мэнү ээр сонгох үеийн
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawStudentJournal_max_prev();
                                ?>
                            </div>
                        <?php
                    }
            public static function DrawJournalStudent_mid_cont_prev() // Өмнө судалж байсан хичээлийн улирлаар сонгох үеийн
                    {
                        ?>
                            <div class="journal">
                                <?php 
                                $year = $_GET["year"];
                                    Journal::DrawStudentJournal_mid_prev($year);
                                ?>
                            </div>
                        <?php 
                    }
}



?>
