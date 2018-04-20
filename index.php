<?php 

require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}

PageBuilder::add_header('BookYourTickets');
PageBuilder::add_footer();