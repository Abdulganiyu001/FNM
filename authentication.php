

<?php

session_start();

if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "Please Login to access User Dashboard.!";
    header('location:Login.php');
    exit(0);
}



?>