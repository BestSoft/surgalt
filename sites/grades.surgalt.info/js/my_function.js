    function Filter()
    {
    a = $("input[name='haih']");        
        a.focus(function(){
        haih_talbar = $(this).attr("id");
        b = $("td[data_2]");
        c = $("td[turul='"+haih_talbar+"']");
        g = $(this);
        $(this).keyup(function(){
            c.each(function(){
                my_reg = new RegExp(g.val(),"i");
                d = $(this).text().match(my_reg);
                if(d === null)
                {
                    e = parseInt($(this).attr("data_2"));
                    b.each(function(){
                        if(parseInt($(this).attr("data_2")) === e)
                        {
                            $(this).hide();
                        }
                    });
                }
                else
                {
                    f = parseInt($(this).attr("data_2"));
                    b.each(function(){
                        if(parseInt($(this).attr("data_2")) === f)
                        {
                            $(this).show();
                        }
                    });
                }
            });
        }); 
        });
    }
    function MateTotal()
    {
        niit = 0;
        $("td[total='Avah']").each(function(){
            a = $(this).text();
            niit = niit + parseInt(a);
        });
        $("td[total='Total_pnt']").html(niit); 

        niit = 0;
        $("td[total='Avsan']").each(function(){
            a = $(this).text();
            niit = niit + parseInt(a);
        });
        $("td[total='Total_pnt_get']").html(niit); 

        niit = 0;
        $("td[total='Lesson_credit']").each(function(){
            a = $(this).text();
            niit = niit + parseInt(a);
        });
        $("td[total='Total_credit']").html(niit);

        niit = 0;
        tooluur = 0;
        $("td[total='Lesson_too']").each(function(){
            a = $(this).text();
            niit = niit + parseFloat(a);
            tooluur++;
        });
        niit = niit / tooluur;
        $("td[total='Total_gpa']").html(niit);
    }
    
    function LeftAccorionMenu()
    {
    $("div.neg_2").children("i.glyphicon-plus").click(function(){
        $(this).attr("class","glyphicon glyphicon-minus");
        $(this).siblings("div").slideDown();
        $(this).parent().siblings("div").children("div").slideUp();
        $(this).parent().siblings("div").children("i.glyphicon-minus").attr("class","glyphicon glyphicon-plus");
    });
    $("li.neg_2").children("i.glyphicon-plus").click(function(){
        $(this).parent("li").siblings("li").children("div").slideUp();
        $(this).siblings("div").slideDown();
        $(this).removeClass("glyphicon-plus").addClass("glyphicon-minus");
        $(this).parent("li").siblings("li").children("i").removeClass("glyphicon-plus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
    }