<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Booking Details</th>
    </tr>
    </thead>
   <tbody>
    <tr>
        <th scope="column">Booking Id</th>
        <td><?php echo $book->getBookingId()?></td>
    </tr>
    <tr>
        <th scope="column">Team 1</th>
        <td><?php echo $book->getTeam1() ?></td>
    <tr>
        <th scope="column">Team2</th>
        <td><?php echo $book->getTeam2() ?></td>
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
    </tbody>    
</table>