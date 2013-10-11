$(document).ready(function(){
  $('#btn').popover({ 
    title : 'Хэрэглэгчийн мэдээлэл',
    placement : 'bottom',
    html : true,
    content: function() {
      return $('#Settings').html();
    }
  });
  $(".algaboldog").fadeIn(function(){
      while($(".algaboldog"))
      {
          $(this).next();
      };
  });
});
var num = 100; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#1').fadeOut();
    } else {
        $('#1').fadeIn();
    }
});
