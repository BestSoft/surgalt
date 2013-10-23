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
    .container-fluid
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
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <?php 
                    include PATH_BASE . "/sites/".HOSTNAME."/controller/LessonController.php"; 
                    DrawLeftMenu::DrawLeftMenu_Now();                    
                ?>
            </div>
            <div class="span8">
                    <?php         
                    include PATH_BASE . '/sites/'.HOSTNAME.'/controller/JournalController.php';
                    if(isset($_GET["lesson"]) && isset($_GET["type"]))
                        {                                                
                            DrawJournal::DrawJournalStudent_min_cont();
                        }
                        else
                            {
                            if(isset($_GET["lesson"]))
                                {
                                    DrawJournal::DrawJournalStudent_mid_cont();
                                }
                            if(isset($_GET["action"]))
                                {
                                    if($_GET["action"] == 1)
                                    DrawJournal::DrawJournalStudent_max_cont();
                                    if($_GET["action"] == 2)
                                    DrawJournal::DrawJournalStudent_max_cont_prev();
                                }
                            }
                    ?>
            </div>
        </div>
    </div>
<script src="js/jquery 1.10.2.js"></script>