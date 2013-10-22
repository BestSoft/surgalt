<table id="Recurence" >
        <tr>
            <td style="width: 100px;">
                <label class="radio">
                    <input id="Radio1" type="radio" name="optionsRadios" value="option1" checked="true">
                    Daily
                </label>
                <label class="radio">
                    <input id="Radio2" type="radio" name="optionsRadios" value="option2">
                    Weekly
                </label>
                <label class="radio">
                    <input id="Radio3" type="radio" name="optionsRadios"  value="option3">
                    Monthly
                </label>
                <label class="radio">
                    <input id="Radio4" type="radio" name="optionsRadios" value="option4">
                    Yearly
                </label>
            </td>
            <td>
                <div id="Hide_hiih">
                    <div id="option1" class="option" style="width: 1000px;" >
                        
                    <label class="radio" style="float: left;">
                        <input id="Radio4" type="radio" name="dailyOptionRadio" value="option1">
                        Every&nbsp;
                    </label>
                    <label class="inline">
                        <input type="number" name="quantity" min="1" max="999" style="width: 50px;">day(s)
                    </label>
                        <label class="radio">
                        <input id="Radio4" type="radio" name="dailyOptionRadio" value="option1">
                        Every weekdays
                    </label>
                </div>
                <div id="option2" class="option">
                    Recur every
                    <input type="number" name="quantity" min="1" max="99" style="width: 50px;">week(s) on<br>
                    <input class="checkbox-inline" type="checkbox"> Sun
                    <input class="checkbox-inline" type="checkbox"> Mon
                    <input class="checkbox-inline" type="checkbox"> Tue
                    <input class="checkbox-inline" type="checkbox"> Wed<br>
                    <input class="checkbox-inline" type="checkbox"> Thu
                    <input class="checkbox-inline" type="checkbox"> Fri
                    <input class="checkbox-inline" type="checkbox"> Sat
                </div>
                <div id="option3" class="option">
                    <input type="radio" name="monthlyOption">Day&nbsp;<input type="number" name="monthly1" min="1" max="31" style="width: 50px;">
                    &nbsp;Of every&nbsp;
                    <input type="number" name="monthly1" min="1" max="12" style="width: 50px;">
                    &nbsp;month(s)<br>
                    <input type="radio" name="monthlyOption">
                    The
                    <select style="width: 90px;">
                        <option>First</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                        <option>Last</option>
                    </select>
                    <select style="width: 100px;">
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
                    &nbsp;of every
                    <input type="number" name="monthly1" min="1" max="99" style="width: 30px;">
                    &nbsp;month(s)
                </div>
                <div id="option4" class="option">
                    <input type="radio" name="yearly">
                    Every&nbsp;
                    <select>
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
                    <input type="number" name="monthly1" min="1" max="31" style="width: 30px;">
                    <br>
                    <input type="radio" name="yearly">
                    The
                    <select style="width: 100px;">
                        <option>First</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                        <option>Last</option>
                    </select>
                    <select style="width: 100px;">
                        <option>Day</option>
                        <option>Week day</option>
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
                    <select style="width: 100px;">
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
        <tr>
            <td style="padding-left: 20px;">
                <input type="radio" name="other"/>No end date<br>
                <input type="radio" name="other"/>End after
                <input type="number" min="1" max="999" style="width: 50px;"/><br>
                <input type="radio" name="other"/>End by
                <input type="date" style="width: 241px;"/>       
            </td>
        </tr>
    </table>