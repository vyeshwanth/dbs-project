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

$params = array('Email Id' => 'email_id','First name' => 'first_name', 'Last name' => 'last_name','Old Password' => 'old_psw', 'New Password' => 'new_psw');

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

echo "Validationcompleted";

$con = $db->get_connection();

$response = $_SESSION['user']->update_profile_info($con,$_POST['email_id'],$_POST['first_name'],$_POST['last_name'],$_POST['old_psw'],$_POST['new_psw']);
echo json_encode($response);