<?php

include PATH_BASE . '/sites/'.HOSTNAME.'/view/JournalView_class.php';
    
    
    class DrawJournal
{
            public static function DrawJournalStudent_irts_cont()
                    {
                          ?><div class="journal">
                                <?php
                                $lesson = $_GET["lesson"];
                                     Journal::DrawStudentJournal_irts($lesson);
                                ?>
                            </div><?php
                    }
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
            public static function DrawJournalTeacher_min_cont_now_1()
                    {
                            ?>
                            <div class="journal">
                                <?php
                                     $lsntm = $_GET["par"];
                                     $lsntp = $_GET["type"];
                                     $lesson = $_GET["lesson"];
                                     $result = Journal::Draw_journal_Lsn($lesson, $lsntp, $lsntm);
                                     
                                 ?>
                            </div>

                            <script>
                                $(document).ready(function(){
                                   <?php 
                                   $i = 0;
                                   while($result["niit_aguulga"] > $i)
                                   {
                                       echo "Average_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Max_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Min_my('".$result["niit_cnt_id"][$i]."');";
                                       $i++;
                                   } 
                                   $i=0;
                                   while($result["niit_oyuutan"] > $i)
                                       {
                                            echo "Total_my('".$result["niit_oyuutan_id"][$i]."');";
                                            $i++;
                                       }
                                   ?>
                                });
                            </script>
                            
                        <?php
                    }
            public static function DrawJournalTeacher_min_cont_now()
                    {
                        ?>
                            <div class="journal">
                                <?php
                                     $lsntp = $_GET["type"];
                                     $lesson = $_GET["lesson"];
                                     $result = Journal::Draw_journal_Lsn($lesson, $lsntp);
                                     
                                 ?>
                            </div>
                            
                            <script>
                                $(document).ready(function(){
                                   <?php 
                                   $i = 0;
                                   while($result["niit_aguulga"] > $i)
                                   {
                                       echo "Average_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Max_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Min_my('".$result["niit_cnt_id"][$i]."');";
                                       $i++;
                                   } 
                                   $i=0;
                                   while($result["niit_oyuutan"] > $i)
                                       {
                                            echo "Total_my('".$result["niit_oyuutan_id"][$i]."');";
                                            $i++;
                                       }
                                   ?>
                                });
                            </script>
                            
                        <?php
                    }
            public static function DrawJournalTeacher_mid_cont_now()
                    {
                        ?>
                            <div class="journal">
                                <?php
                                     $lesson = $_GET["lesson"];
                                     $result = Journal::Draw_journal_Lsn($lesson);
                                     
                                 ?>
                            </div>
                            
                            <script>
                                $(document).ready(function(){
                                   <?php 
                                   $i = 0;
                                   while($result["niit_aguulga"] > $i)
                                   {
                                       echo "Average_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Max_my('".$result["niit_cnt_id"][$i]."');";
                                       echo "Min_my('".$result["niit_cnt_id"][$i]."');";
                                       $i++;
                                   } 
                                   $i=0;
                                   while($result["niit_oyuutan"] > $i)
                                       {
                                            echo "Total_my('".$result["niit_oyuutan_id"][$i]."');";
                                            $i++;
                                       }
                                   ?>
                                });
                            </script>
                        <?php
                    }
          public static function DrawJournalTeacher_max()
                  {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawTeacherJournal_now_max();
                                ?>
                            </div>
                            <?php
                  }
          public static function DrawJournalTeacher_max_prev()
                  {
                        ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawTeacherJournal_prev_max();
                                ?>
                            </div>
                            <?php
                  }
          public static function DrawJournalTeacher_mid_prev()
                  {
                    ?>
                            <div class="journal">
                                <?php 
                                    Journal::DrawTeacherJournal_prev_mid();
                                ?>
                            </div>
                    <?php
                  }
          public static function Draw_err()
                  {?>
                            <div class="journal">
                                <?php 
                                    Journal::err_1();
                                ?>
                            </div><?php
                  }
          public static function Draw_tailan()
                  {
                    $lsnid = $_GET["lsn"];
                    $cnt_id = $_GET["lsnCnt"];
                    Journal::Draw_tailan($lsnid, $cnt_id);
                  }
}



?>
