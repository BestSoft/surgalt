$(document).ready(function(){
  $('#btn').popover({ 
    title : 'Хэрэглэгчийн мэдээлэл',
    placement : 'bottom',
    html : true,
    content: function() {
      return $('#Settings').html();
    }
  });
  $("li").hide();
  $(".algaboldog").fadeIn(function(){
      while($(".algaboldog"))
      {
          $(this).next();
      };
  });
});

