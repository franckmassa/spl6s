$(function () {
    $('#login').blur(function () {
        $.post('controllers/registerCtrl.php', { loginVerify:$(this).val() } , function (data) {
            if(data == 1){
                $('#login').addClass('bg-danger');
                $('#register').hide();
            }else{
               $('#login').removeClass('bg-danger'); 
                $('#register').show();
            }
        },
        'JSON');
    });
});

