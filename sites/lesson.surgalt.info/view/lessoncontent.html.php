<html>
    <head> 
        <title> Хичээлийн агуулга оруулах </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-editable.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/style.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/script.js"></script>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <form action="connector.php" method="post">
                <h4> Хичээлийн агуулга оруулах хэсэг</h4>
                <table class="table-urgun">
                    <tr>
                        <td width="300"> <label> Хичээлийн гарчиг</label> </td>
                        <td> <input type="text" name="title" placeholder="Хичээлийн гарчгийг оруулна уу."> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label> Хичээлийн төрөл</label></td>
                        <td> <input type="text" name="ltype" placeholder="Хичээлийн төрөл."> </td>
                    </tr>
                    <tr>
                        <td colspan="2">​<textarea class="span9" name="desc" id="txtArea">Хичээлийн тайлбар оруулна уу.</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Хичээлийн файлууд хавсаргах</label> </td>
                        <td> <input type="text" name="attachment" placeholder="Хичээлийн файлууд хавсаргах."> </td>
                    </tr>
                    <tr>
                        <td> Холбоос оруулах</td>
                        <td class="span5"><input type="text" name="" height="30" width="400"/> <input type="button" value="+" /> </td>
                    </tr>
                    <tr> 
                        <td colspan="2">​<textarea class="span9" name="usemtrl" id="txtArea">Ашиглах материал оруулна уу..</textarea></td>
                    </tr>
                    <tr>
                        <td> Долоо хоног</td>
                        <td><input type="text" name="week"/></td>
                    </tr>
                    <tr>
                        <td> Эрэмбэ </td>
                        <td><input type="text" name="sort"/></td>
                    </tr>
                    <tr>
                        <td> Даалгаврын оноо</td>
                        <td><input type="text" name="selfpnt"/></td>
                    </tr>
                    <tr> 
                        <td>Даалгаврын дуусах хугацаа </td>
                        <td><input type="text" name="selfenddt"/></td>
                    </tr>



                    <tr> 
                        <td>Оруулсан хэрэглэгчийн дугаар</td>
                        <td><input type="text" name="insid"/></td>
                    </tr>
                    <tr> 
                        <td> Оруулсан  огноо </td>
                        <td><input type="text" name="insdt"/></td>
                    </tr>
                    <tr> 
                        <td>Зассан хэрэглэгчийн дугаар </td>
                        <td><input type="text" name="updid"/></td>
                    </tr>
                    <tr> 
                        <td>Зассан огноо </td>
                        <td><input type="text" name="upddt"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                    <center> <button type="submit"  name ="insertlessoncontent" class="btn btn-primary"> Оруулах</button>
                        <button type="button" class="btn"> Болих</button>
                    </center>
                    </td>
                    </tr>

                </table>
            </form>

        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html>
