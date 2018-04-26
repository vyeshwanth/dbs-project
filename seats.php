<?php

require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');
require_once ('./lib/Game.php');

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

<?php

PageBuilder::add_footer();

?>
