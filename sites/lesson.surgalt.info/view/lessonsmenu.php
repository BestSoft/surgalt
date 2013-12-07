<ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lesson">Үйл явдлын тойм</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessoncontent">Хичээлүүд
                            <?php 
                            include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
                            include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
                            Draw::DrawLessonMenu();                    
                            ?>
                            </a></li>
<!--                        <li><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessondefinition">Хичээлийн стандарт</a></li>-->
</ul>