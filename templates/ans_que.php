<?php
require_once('./config/config.php');
require_once ('./lib/User.php');
require_once ('./lib/Database.php');

session_start();

$response = array();

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    $response['status'] = false;
    $response['message'] = 'Error while connecting to database';
    echo json_encode($response);
    die();
}


if(!isset($_SESSION['user']))
{
    $response['status'] = false;
    $response['message'] = 'User not logged in';
    die();
}
