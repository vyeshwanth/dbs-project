$('.cancel-booking-btn').click(function () {
    var bookingId = $(this).attr('data-booking-id');
    console.log(bookingId);
    sendCancelRequest(bookingId);
});

function sendCancelRequest(bookingId) {
    var cancelReq = $.ajax({
        type: 'POST',
        url : 'cancel_booking.php',
        data: {
            "booking_id" : bookingId
        },
        dataType: 'json'
    });
    cancelReq.done(function (data) {
        console.log(data);
        var cancelBookingAlert = $('#cancel-booking-alert');
        if(data.status === true)
        {
            cancelBookingAlert.removeClass('alert-danger').addClass('alert-success');
            setInterval(function () {
                location.reload();
            }, 3000)
        }
        else
        {
            cancelBookingAlert.removeClass('alert-success').addClass('alert-danger');
        }
        cancelBookingAlert.html(data.message).slideDown('fast');
    });
}