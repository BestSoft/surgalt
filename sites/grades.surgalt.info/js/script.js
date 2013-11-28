$(document).ready(function(){
    $(".dun_2").editable({
                url: 'sites/grades.surgalt.info/ajax_insert.php',
                title: 'Дүн оруулах',
                success : function(data,response)
                {
                    //console.log(response);
                   // console.log(this);
                    
                     huuchin_utga = (this.value);
                     shine_utga = (this.$input.val());
                     pk = this.settings.pk;
                     name = this.name;
                        rework_average(pk,huuchin_utga,shine_utga);
                        rework_max(pk,huuchin_utga,shine_utga);
                        rework_min(pk,huuchin_utga,shine_utga);
                        rework_total(name,huuchin_utga,shine_utga);
                } 
                });
        $(".dun").click(function(){
            $(this).siblings().attr("class","dun btn");
            $(this).addClass("active btn-success");
        });
        $(".dun_1").click(function(){
            ene = $(this);
            value = $("#songolt_dun .dun.active");
            pk = ene.attr("data_1");
            name = ene.attr("data_2");
            utga = value.val();
            tovch = value.attr("tovch");
            $(this).html("<img src='sites/grades.surgalt.info/4.gif'>");
            $.ajax({
                url: 'sites/grades.surgalt.info/my_22.php',
                type: 'POST',
                data: {
                    pk: pk,
                    name: name,
                    onoo: utga,
                    useg: tovch
                },
                success: function(result)
                {
                    ene.text(result);
                },
                fail: function(result)
                {
                    alert(result);
                }
            });
        });
        $(".neg_2").children("i.glyphicon-plus").click(function(){
            $(this).attr("class","glyphicon glyphicon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i.glyphicon-minus").attr("class","glyphicon glyphicon-plus");
        });
         
        var total = 0;
        $("td.Avj_boloh_onoo").each(function(){
            var val = $(this).text();
            total+=parseInt(val);
        });
        $("td.total_avj_boloh").text(total);
        var total = 0;
        $("td.Uuriin_onoo").each(function(){
            var val = $(this).text();
            total+=parseInt(val);
        });
        $("td.total_uurin_onoo").text(total);
        $(".dun").click(function(){
            $(this).siblings().attr("class","dun btn");
            $(this).addClass("active btn-success");
        });
      
//        $(".username").keyup(function(){
//            var shuult = $(this).val();
//            shuult_1 = $(".dun_4");
//            shuult_1.each(function(){
//                cond1 = $(this).attr("data_2");
//                if(cond1 !== shuult)
//                {
//                    $(this).hide();
//                }
//                else
//                {
//                    $(this).show();
//                }
//            });
//        });
        
    });