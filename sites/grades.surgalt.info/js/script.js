$(document).ready(function(){
        
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
        niit = niit.toFixed(2);
        $("td[total='Total_gpa']").html(niit);
        
        
        
        
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
    });