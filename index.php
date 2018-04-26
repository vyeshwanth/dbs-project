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

PageBuilder::add_header('BookYourTickets', array('css/index.css'));

$upcoming_games = Game::getAllUpcomingGames($db->get_connection());
?>

<div class="container px-0 upcoming_games_container">
    <h4 class="my-3">Upcoming Games</h4>
    <div class="row mx-0">
        <ul class="list-group col-md-12 pr-0">
            <?php
            foreach ($upcoming_games as $upcoming_game)
            {
                PageBuilder::get_game_card($upcoming_game['game_id'],
                    $upcoming_game['team1_logo'],
                    $upcoming_game['team2_logo']
                );
            }
            ?>
        </ul>
    </div>
</div>

<?php
PageBuilder::add_footer();
?>