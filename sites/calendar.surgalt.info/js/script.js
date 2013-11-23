$(document).ready(function(){
    $('.mymodal').click(function(){
        $.ajax({
            url:'http://localhost/surgalt/sites/calendar.surgalt.info/view/event.html.php',
            data:{day:$(this).attr('day')},
            type:'POST'}).done(function(data){
            $('.modal-body').html(data);
            $('#myModal').modal('show');
        });
    });
    $('.recurencetable').hide();
    $('a').tooltip({placement: 'top'});
});


