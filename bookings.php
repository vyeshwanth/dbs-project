<?php
require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');
require_once ('.\templates\Booking.php');
require_once ('./lib/User.php');
session_start();
$em_id=$_SESSION['user']->get_emailid();

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}

PageBuilder::add_header('booking');

$book = Booking::getBooking($db->get_connection(),$em_id);
        while ($row = $book->fetch_assoc())
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
            $book1=new Booking($team1_id, $team2_id, $team1_name, $team2_name, $time, $venue_id, $venue_name, $venue_location,$booking_id,$user_id,$seating_type,$no_of_tickets,$bill_amount,$payment_type);
            PageBuilder::get_book_card($book1);
        }
PageBuilder::add_footer();
?>

