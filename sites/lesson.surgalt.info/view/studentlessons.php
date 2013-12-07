<html>
    <head> 
        <title> Мэдээ, мэдээлэл </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        
        
    <body>
<div class="container-fluid">
  <div class="row-fluid">
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home" data-toggle="tab">Хичээлийн нэр</a></li>
  <li><a href="#group" data-toggle="tab">Хичээлийн баг</a></li>
</ul>
 <div class="tab-content">
  <div class="tab-pane active" id="home"><?php include 'lessoncontent.php'; ?>
  </div>
  <div class="tab-pane" id="group"> <?php include 'sgroup.php'; ?> </div>
</div>
 
<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
   </div>
    </div>
    </body>
</html>
