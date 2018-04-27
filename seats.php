<?php

require_once ('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');
require_once ('./lib/Game.php');
require_once ('./lib/User.php');

if(!isset($_SESSION))
{
    session_start();
}

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}

if(!isset($_GET['game']) || empty($_GET['game']))
{
    header('Location: index.php');
}

PageBuilder::add_header('BookYourTickets', array('css/seats.css'));

$game = Game::getGame($db->get_connection(), $_GET['game']);

?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" colspan="2">Game Details</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Teams</th>
        <td><?php echo $game->getTeam1Name() . ' VS ' . $game->getTeam2Name()?></td>
    </tr>
    <tr>
        <th scope="row">Time</th>
        <td><?php echo $game->getTime() ?></td>
    <tr>
        <th scope="row">Venue</th>
        <td><?php echo $game->getVenueName() ?></td>
    </tr>
    <tr>
        <th scope="row">Location</th>
        <td><?php echo $game->getVenueLocation() ?></td>
    </tr>
    </tbody>
</table>

<h5 style="text-align: center">Book Tickets</h5>

<hr>

<form class="col-md-4 mx-auto" style="display: block;" id="booking-form">
    <div class="form-group">
        <label for="seating-type">Select Seating Type</label>
        <select name="seating_type" id="seating-type" class="form-control">
            <?php
                $payment_types = Game::get_seating_types($db->get_connection());
                foreach ($payment_types as $payment_type)
                {
                    echo '<option value="'. $payment_type['seating_id'] . '" data-seating-price="'. $payment_type['price'].'"">';
                    echo $payment_type['seating_name'];
                    echo '</option>';
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="no-of-seats">Number of seats</label>
        <input class="form-control" type="number" id="no-of-seats" name="no_of_seats" max="10" min="1">
    </div>
    <div class="form-group">
        <label for="payment-type">Select Seating Type</label>
        <select name="payment_type" id="payment-type" class="form-control">
            <?php
            $payment_types = Game::get_payment_types($db->get_connection());
            foreach ($payment_types as $payment_type)
            {
                echo '<option value="'. $payment_type['payment_id'] . '">';
                echo $payment_type['payment_mode'];
                echo '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="bill-amount">Total Amount Payable</label>
        <input class="form-control" type="text" name="billing_amount" id="bill-amount" value="" readonly="readonly">
    </div>
    <?php
        if(isset($_SESSION['user']))
        {
           $coupons_available = $_SESSION['user']->check_coupons($db->get_connection());
           if($coupons_available)
           {
               echo '<div class="form-check form-check-inline">';
               echo '<input class="form-check-input" type="checkbox" name="apply_coupon" id="apply-coupon" value="1"> Apply Coupon' ;
               echo '</div>';
           }
        }
    ?>
    <input type="hidden" name="game_id" value="<?php echo $_GET['game']?>">
    <?php
    if(isset($_SESSION['user']))
    {
        echo '<button class="btn btn-primary" id="book-btn">Book Tickets</button>';
    }
    else
    {
        echo '<button id="book-btn" class="btn btn-primary mx-auto" disabled style="cursor:not-allowed; display: block">Book Tickets</button>';
    }
    ?>

</form>
<div class="mb-2"></div>
<?php

PageBuilder::add_footer();

?>
<script src="js/seats.js" type="text/javascript"></script>
