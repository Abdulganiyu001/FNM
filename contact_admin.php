
<?php

include_once "database.php";

//session_start();
include('authentication.php');


if(isset($_POST['submit'])){
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $insert = "INSERT INTO fem_proj2 (surname, email) VALUES('$surname','$email')";
                mysqli_query($conn, $insert);
                header('location:user_desk.php');


    };





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
  


    <title> Contact Us </title>
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
    <a href="Library_user.php">Library</a>
    <a href="#" class="active bg-success">Contact Us</a>
    <a href="logout.php">Logout</a>
  </div>
</section>


    <div class="container">
<form action="" method="post">

      <h1 class="text-success">Contact Us</h1>

      <div class="mb-3">
    <label>Surname</label>
    <input type="text" class="form-control" name="surname" placeholder="Enter Your Surname" required>
  </div>

  <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</div>

    

        
   
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

