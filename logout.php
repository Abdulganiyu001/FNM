

<?php

@include 'database.php';

// session_start();
// session_unset();
// session_destroy();

// header('location:Login.php');

session_start();
unset($_SESSION['authenticated']);



    $_SESSION['status'] = "See You Again Soon.";
header('location:Login.php');


?>