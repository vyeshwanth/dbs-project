$('#no-of-seats').change(function () {
    var selectedSeatingPrice = $('#seating-type option:selected').attr('data-seating-price');
    $('#bill-amount').val(selectedSeatingPrice * $(this).val());
});

$('#book-btn').click(function () {
    sendBookingRequest();
});

function sendBookingRequest() {
    var bookingForm = $('#booking-form');
    var bookingReq = $.ajax({
        type: 'POST',
        url : 'book_tickets.php',
        data: bookingForm.serialize(),
        dataType: 'json'
    });
    bookingReq.done(function (data) {
        console.log(data);
    });
}