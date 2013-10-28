<link rel="stylesheet" href="css/bootstrap.css">
<style>
    .zoodog
    {
        overflow-x: scroll;
    }
    .ehlel
    {
        margin-left: 0px;
    }
    .table_1
    {        
        border-right-color: black;   
        margin-right: 0px;
    }
    .table_3
    {
        border-left: 1px;
        border-style: solid;
        border-left-color: black;
        margin-right: 0px;
    }
    .neg_2
    {
        padding-left: 5px;
    }
    .neg_3
    {
        padding-left: 15px;
    }
    .dotorhi_1
    {
        display: none;
    }
    .ded_menu
    {
        text-decoration: underline;
        font-style: normal;
        font-size: 12px;
    }
    .Mystyle_1
    {
        margin-top: 100px;
    }
    .table
    {
        border-radius: 0px 0px 0px 0px;
    }
    .row-fluid
    [class*="span"]
    {
        margin-left: 0px;
    }
    .journal
    {
        margin-left: 20px;
    }
</style>
<div class="Mystyle_1">
    <div class="row-fluid">
        <div class="span12">            
            <div class="row-fuild">
                <div class="span3">
                <?php 
                    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php"; 
                    DrawLeftMenu::DrawLeftMenu_now();                    
                ?>
                </div>            
            <div class="span8">
                <div class="container">
                    <?php         
                    include PATH_BASE . '/sites/'.HOSTNAME.'/controller/JournalController.php';
                    if(isset($_GET["lesson"]) && isset($_GET["type"]) && isset($_GET["isav"]) && count($_GET) == 4)
                        {                                                
                            DrawJournal::DrawJournalStudent_min_cont();
                        }
                        else
                            {                               
                            if(isset($_GET["action"]))
                                {
                                    if($_GET["action"] == 1)
                                    DrawJournal::DrawJournalStudent_max_cont();
                                    if($_GET["action"] == 2)
                                    DrawJournal::DrawJournalStudent_max_cont_prev();
                                }
                            if(isset($_GET["year"]))
                                    DrawJournal::DrawJournalStudent_mid_cont_prev();
                            if(isset($_GET["lesson"]) && isset($_GET["type"]) && isset($_GET["par"]))
                                    DrawJournal::DrawJournalTeacher_min_cont_now ();
                            if(isset($_GET["lesson"]) && count($_GET) == 2)                               
                                    DrawJournal::DrawJournalStudent_mid_cont(); 
                            if(isset($_GET["host"]) && count($_GET))
                                {
                                    if($user->getUsrTpID() == 4)
                                        {
                                            DrawJournal::DrawJournalStudent_max_cont();
                                        }
                                        else
                                            {
                                                
                                            }
                                }
                            }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

