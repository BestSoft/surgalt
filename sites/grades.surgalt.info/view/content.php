<div class="Mystyle_1">
    <div class="row">
        <div class="col-md-3">
            <?php
                LeftMenuCont::DrawLeftMenu();
            ?>
        </div>            
        <div class="col-md-9">
            <?php
                if((int)$user->getUsrTpID() == 4)
                    {
                        SpastCont::DrawJournalStudent();
                    }
                    else
                        {
                            if((int)$user->getUsrTpID() == 3)
                                {
                                    TpastCont::DrawJournalTeacher();
                                }
                                else
                                    {
                                        echo "Уучлаарай та үзэх эрхгүй байна";
                                    }
                        }
            ?>
        </div>
    </div>
</div>

