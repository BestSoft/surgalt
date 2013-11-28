<div class="Mystyle_1">
    <div class="row">
        <div class="col-md-3">
            <?php
            include PATH_BASE . "/sites/" . HOSTNAME . "/controller/LessonController.php";
            DrawLeftMenu::DrawLeftMenu_now();
            ?>
        </div>            
        <div class="col-md-9">
            <?php
            include PATH_BASE . '/sites/' . HOSTNAME . '/controller/JournalController.php';
            if ($user->getUsrTpID() == 4) {
                if (count($_GET) == 1)
                    DrawJournal::DrawJournalStudent_max_cont();
                if (isset($_GET["lesson"]) && isset($_GET["type"]) && isset($_GET["isa"]) && count($_GET) == 4)
                    DrawJournal::DrawJournalStudent_min_cont();
                if (isset($_GET["action"]) && count($_GET) == 2) {
                    if ($_GET["action"] == 2)
                        DrawJournal::DrawJournalStudent_max_cont_prev();
                }
                if (isset($_GET["year"]))
                    DrawJournal::DrawJournalStudent_mid_cont_prev();
                if (isset($_GET["lesson"]) && count($_GET) == 2)
                    DrawJournal::DrawJournalStudent_mid_cont();
                if(isset($_GET["lesson"]) && isset($_GET["irts"]) && count($_GET) == 3)
                    DrawJournal::DrawJournalStudent_irts_cont ();
            }
            else {
                if (isset($_GET["lesson"]) && isset($_GET["type"]) && isset($_GET["par"]) && count($_GET) == 4)
                    DrawJournal::DrawJournalTeacher_min_cont_now_1();
                if (isset($_GET["lesson"]) && isset($_GET["type"]) && count($_GET) == 3)
                    DrawJournal::DrawJournalTeacher_min_cont_now();
                if (isset($_GET["lesson"]) && count($_GET) == 2)
                    DrawJournal::DrawJournalTeacher_mid_cont_now();
                if(count($_GET) == 1 && $_GET["host"] == HOSTNAME)
                    {
                    DrawJournal::DrawJournalTeacher_max();
                    }
                if(count($_GET) == 2 && $_GET["host"] == HOSTNAME && isset($_GET["action"]))
                    {
                    if($_GET["action"] == 1)
                    DrawJournal::DrawJournalTeacher_max_prev();
                    if($_GET["action"] == 3)
                    DrawJournal::DrawJournalTeacher_mid_prev();
                    if($_GET["action"] == 4)
                    DrawJournal::Draw_err();
                    if($_GET["action"] == 5)
                    DrawJournal::Draw_err();
                    }
                if(isset($_GET["action"]) && isset($_GET["lsnCnt"]) && isset($_GET["lsn"]) && count($_GET) == 4)
                    {
                        if($_GET["action"] == "tailan")
                            {
                            DrawJournal::Draw_tailan();
                            }
                    }
            }
            ?>
        </div>
    </div>
</div>

