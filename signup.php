<?php

require_once('./config/config.php');
require_once ('./lib/User.php');
require_once ('./lib/Database.php');

header("Content-type:application/json");

$params = array('Email Id' => 'email_id', 'Password' => 'password', 'First name' => 'first_name', 'Last name' => 'last_name');

$response = array();

foreach ($params as $param_name => $param_value)
{
    if(!isset($_POST[$param_value]))
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

$user = new User($_POST['email_id'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);

$response = $user->add_user($db->get_connection());

echo json_encode($response);
die();
