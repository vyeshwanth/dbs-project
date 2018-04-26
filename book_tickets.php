<?php

require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/User.php');
require_once ('./lib/Game.php');

header("Content-type:application/json");

if(!isset($_SESSION))
{
    session_start();
}

$params = array('Seating Type' => 'seating_type', 'Number Of Seats' => 'no_of_seats', 'Billing Amount' => 'billing_amount', 'Game id' => 'game_id', 'Payment Type' => 'payment_type');

$response = array();

foreach ($params as $param_name => $param_value)
{
    if(!isset($_POST[$param_value]) || empty($_POST[$param_value]))
    {
        $response['status'] = false;
        $response['message'] = $param_name . ' can\'t be empty';
        echo json_encode($response);
        die();
    }
}

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}

if(!isset($_SESSION['user']))
{
    $response = array();
    $response['status'] = false;
    echo  json_encode($response);
}

$response = $_SESSION['user']->book_tickets($db->get_connection(), $_POST['game_id'], $_POST['seating_type'], $_POST['no_of_seats'], $_POST['billing_amount'], $_POST['payment_type']);

echo json_encode($response);
