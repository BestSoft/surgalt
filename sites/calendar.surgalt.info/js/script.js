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
    $(document).ready(function(){
        $('#Recurence').hide();
        $('#isrepeat').click(function(){
            $('#Recurence').toggle(this.checked);
        });$('#Recurence').click(function(){
            $('#Hide_hiih').show();
        });
        $("#Radio1").click(function(){
            $("#option1").show(this.checked);
            $("#option1").siblings(".option").hide();
        });
        $("#Radio2").click(function(){
            $("#option2").show();
            $("#option2").siblings(".option").hide();
        });
        $("#Radio3").click(function(){
            $("#option3").show();
            $("#option3").siblings(".option").hide();
        });
        $("#Radio4").click(function(){
            $("#option4").show();
            $("#option4").siblings(".option").hide();
        });
});
    
});

