$('#login-btn').click(function () {
   sendLoginRequest();
});

$('#signup-btn').click(function () {
    sendSignupRequest();
});

function sendLoginRequest() {
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

function sendSignupRequest() {
    var password = $('#signup-password').val();
    var confirmPassword = $('#confirm-password').val();
    if(password != confirmPassword)
    {
        var signupAlert = $('#signup-alert');
        signupAlert.removeClass('alert-success').addClass('alert-danger').html('Both the passwords doesn\'t match');
        signupAlert.slideDown('fast');
        return;
    }
    var signupForm = $('#signup-form');
    var signupReq = $.ajax({
        url: 'signup.php',
        type: 'POST',
        data: signupForm.serialize(),
        dataType: 'json'
    });
    signupReq.done(function (data) {
        signup(data);
    });
}

function signup(data) {
    console.log(data);
    var signupAlert = $('#signup-alert');
    if(data.status === true)
    {
        signupAlert.removeClass('alert-danger').addClass('alert-success');
    }
    else
    {
        signupAlert.removeClass('alert-success').addClass('alert-danger');
    }
    signupAlert.html(data.message).slideDown('fast');
}