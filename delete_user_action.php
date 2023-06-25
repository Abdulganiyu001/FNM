

<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=femtech_project', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id = $_POST['id'] ?? null;

if(!$id) {
    echo "error";
    exit;
}

$statement = $pdo->prepare('DELETE FROM fem_proj1 WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: delete_user.php');