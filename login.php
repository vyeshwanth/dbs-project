<?php

require_once('./config/config.php');
require_once ('./lib/User.php');
require_once ('./lib/Database.php');

header("Content-type:application/json");

$params = array('Email Id' => 'email_id', 'Password' => 'password');

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
    $response['status'] = false;
    $response['message'] = 'Error while connecting to database';
    echo json_encode($response);
    die();
}

$user = new User($_POST['email_id'], $_POST['password']);

$response = $user->authenticate($db->get_connection());

if($response['status'] === true)
{
    session_start();
    $_SESSION['user'] = $user;
}

echo json_encode($response);
die();