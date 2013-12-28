$(document).ready(function(){
    
    $("div.neg_2").children("i.glyphicon-plus").click(function(){
        $(this).attr("class","glyphicon glyphicon-minus blue");
        $(this).siblings("div").slideDown();
        $(this).parent().siblings("div").children("div").slideUp();
        $(this).parent().siblings("div").children("i.glyphicon-minus").attr("class","glyphicon glyphicon-plus");
    });
    $("li.neg_2").children("i.glyphicon-plus").click(function(){
        $(this).parent("li").siblings("li").children("div").slideUp();
        $(this).siblings("div").slideDown();
        $(this).removeClass("glyphicon-plus").addClass("glyphicon-minus blue");
        $(this).parent("li").siblings("li").children("i").removeClass("glyphicon-plus").removeClass("glyphicon-minus blue").addClass("glyphicon-plus");
    });
    
});
    