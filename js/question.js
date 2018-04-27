$('#submit-btn').click(function () {
    var submitReq = $.ajax({
        type: 'POST',
        url : 'ans_que.php',
        data: $('#final_form').serialize(),
    });
    submitReq.done(function (data) {
        console.log(data);
        if(data < 5)
        {
            var submissionAlert = $('#success');
            submissionAlert.html("Score is "+data);
            submissionAlert.slideDown('fast');
        }
        else
        {
            var successalert = $('#coupon');
            successalert.html("Yayy!!you got a coupon");
            successalert.slideDown('fast');
        }
    })
});