<br/><br/>
<b>Багш нарын сургалтын цагийн тооцооны хуудас</b>
</br></br>
<div>
    <table>
        <tr>
            <td></td>
            <td style="padding-left: 80px;"><b>2012-2013 он</b> Намар улирал</td>   
        </tr>
        <tr>
            <td><b>Хичээлийн дугаар:</b> is203</td>   
            <td style="padding-left: 80px;"><b>Хичээлийн кредит:</b>  3</td>  
        </tr>
        <tr>
            <td><b>Хичээлд элссэн оюутны тоо:</b> 63</td>   
            <td style="padding-left: 80px;"><b>/Магистр, бакалавр, орой/</b></td>  
        </tr>
        <tr>
            <td><b>Багшийн дугаар:</b> is10</td>   
        </tr>
        <tr>
            <td><b>Овог:</b> Төмөрболд</td>   
            <td style="padding-left: 80px;"><b>Нэр:</b> Золбоо</td>  
        </tr>
        <tr>
            <td><b>Тэнхим/салбар/</b> Мэдээллийн Систем</td>   
            <td style="padding-left: 80px;"><b>Албан тушаал:</b> Дадлагажигч багш</td>  
        </tr>
        <tr>
            <td><b>Мэргэжил, боловсрол:</b> Компьютерын ухаан, магистр</td>   
            <td></td>  
        </tr>
    </table>
</div></br>
<table class="table table-striped">
    <tr>
        <td><b>№</b></td>
        <td><b>Он,сар,өдөр</b></td>  
        <td><b>Хүний тоо</b></td>
        <td><b>Хичээлийн хэлбэр</b></td> 
        <td><b>Заасан сэдэв, гүйцэтгэсэн сургалтын ажлын нэр төрөл</b></td>
        <td><b>Цаг</b></td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td><a href="#" class="dateSelect">8/28</a></td>  
        <td><a href="#" class="sCount">30</a></td>
        <td><a href="#" class="lType">Лаб</a></td> 
        <td><a href="#" class="comment">Орчны тохиргоо хийх</a></td>
        <td><a href="#" class="time">2</a></td>
        <td><a href='#' class='icon-remove'></a></td>
    </tr>
    <tr>
        <td>2</td>
        <td>8/28</td>  
        <td>30</td>
        <td>Б/Д</td> 
        <td>Бие даалтын сэдэв сонголт</td>
        <td>2</td>
        <td><a href='#' class='icon-remove'></a></td>
    </tr>
    <tr>
        <td colspan="5"><center><b>8 сар: лекц-2, лаб-6, Б/Д-6</b></center></td>
<td>14</td>
<td></td>
</tr>
<tr>
    <td colspan="5"><center><b>Дүн</b></center></td>
<td>240</td>
<td></td>
</tr>
</table>
</br></br>
<button class="btn btn-small btn-primary" type="button">Баталгаажуулах</button>
<script>
   $(function(){
      $(document).ready(function(){
        $('.dateSelect').editable({
             type: 'date',
             pk: 1,
             name: 'date',
             url: 'post.php',
             title: 'Он,сар,өдөр',
             placement:'right'
        });
        $('.sCount').editable({
             type: 'text',
             pk: 1,
             name: 'sCount',
             url: 'post.php',
             title: 'Хүний тоо',
             placement:'right',
        });
        $('.lType').editable({
            type: 'select',
            pk: 1,
            name: 'lType',
            url: 'post.php',
            title: 'Хичээлийн хэлбэр',
            placement:'right'
        });
        $('.comment').editable({
            type: 'textarea',
            pk:1,
            name: 'comment',
            url: 'post.php',
            title: 'Заасан сэдэв, гүйцэтгэсэн сургалтын ажлын нэр төрөл',
            placement: 'bottom'
        });
        $('.time').editable({
            type: 'text',
            pk:1,
            name: 'time',
            url: 'post.php',
            title: 'Цаг',
            placement: 'right'
        });
        
      }); 
   })(JQuery);
 
</script>