function Average_my(cnt_id){
    var a = $("a.dun_2[data-pk='"+cnt_id+"']");
               var sum = 0;
               var average = 0;
               a.each(function(){
                    average+= parseInt($(this).text());
                    sum++;
               });
               average = average/sum;
               $("td.average[data-pk='"+cnt_id+"']").text(average);
           }
function Max_my(cnt_id)
{
    var a = $("a.dun_2[data-pk='"+cnt_id+"']");
               var max = 0;
               var total = [];
               a.each(function(){
                   total.push(parseInt($(this).text()));
               });
               max = Math.max.apply(Math,total);
               $("td.max_pnt[data-pk='"+cnt_id+"']").text(max);
}
function Min_my(cnt_id)
{
    var a = $("a.dun_2[data-pk='"+cnt_id+"']");
               var min = 0;
               var total = [];
               a.each(function(){
                   total.push(parseInt($(this).text()));
               });
               min = Math.min.apply(Math,total);
               $("td.min_pnt[data-pk='"+cnt_id+"']").text(min);
}

function Total_my(user_id)
{
    var a = $("a.dun_2[data-name='"+user_id+"']");
               var total = 0;
               a.each(function(){
                   total = total + (parseInt($(this).text()));
               });
               $("td.total_pnt[data-name='"+user_id+"']").text(total);
}

function Reset_my(user_id,cnt_id)
{
    Total_my(user_id);
    Min_my(cnt_id);
    Max_my(cnt_id);
    Average_my(cnt_id);
}
function rework_average(cnt_id,last_val,new_val)
{
    var b = $("a.dun_2[data-pk='"+cnt_id+"']");
    var niit_onoo = 0;
    var total = 0;
               b.each(function(){
                   niit_onoo+= parseInt($(this).text());
                   total++;
               });
    a = $("td.average[data-pk='"+cnt_id+"']");
    zoruu = new_val - last_val;
    result = (niit_onoo + zoruu)/total;
    a.text(result);        
}

function rework_max(cnt_id,last_val,new_val)
{
    var a = $("a.dun_2[data-pk='"+cnt_id+"']");
               var max = 0;
               var total = [];
               a.each(function(){
                   if(parseInt($(this).text()) === parseInt(last_val))
                   {
                       total.push(0);
                   }
                   else
                   {
                       total.push(parseInt($(this).text()));
                   }
               });
               total.push(parseInt(new_val));
               console.log(total);
               max = Math.max.apply(Math,total);
               $("td.max_pnt[data-pk='"+cnt_id+"']").text(max);
        
}

function rework_min(cnt_id,last_val,new_val)
{
    var a = $("a.dun_2[data-pk='"+cnt_id+"']");
               var max = 0;
               var total = [];
               a.each(function(){
                   if(parseInt($(this).text()) === parseInt(last_val))
                   {
                       total.push(1000);
                   }
                   else
                   {
                       total.push(parseInt($(this).text()));
                   }
               });
               total.push(parseInt(new_val));
               
               max = Math.min.apply(Math,total);
               $("td.min_pnt[data-pk='"+cnt_id+"']").text(max);
        
}

function rework_total(name,last_val,new_val)
{
    var a = $("a.dun_2[data-name='"+name+"']");
               var total = 0;
               a.each(function(){
                   total = total + (parseInt($(this).text()));
               });
               zoruu = new_val - last_val;
               total = total + zoruu;
               $("td.total_pnt[data-name='"+name+"']").text(total);
}