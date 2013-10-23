<style>
   #Hide_hiih
    {
        display: none;
        margin-left: 15px;
    }
    .option
    {
        display: none;
    }
    
    </style>
<script>
    $(document).ready(function(){
        $('#Recurence').hide();
        $('#isrepeat').click(function(){
            $('#Recurence').toggle(this.checked);
        });$('#Recurence').click(function(){
            $('#Hide_hiih').show();
        });
        $("#Radio1").click(function(){
            $("#option1").show(this.checked);
            $("#option1").siblings(".option").hide();
        });
        $("#Radio2").click(function(){
            $("#option2").show();
            $("#option2").siblings(".option").hide();
        });
        $("#Radio3").click(function(){
            $("#option3").show();
            $("#option3").siblings(".option").hide();
        });
        $("#Radio4").click(function(){
            $("#option4").show();
            $("#option4").siblings(".option").hide();
        });
});
</script>
<?php 
$d =  $_POST["day"];
?>
<form method="POST">
    <table>
        <tr>
            <td>
                <input type="text" style="width: 500px;" name="title" placeholder="Гарчигаа оруулна уу!"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" style="width: 241px;" name="location" placeholder="Байршилаа оруулна уу!"/>
                <input type="text" style="width: 241px;" name="Label" placeholder="Enter the label">
            </td>
        </tr>
        <tr>
            <td>
                <p style="float: left;">Эхлэх цаг</p> <p style="float: right;">Дуусах цаг</p>
            </td>
        </tr>
        <tr>
            <td>
                <input name="starttime" type="datetime-local" style="width: 241px;"/>
                <input name="endtime" type="datetime-local" style="width: 241px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <select name="Status" placeholder="Please choose" style="width: 255px;">
                    <option selected="true" value="0">Төлөв сонгоно уу!</option>
                    <option value="1">Сонголт 1</option>
                    <option value="2">Сонголт 2</option>
                    <option value="3">Сонголт 3</option>
                    <option value="4">Сонголт 4</option>
                    <option value="5">Сонголт 5</option>               
                </select>
                <label class="checkbox" style="float: right; margin-right: 100px;">
                    <input name="isday" type="checkbox"> Бүтэн өдөр эсэх<div id="ss"></div>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="description" placeholder="Тайлбараа оруулна уу!" style="width: 500px; resize: vertical;" wrap="hard" ></textarea>
            </td>
        </tr>
    </table>
    <label class="checkbox">
        <input id="isrepeat" name="isrepeat" type="checkbox"> Давтагдах эсэх</input>
    </label>
    <div id="Recurence">
    <?php
include 'recurence.php';
    ?>
        </div>
</form>