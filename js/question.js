$('#submit-btn').click(function () {
    var submitReq = $.ajax({
        type: 'POST',
        url : 'ans_que.php',
        data: $('#final_form').serialize(),
    });
    submitReq.done(function (data) {
        console.log(data);
        var loginAlert = $('#success');
        loginAlert.html("Score is "+data);
        loginAlert.slideDown('fast');
    })
});