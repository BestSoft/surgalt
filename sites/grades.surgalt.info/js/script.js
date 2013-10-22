$(document).ready(function(){
        $(".neg_2").children("i.icon-plus").click(function(){
            $(this).attr("class","icon-minus");
            $(this).siblings("div").slideDown();
            $(this).parent().siblings("div").children("div").slideUp();            
            $(this).parent().siblings("div").children("i.icon-minus").attr("class","icon-plus");
        });
    });