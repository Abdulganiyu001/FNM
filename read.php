

<?php

//session_start();
include('authentication.php');

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=femtech_project', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;

if(!$id){
    header('location: Library_user.php');
    exit;
}


?>