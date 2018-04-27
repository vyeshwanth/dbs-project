<?php

require_once('./config/config.php');
require_once ('./lib/User.php');
require_once ('./lib/Database.php');

if(!isset($_SESSION))
{
    session_start();
}

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


$con = $db->get_connection();
$_SESSION['user']->delete_coupons($con,$_SESSION['user']->get_emailid());
$_SESSION['user']->delete_bookings($con,$_SESSION['user']->get_emailid());
$response = $_SESSION['user']->delete_profile($con,$_SESSION['user']->get_emailid());
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
}
echo json_encode($response);