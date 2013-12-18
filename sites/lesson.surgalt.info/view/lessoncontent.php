
<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<!--        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>view/js/jquery 1.10.2.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>view/js/script.js"></script>-->
        <style>
            .dotorhi_1
            {
                display:none;
            }
            .neg_2
            {
                padding-left: 10px;
            }
            .top{ margin-top: 50px;}
            .topmin{ margin-top: -50px;}
        </style>
    </head>
    <body>
<div class="container-fluid a">
     <h4 class='left ' > Хичээлийн самбар</h4>
<div class="row-fluid">
    
<div class="span3 top">
<!--Sidebar content-->
    <?php 
    include PATH_BASE . "/sites/".HOSTNAME."/controller/lesson_menu.php";
    include PATH_BASE . "/sites/".HOSTNAME."/model/lessoncontent.php";
    Draw::DrawStudentLessonpartMenu();                    
    ?>
</div>
<div class="span8">
    
<ul class="nav nav-tabs topmin" id="myTab">
  <li class="active"><a href="#content" data-toggle="tab">Хичээлийн агуулга</a></li>
  <li><a href="#pdf" data-toggle="tab"> PDF Файл</a></li>
  <li><a href="#video" data-toggle="tab"> Бичлэг</a></li>
  <li><a href="#useful" data-toggle="tab"> Ашиглах материал</a></li>
  <li><a href="#homework" data-toggle="tab"> Даалгавар</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="content"> <?php include 'lessoncontentcon.php'; ?> </div>
  <div class="tab-pane" id="pdf"> <?php include 'newsfeed.php'; ?> </div>
  <div class="tab-pane" id="video">  <?php include 'newsfeed.php'; ?>  </div>
  <div class="tab-pane" id="useful">  <?php include 'newsfeed.php'; ?> </div>
  <div class="tab-pane" id="homework">  <?php include 'newsfeed.php'; ?> </div>
</div>
<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
  
</script>
<script>
$(document).ready(function(){
        $(".neg_2").children("i.icon-plus").click(function(){
            $(this).attr("class","icon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i.icon-minus").attr("class","icon-plus");
        });
    });
</script>
</div>
</div>
</div>
</body>
</html>
