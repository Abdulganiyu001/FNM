

<?php


session_start();
//include('authentication.php');


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

  <title>Fain-NO-More</title>
  <link rel="stylesheet" href="style2.css">
</head>

<body>
  <!-- <img src="pics/king.jpg" class="img-fluid"> -->
  <header>


    <nav class="navbar navbar-expand-lg text-white bg-success py-3 fixed-top bt-5">
      <div class="container justify-content-center">
        <div class="navbar-brand text-white" href="#"> FAIL-NO-MORE Online Library</div>
        </div>
      </div>
    </nav>

  </header>
  <section>


    <div class="container p-5 m-5">
      <div class="form-container">
        <form action="password_reset_code.php" method="post">
          <h3>Password Reset</h3>

          <?php 
                        if(isset($_SESSION['status']))
                        {
                            ?>
                            <div class="alert alert-success">
                                <h5><?=$_SESSION['status']; ?></h5>
                            </div>
                            <?php
                            unset($_SESSION['status']);

                        }
                ?>

          <input type="email" name="email"  placeholder="Enter your Email">
          
          <input type="submit" name="submit" value="Send Password Reset Link" class="form-btn">
        </form>
      </div>
    </div>






    




    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

<!--Footer-->
<footer class=" footer mt-auto  text-white text-center position-relative">
  <div class="container">
    <p class="lead">copyright &copy; 2023 FNM</p>

    <a href="#" class="position-absolute bottom-0 end-0 p-5">
      <i class="bi bi-arrow-up-circle h1"></i>
    </a>
  </div>
</footer>

</html>