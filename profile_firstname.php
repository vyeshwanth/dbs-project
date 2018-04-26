<?php
/**
 * Created by PhpStorm.
 * User: HariVallabha
 * Date: 26-Apr-18
 * Time: 11:11 AM
 */
require_once ('./lib/User.php');
require_once ('./lib/Database.php');
session_start();
if(isset($_SESSION['user']))
{
    $email_id = ($_SESSION['user'])->get_emailid();
    if (isset($_POST['name']) == true && empty($_POST['name']) == false) {
        $con = new mysqli("localhost", "root", "allen", "dbs_project");
        $string = $con->real_escape_string(trim($_POST['name']));
        $result = $con->query("SELECT user.first_name,user.last_name,user. FROM user WHERE user.email_id ='$string'");
        if ($result->num_rows == 1 ) {
            while ($row = $result->fetch_assoc())
            {
                echo $row['first_name'];
            }
        }
    }
}
