<ul class="nav nav-pills nav-stacked">
                        
                        <li class="active" ><a href="">Хичээлүүд</a>       
                        <?php 
    Draw::DrawLessonInstanceMenu();                    
    ?>
                        
                        </li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teachernewsfeed&m=1&Lid=<?php echo $lessoncode;?>">Шинэ мэдээ</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherstudents&m=1&Lid=<?php echo $lessoncode;?>">Оюутнууд</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherfiles&Lid=<?php echo $lessoncode;?>">Бүх файлууд</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=teacherLdefinition&Lid=<?php echo $lessoncode;?>">Хичээлийн тодорхойлолт</a></li>
<!--                        <li><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessondefinition">Хичээлийн стандарт</a></li>-->
</ul>