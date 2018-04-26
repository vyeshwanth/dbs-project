<?php
require_once(__DIR__ . './../lib/User.php');

if(!isset($_SESSION))
{
    session_start();
}

if(!isset($title))
{
    die('$title is not set');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css"  rel="stylesheet" />
    <title><?php echo $title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="index.php" class="navbar-brand">BookYourTickets</a>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="fancontests.php">Fan Contests</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php
        if(isset($_SESSION['user']))
        {
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" id="profile-options-dropdown" href="#" data-toggle="dropdown">' . $_SESSION['user']->get_username() . '</a>';
            echo '<div class="dropdown-menu">';
            echo '<a class="dropdown-item" href="profile.php">Profile</a>';
            echo '<a class="dropdown-item" href="bookings.php">Bookings</a>';
            echo '<a class="dropdown-item" href="logout.php">Logout</a>';
            echo '</div>';
            echo '</li>';
        }
        else
        {
            echo '<button class="btn btn-primary" id="nav-login-btn" data-toggle="modal" data-target="#login-modal">Login</button>';
            echo '<button class="btn btn-primary" id="nav-signup-btn" data-toggle="modal" data-target="#signup-modal">Sign Up</button>';
        }
        ?>
    </ul>
</nav>