<html>
    <head> 
        <title> Хичээлийн агуулга оруулах </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
     </head>
    <body>
<div class="container-fluid">
  <div class="row-fluid">
            <div class="span3">
             <li>  <a href="http://localhost/surgalt/sites/calendar.surgalt.info/newsfeed.php">Мэдээ мэдээлэл</a> </li>
             <li>  <a href="">Хичээл харах</a> </li>
             <li>  <a href="">Хичээл тодорхойлолт харах</a> </li> 
             <li>  <a href="">Хичээл тодорхойлолт оруудах</a> </li> 
            </div>
       <div class="span8">
           <style>
               .top{
                   margin-top: 100px;
               }
               </style>
        <form action="connector.php" method="post">

            <h4> Хичээлийн агуулга оруулах хэсэг</h4>
            <br>
            <br>
        <table class="table-urgun top">
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
      </div>
    </div>
    </body>
</html>
