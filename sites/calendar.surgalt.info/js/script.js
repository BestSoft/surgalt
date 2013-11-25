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
    $('.mymodal1').click(function(){
        $.ajax({
            url:'http://localhost/surgalt/sites/calendar.surgalt.info/view/daylist.html.php',
            data:{year:$(this).attr('year'),month:$(this).attr('month'),day:$(this).attr('day')},
            type:'POST'}).done(function(data){
            $('.modal-body').html(data);
            $('#myModal1').modal('show');
        });
    });
    $('.mymodal2').click(function(){
        $.ajax({
            url:'http://localhost/surgalt/sites/calendar.surgalt.info/view/monthlist.html.php',
            data:{year:$(this).attr('year'),month:$(this).attr('month'),day:$(this).attr('day')},
            type:'POST'}).done(function(data){
            $('.modal-body').html(data);
            $('#myModal2').modal('show');
        });
    });
    
    $('a').tooltip({placement: 'top'});
});


