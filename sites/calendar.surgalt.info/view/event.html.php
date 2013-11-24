<?php
$d = $_POST['day'];
echo $d;
?>

<input style="display: none;" type="text" class="form-control input-sm" id="inputday" name="day" value="<?php echo $d;?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Гарчиг</label>
    <div class="col-sm-10">
        <input type="text" class="form-control input-sm" id="inputEmail3" name="title" placeholder="Гарчиг">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Байршил</label>
    <div class="col-sm-10">
        <input type="text" class="form-control input-sm" id="inputPassword3" name="location" placeholder="Байршил">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Хавчуурга</label>
    <div class="col-sm-10">
        <input type="text" class="form-control input-sm" id="inputPassword3" name="tag" placeholder="Хавчуурга">
    </div>
  </div>
    <center><h3>Хугацаа</h3></center>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Эхлэх</label>
    <div class="col-sm-10">
        <input type="date" class="form-control input-sm" name="strdt" id="inputPassword3">        
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Дуусах</label>
    <div class="col-sm-10">
        <input type="date" class="form-control input-sm" name="enddt" id="inputPassword3">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> Төлөв </label>
    <div class="col-sm-10">
        <input type="text" class="form-control input-sm" id="inputPassword3" name="stts" placeholder="Төлөв">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> Тайлбар </label>
    <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="desc" placeholder="Тайлбар"></textarea>
    </div>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="isprivate" value="1"> <b>Хувийн эсэх</b>
    </label>
  </div>
    <script>
        $('.recurencetable').hide();
        $('.reccheck').click(function(){
            $('.recurencetable').toggle();
        });
    </script>
  <div class="checkbox recurence">
    <label>
        <input type="checkbox" class="reccheck" value="1" name="rptable"> <b>Давтагдах эсэх</b>
    </label>
  </div>
    <style>
    </style>
    <div class="recurencetable">
    <table>
        <tr>
            <td>
                <div class="radio" id="dailyradio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                      Өдөр тутам
                    </label>
                </div>
                <div class="radio" id="weeklyradio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="2">
                        Долоо хоног тутам
                    </label>
                </div>
                <div class="radio" id="monthlyradio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="3">
                      Сар бүр
                    </label>
                </div>
                <div class="radio" id="yearlyradio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="4">
                     Жил бүр
                    </label>
                </div>
            </td>
            <td>
                <div class="daily">
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1" checked>
                         Жил бүр
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios1" id="optionsRadios1" value="2">
                         Жил бүр
                        </label>
                    </div>
                </div>
                <div class="weekly" style="display: none;">
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios2" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios2" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                </div>
                <div class="monthly" style="display: none;">
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios3" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios3" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                </div>
                <div class="yearly" style="display: none;">
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios4" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios4" id="optionsRadios1" value="option1" checked>
                         Жил бүр
                        </label>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    </div>
    <div class="radio">
        <label>
          <input type="radio" name="optionsRadios5" id="optionsRadios1" value="option1" checked>
         Дуусах хугацаагүй
        </label>
    </div>
    <div class="radio">
        <label>
          <input type="radio" name="optionsRadios5" id="optionsRadios1" value="option1" checked>
         Дуусах
        </label>
    </div>
    <div class="radio">
        <label>
          <input type="radio" name="optionsRadios5" id="optionsRadios1" value="option1" checked>
         Дуусах
        </label>
    </div>


