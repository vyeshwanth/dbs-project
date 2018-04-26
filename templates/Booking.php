<?php
class Booking{
	   private $team1_id;
    private $team2_id;
    private $team1_name;
    private $team2_name;
    private $time;
    private $venue_id;
    private $venue_name;
    private $venue_location;
    private $booking_id;
    private $user_id;
    private $seating_type;
    private $no_of_tickets;
    private $bill_amount;
    private $payment_type;
    function __construct($team1_id, $team2_id, $team1_name, $team2_name, $time, $venue_id, $venue_name, $venue_location,$booking_id,$user_id,$seating_type,$no_of_tickets,$bill_amount,$payment_type)
    {
        $this->team1_id = $team1_id;
        $this->team2_id = $team2_id;
        $this->team1_name = $team1_name;
        $this->team2_name = $team2_name;
        $this->time = $time;
        $this->venue_id = $venue_id;
        $this->venue_name = $venue_name;
        $this->venue_location = $venue_location;
        $this->booking_id = $booking_id;
        $this->user_id = $user_id;
        $this->seating_type = $seating_type;
        $this->no_of_tickets = $no_of_tickets;
        $this->bill_amount = $bill_amount;
        $this->payment_type = $payment_type;
    }
    public function getTeam1()
    {
        return $this->team1_name;
    } 
    public function getTeam2()
    {
        return $this->team2_name;
    }
    public function getBookingId()
    {
        return $this->booking_id;
    }
        public function getVenue()
    {
        return $this->venue_name;
    }
        public function getVenueLocation()
    {
        return $this->venue_location;
    }
        public function getSeating()
    {
        return $this->seating_type;
    } 
        public function getTickets()
    {
        return $this->no_of_tickets;
    }
        public function getPaymode()
    {
        return $this->payment_type;
    }          
	    public static function getBooking(mysqli $con){


        $sql = "SELECT g.game_id, g.team1, g.team2, g.time, t1.team_name as team1_name, t2.team_name as team2_name, venue_id, venue_name, location,booking_id,user_id,s.seating_name,no_of_tickets,bill_amount,p.payment_mode 
        from game g, team t1, team t2,user, venue,booking b,seating_type s,payment p 
        WHERE g.team1 = t1.team_id AND g.team2 = t2.team_id AND g.venue = venue.venue_id AND b.user_id=email_id AND b.seating_type=s.seating_id AND b.game_id=g.game_id AND b.payment_mode=p.payment_id";

        $result = $con->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $team1_id = $row['team1'];
            $team2_id = $row['team2'];
            $team1_name = $row['team1_name'];
            $team2_name = $row['team2_name'];
            $time = $row['time'];
            $venue_id = $row['venue_id'];
            $venue_name = $row['venue_name'];
            $venue_location = $row['location'];
            $booking_id=$row['booking_id'];
            $user_id=$row['user_id'];
            $seating_type=$row['seating_name'];
            $no_of_tickets=$row['no_of_tickets'];
            $bill_amount=$row['bill_amount'];
            $payment_type=$row['payment_mode'];
        }
        $book=new Booking($team1_id, $team2_id, $team1_name, $team2_name, $time, $venue_id, $venue_name, $venue_location,$booking_id,$user_id,$seating_type,$no_of_tickets,$bill_amount,$payment_type);

        return $book;        
    }
}
?>