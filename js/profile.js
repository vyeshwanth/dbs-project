var deletecount = 0;
var email_id = $('#Input').val();
var first_name = $('#Input1').val();
var last_name = $('#Input2').val();
var old_psw = $('#inputPassword1').val();
var new_psw = $('#inputPassword2').val();

$(document).ready(function () {
    $('#save-btn').click(function () {
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
            dataType: 'json'
        });
        saveReq.done(function (data) {
            console.log(data);
            console.log(data.status);
            if(data.status == true)
            {
                location.reload();
            }
            else
            {
                alert(data);
            }
        });
    });
    
    $('#delete-user-btn').click(function () {
        if(deletecount == 0)
        {
            var delete_alert = $('#delete-alert');
            delete_alert.html("Please Confirm delete? (Click delete button again)");
            delete_alert.slideDown('fast');
            deletecount = 1;
        }
        else if(deletecount == 1)
        {
            var delete_alert = $('#delete-alert');
            delete_alert.html("Deletion Successful");
            delete_alert.slideDown('fast');
            deletecount = 0;
            var deleteReq = $.ajax({
                type: 'POST',
                url : 'delete_profile.php',
                data: {
                    "email_id" : email_id,
                },
                dataType: 'json'
            });
            deleteReq.done(function (data) {
                console.log(data);
                console.log(data.status);
                if(data.status == true)
                {
                    location.href = "index.php";
                }
                else
                {
                    alert(data);
                }
            });
        }
    });
});


