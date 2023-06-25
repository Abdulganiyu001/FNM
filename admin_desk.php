


<?php

@include 'database.php';
include('authentication.php');

//session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:Login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js
  "></script>

    <title>Admin Page</title>
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
    <a class="active bg-success"  href="#">Home</a>
    <a href="add_book.php">Add Book</a>
    <a href="delete_book.php">Delete Book</a>
    <a href="edit_book.php">Edit Book</a>
    <a href="Library_admin.php">Library</a>
    <a href="register.php">Add User</a>
    <a href="delete_user.php">Delete user</a>
    <a href="logout.php">Logout</a>
  </div>
</section>
  
  <!-- Page content -->
  <section class="pt-5">
  <div class="container p-5 m-5 ">
    <div class="content justify-content-center align-items-center">
        <h3>Hi, <span>Admin</span></h3>
        <h1>Welcome<span><?php echo $_SESSION['admin_name'] ?></span></h1>
        <p>this is the admin page</p>
        <a href="Login.php" class="btn">login</a>
        <a href="register.php" class="btn">register</a>
        <a href="contact_admin_action.php" class="btn">Notifications</a>
        <a href="logout.php" class="btn">logout</a>

    </div>
</div>
</section>





    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>