<!DOCTYPE HTML>

<html>
       <head> 
        <title> Хичээлийн агуулга оруулах </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
     </head>
  
  
        <?php // include PATH_BASE . '/tpl/menu.php'; ?>
        <main class="bs-masthead" id="content" role="main">
            <div class="container">
               <html>

        
        <form class="form-inline" action="" method="">
            <b> Хичээлийн агуулга оруулах</b>
        <table class="table-bordered">
            <tr>
                <td>Хичээлийн гарчиг</td>
                <td><input type="text" name="title" width="400"/></td>
            </tr>
            <tr>
               
                <td colspan="2">​<textarea id="txtArea" rows="5" cols="70">Хичээлийн тайлбар оруулна уу.</textarea></td>
                
            </tr>
            <tr>
                <td>Хичээлийн файлууд хавсаргах </td>
                <td><input type="text" name="ovog"/></td>
            </tr>
            <tr>
                <td> Холбоос оруулах</td>
                <td><input type="text" name="ovog" width="400"/></td>
                <td colspan="2"><input type="button" value="+" /></td>
            </tr>
           <tr>
               <td colspan="2">​<textarea id="txtArea" rows="10" cols="70">Ашиглах материал оруулна уу..</textarea></td>
           </tr>
            <tr>
                <td> Даалгаврын оноо</td>
                <td><input type="text" name="ovog"/></td>
            </tr>
             <tr> 
                <td>Даалгаврын дуусах хугацаа </td>
                <td><input type="text" name="ovog"/></td>
            </tr>
             <tr>
                <td> Эрэмбэ </td>
                <td><input type="text" name="ovog"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="Оруулах" />
                <input type="button" value="Болих" /></td>
            </tr>
            
        </table>
        </form>
        
    

            </div>
        </main>
        <?php // include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 