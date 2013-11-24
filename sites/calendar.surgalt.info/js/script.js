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
    $('.showlistbyday').click(function(){
        $.ajax({
            url:'http://localhost/surgalt/sites/calendar.surgalt.info/view/daylist.html.php',
            data:{year:$(this).attr('year'),month:$(this).attr('month'),day:$(this).attr('day')},
            type:'POST'}).done(function(data){
            $('.col-md-12').html(data);
        });
    });
    
    $('a').tooltip({placement: 'top'});
});


