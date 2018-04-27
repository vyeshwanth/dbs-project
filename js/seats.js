$('#no-of-seats').change(function () {
    var selectedSeatingPrice = $('#seating-type option:selected').attr('data-seating-price');
    $('#bill-amount').val(selectedSeatingPrice * $(this).val());
});

$('#apply-coupon').change(function () {
   var couponApplied = $(this).is(':checked');
   if(couponApplied) {
       var selectedSeatingPrice = $('#seating-type option:selected').attr('data-seating-price');
       var currentBill = $('#bill-amount').val();
       $('#bill-amount').val(currentBill - selectedSeatingPrice);
   }
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