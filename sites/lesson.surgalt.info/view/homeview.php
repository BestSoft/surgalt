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
    <body>
        
        <form action="" method="">
            <br>
            <br>
            <br>
            <br> 
            <br>
            <br>
            <h4> Хичээлийн агуулга оруулах хэсэг</h4>
            <br>
            <br>
        <table class="table-urgun">
            <tr>
               <td width="300"> <label> Хичээлийн гарчиг</label> </td>
               <td> <input type="text" placeholder="Хичээлийн гарчгийг оруулна уу."> </td>
               <td></td>
            </tr>
            <tr>
            <td colspan="2">​<textarea class="span9" id="txtArea">Хичээлийн тайлбар оруулна уу.</textarea>
            </td>
            </tr>
            <tr>
            <td> <label> Хичээлийн файлууд хавсаргах</label> </td>
            <td> <input type="text" placeholder="Хичээлийн файлууд хавсаргах."> </td>
            </tr>
            <tr>
            <td> Холбоос оруулах</td>
            <td class="span5"><input type="text" name="ovog" height="30" width="400"/> <input type="button" value="+" /> </td>
            </tr>
           <tr> 
           <td colspan="2">​<textarea class="span9" id="txtArea">Ашиглах материал оруулна уу..</textarea></td>
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
                <td>
                   <center> <button type="submit" class="btn btn-primary"> Оруулах</button>
                    <button type="button" class="btn"> Болих</button>
                    </center>
                </td>
            </tr>
            
        </table>
        </form>
        
    </body>
</html>
