

<?php

//session_start();
include('authentication.php');

// connecting to database using pdo method
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=femtech_project', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//running the search input

$search = $_GET['search'] ?? '';
if ($search){
  $statement = $pdo->prepare('SELECT * FROM fem_proj3 WHERE title LIKE :title ORDER BY id DESC');
  $statement->bindValue(':title', "%$search%");

}else{
  $statement = $pdo->prepare('SELECT * FROM fem_proj3 ORDER BY id DESC');
}


// making query to the database 
// $statement = $pdo->prepare('SELECT * FROM product ORDER BY create_date DESC');
$statement->execute();
$book = $statement->fetchAll(PDO::FETCH_ASSOC); // to fetch the element in the database in form of associative array
   






?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js
  "></script>
  


    <title> User Library </title>
    <link rel="stylesheet" href="styleproj.css">


  </head>
  <body>

  <header>
    <nav class="navbar navbar-light bg-success fixed-top">
        <div class="container-fluid justify-content-center">
          <span class="navbar-brand mb-0 h1  text-white">Fail-No-More Online Library</span>
        </div>
      </nav>
    </header>


       <!-- The sidebar -->
       <section class="pt-4">
        <div class="sidebar p-5 m-5">
    <a class="" href="user_desk.php">Home</a>
    <a href="about.php">About</a>
    <a href="#" class="active bg-success">Library</a>
    <a href="contact_admin.php" >Contact Us</a>
    <a href="logout.php">Logout</a>
  </div>
</section>


<div class="container">
    <form class="p-4 m-4">
    <h1 class="text-success p-4 m-5"> Library </h1>
          <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search for Book" name="search" value="<?php echo $search ?>">
    <button class="btn bg-success text-white btn-outline-success" type="submit">Search</button>
  </div>
   


        <table class="table">
    <thead>
        <tr>
        <th scope="col">s/no</th>
        <th scope="col">Tilte</th>
        <th scope="col">Book</th>
        <th scope="col">Download</th>
        <th scope="col">Read</th>
        </tr>
    </thead>

        <tbody>
        <?php foreach ($book as $i => $item) : //how to iterate?> 
            <tr>
            <th scope="row"><?php echo $i +1 ?></th>
            <td><?php echo $item['title'] ?></td>
            <td><?php echo $item['file'] ?></td>
  
            <td>
            <a href="files/<?php echo $item['file']; ?>" download="files/<?php echo $item['file']; ?>" class="btn btn-outline-success bg-success text-white">Download</a>
            </td>
            <td>
            <a href="files/<?php echo $item ['file']; ?>" target="_blank" class="btn btn-outline-success bg-success text-white">Read</a>    
                    </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    </table>

    </form>


    </div>


    

        
   
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

