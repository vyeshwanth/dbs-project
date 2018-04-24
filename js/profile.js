$('#save-btn').click(function () {
    sendUpdateRequest();
});

function sendUpdateRequest() {
    var loginForm = $('#login-form');
    var loginReq = $.ajax({
        type: 'POST',
        url : 'login.php',
        data: loginForm.serialize(),
        dataType: 'json',
    });
    loginReq.done(function (data) {
        login(data);
    });
}

function login(data) {
    console.log(data);
    if(data.status === true)
    {
        location.reload();
    }
    else
    {
        var loginAlert = $('#login-alert');
        loginAlert.html(data.message);
        loginAlert.slideDown('fast');
    }
}