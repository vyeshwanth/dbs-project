$(document.ready(function () {
    $('#submit-btn').click(function () {
        var submitReq = $.ajax({
            type: 'POST',
            url : '.php',
            data: $('#final_form').serialize(),
            dataType: 'json'
        });
        submitReq.done(function (data) {

        })
    });
}));