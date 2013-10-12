$(document).ready(function(){
    $('.mymodal').click(function(){
        $.ajax({url:'details.php',data:{day:$(this).attr('day')},type:'POST'}).done(function(data){
            /*$('#myModal .modal-body').html(data);*/
            $('#myModal .modal-body').html(data);
            $('#myModal').modal('show');
        });
    });
});