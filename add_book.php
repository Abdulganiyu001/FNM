
<?php


//session_start();
include('authentication.php');


    $localhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "femtech_project";

    $conn = mysqli_connect($localhost, $dbusername, $dbpassword, $dbname);



        $title = "";
        $description = "";
        $pages = "";

        if($_SERVER['REQUEST_METHOD']== 'POST'){
        $title = $_POST ["title"];
        $description = $_POST["description"];
        $pages = $_POST["pages"];
        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];


        $tname = $_FILES["file"]["tmp_name"];
        $uploads_dir = './files';
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
         $sql = "INSERT INTO fem_proj3 (title, description, file, pages) VALUES ('$title','$description', '$pname','$pages')";
         if(mysqli_query($conn, $sql)){
            header('location:Library_admin.php');
         }else{
            echo "error";
         }


    }









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
  


    <title> Add Book </title>
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
    <a class=""  href="admin_desk.php">Home</a>
    <a href="#" class="active bg-success">Add Book</a>
    <a href="delete_book.php">Delete Book</a>
    <a href="edit_book.php">Edit Book</a>
    <a href="Library_admin.php">Library</a>
    <a href="register.php">Add User</a>
    <a href="delete_user.php">Delete user</a>
    <a href="logout.php">Logout</a>
  </div>
</section>



    

        
    <div class="container">  
          <form action="" method="post" enctype="multipart/form-data">
          <h1 class="p-4 m-4 text-success"> Add New Book </h1>
            <div class="mb-3">
                <label> Book </label>
                <br>
                <input type="file" name="file">
            </div>

            <div class="mb-3">
                <label> Book Title </label>
                <input type="text" class="form-control" name="title" value="<?php echo $title //to return whats there when other fields are not filled ?>" required>
            </div>

            <div class="mb-3">
                <label> Book Description </label>
                <textarea class="form-control" name="description" value="" required><?php echo $description //to return whats there when other fields are not filled ?></textarea>
            </div>

            <div class="mb-3">
                <label> Book Pages </label>
                <input type="number" class="form-control" name="pages" value="<?php echo $pages //to return whats there when other fields are not filled ?>" required>
            </div>
           
            <button type="submit" class="btn btn-success">Add Book</button>
    </form>
    </div>
       

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

