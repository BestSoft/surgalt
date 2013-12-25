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
    <div id="datetimepicker1" class="input-append date" style="z-index: 1">
        <input name="strdt" data-format="yyyy-MM-dd hh:mm:ss" type="text"></input>
    <span class="add-on glyphicon glyphicon-time" data-time-icon="icon-time" data-date-icon="icon-calendar">

    </span>
    </div>
    <script type="text/javascript">
      $(function() {
        $('#datetimepicker1').datetimepicker({
          language: 'pt-BR'
        });
      });
    </script>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Дуусах</label>
      <div id="datetimepicker2" class="input-append date" style="z-index: 1">
      <input name="enddt" data-format="yyyy-MM-dd hh:mm:ss" type="text"></input>
      <span class="add-on glyphicon glyphicon-time" data-time-icon="icon-time" data-date-icon="icon-calendar">

      </span>
    </div>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker2').datetimepicker({
        language: 'pt-BR'
      });
    });
  </script>
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
                    <script>
                   $("document").ready(function(){
                                   $(".daily").show();
                                   $(".weekly").hide();
                                   $(".monthly").hide();
                                   $(".yearly").hide();
                       $(".group-radio input").change(function(){
                           var checked = $(".group-radio input:checked");
                           console.log(checked.val());
                           switch(checked.val()){
                               case '1':
                                   $(".daily").show();
                                   $(".weekly").hide();
                                   $(".monthly").hide();
                                   $(".yearly").hide();
                                   break;
                               case '2':
                                   $('.daily').hide();
                                   $(".weekly").show();
                                   $(".monthly").hide();
                                   $(".yearly").hide();
                                   break;
                               case '3':
                                   $('.daily').hide();
                                   $(".weekly").hide();
                                   $(".monthly").show();
                                   $(".yearly").hide();
                                   break;
                               case '4':
                                   $('.daily').hide();
                                   $(".weekly").hide();
                                   $(".monthly").hide();
                                   $(".yearly").show();
                                   break;
                               default:
                                   $('.daily').hide();
                                   $(".weekly").hide();
                                   $(".monthly").hide();
                                   $(".yearly").hide();
                            }
                       });
                    });
                    </script>
                        <td>
                            <div class="group-radio">
                            <div class="radio" id="dailyradio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
                                  Every day
                                </label>
                            </div>
                            <div class="radio" id="weeklyradio">
                                <label>
                                    <input type="radio" name="optionsRadios" class="optionsRadios2" value="2">
                                    Every week
                                </label>
                            </div>
                            <div class="radio" id="monthlyradio">
                                <label>
                                  <input type="radio" name="optionsRadios" class="optionsRadios3" value="3">
                                  Every month
                                </label>
                            </div>
                            <div class="radio" id="yearlyradio">
                                <label>
                                  <input type="radio" name="optionsRadios" class="optionsRadios4" value="4">
                                 Every year
                                </label>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="daily">
                                <div class="radio">
                                    <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1">
                                        Every
                                        <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=999; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                        </select>
                                        days
                                </div>
                                <div class="radio">
                                      <input type="radio" name="optionsRadios1" id="optionsRadios1" value="2">
                                     Every weekdays 
                                </div>
                            </div>
                            <div class="weekly" style="">
                                    Recur every
                                    <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=99; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                    </select>
                                    week(s) on
                                    <br>
                                    <input type="checkbox" id="inlineCheckbox1" value="monday"> Monday 
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="tuesday"> Tuesday
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="wednesday"> Wednesday
                                  </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="thursday"> Thursday
                                  </label>
                                  <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="friday"> Friday
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="saturday"> Saturday
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="sunday"> Sunday
                                  </label>
                            </div>
                            <div class="monthly" style="">
                                <div class="radio">
                                    <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1" checked>
                                    Day <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=31; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                    </select>
                                    of every <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=99; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                    </select>
                                    month's
                                </div>
                                <div class="radio">
                                    <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1" checked>
                                    The <select name="weeklyselect">
                                                        <option>First</option>
                                                        <option>Second</option>
                                                        <option>Third</option>
                                                        <option>Fourth</option>
                                                        <option>Last</option>
                                    </select>
                                    <select name="weeklyselect">
                                                        <option>Day</option>
                                                        <option>Weekday</option>
                                                        <option>Weekend day</option>
                                                        <option>Sunday</option>
                                                        <option>Monday</option>
                                                        <option>Tuesday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                    </select>
                                    of every <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=99; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                    </select> month's
                                </div>
                            </div>
                            <div class="yearly" style="">
                                <div class="radio">
                                    <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1" checked>
                                    Every <select name="weeklyselect">
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                    </select>
                                    <select name="dailyselect">
                                            <?php
                                            for($i=1; $i<=31; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1" checked>
                                    The <select name="weeklyselect">
                                                        <option>First</option>
                                                        <option>Second</option>
                                                        <option>Third</option>
                                                        <option>Fourth</option>
                                                        <option>Last</option>
                                    </select>
                                    <select name="weeklyselect">
                                                        <option>Day</option>
                                                        <option>Weekday</option>
                                                        <option>Weekend day</option>
                                                        <option>Sunday</option>
                                                        <option>Monday</option>
                                                        <option>Tuesday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                    </select>
                                    of
                                    <select name="weeklyselect">
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                    </select>
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


