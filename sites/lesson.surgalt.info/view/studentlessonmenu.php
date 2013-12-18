<!--Оюутны нэг хичээлийн цэс-->
<ul class="nav nav-pills nav-stacked">
                        
                        <li class="active" ><a href="">Хичээлүүд</a>       
                        <?php 
    
    Draw::DrawLessonInstanceMenu();                    
    ?>
                        
                        </li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=studentnewsfeed&m=1&Lid=<?php echo $lessoncode;?>">Шинэ мэдээ</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessonstudents&m=1&Lid=<?php echo $lessoncode;?>">Оюутнууд</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessonfiles&Lid=<?php echo $lessoncode;?>">Бүх файлууд</a></li>
                        <li class="active"><a href="/surgalt/index.php?host=lesson.surgalt.info&view=studentLdefinition&Lid=<?php echo $lessoncode;?>">Хичээлийн тодорхойлолт</a></li>
<!--                        <li><a href="/surgalt/index.php?host=lesson.surgalt.info&view=lessondefinition">Хичээлийн стандарт</a></li>-->
</ul>