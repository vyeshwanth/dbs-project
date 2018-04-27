<?php
require_once('./config/config.php');
require_once ('./lib/User.php');
require_once ('./lib/Database.php');
require_once ('./lib/Contest.php');

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

$email_id = $_SESSION['user']->get_emailid();

$correct_ans=0;

$con = $db->get_connection();

foreach ($_POST as $que_id=>$ans)
{
    if(Contest::ansforque($con,$que_id) == $ans)
    {
        $correct_ans++;
    }
}

Contest::insertresult($con,$email_id,$correct_ans);

if($correct_ans == 5)
{
    Contest::insert_coupon($con,$email_id);
}

echo $correct_ans;