$(document).ready(function () {
    $('#save-btn').click(function () {
        var email_id = $('#Input').val();
        var first_name = $('#Input1').val();
        var last_name = $('#Input2').val();
        var old_psw = $('#inputPassword1').val();
        var new_psw = $('#inputPassword2').val();
        console.log(email_id,first_name,last_name,old_psw,new_psw);
        var saveReq = $.ajax({
            type: 'POST',
            url : 'update_profile.php',
            data: {
                "email_id" : email_id,
                "first_name" : first_name,
                "last_name" : last_name,
                "old_psw" : old_psw,
                "new_psw" : new_psw
            },
        });
        saveReq.done(function (data) {
            console.log(data);
        });
    });
});


