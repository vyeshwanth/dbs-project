<?php 

require_once('./config/config.php');
require_once ('./lib/Database.php');

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}

