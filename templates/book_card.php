<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="column">Booking Id</th>
        <th class="booking-id"><?php echo $book->getBookingId()?></th>
    </tr>
    </thead>
   <tbody>
    <tr>
        <th scope="column">Match</th>
        <td><?php echo $book->getTeam1() . 'VS' . $book->getTeam2()?></td>
    </tr>
    <tr>
        <th scope="column">Venue</th>
        <td><?php echo $book->getVenue() ?></td>
    </tr>
    <tr>
        <th scope="column">Venue Location</th>
        <td><?php echo $book->getVenueLocation() ?></td>
    </tr>
    <tr>
        <th scope="column">Seating</th>
        <td><?php echo $book->getSeating() ?></td>
    </tr>
    <tr>
        <th scope="column">No of Tickets</th>
        <td><?php echo $book->getTickets() ?></td>
    </tr>
    <tr>
        <th scope="column">Payment Mode</th>
        <td><?php echo $book->getPaymode() ?></td>
    </tr>
    <tr>
        <th scope="column" colspan="2"><button class="btn btn-danger cancel-booking-btn" data-booking-id="<?php echo $book->getBookingId(); ?>">Cancel Booking</button></th>
    </tr>
    </tbody>
</table>