

<?php




  session_start();
  include_once "database.php";

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);


  $select = "SELECT * FROM fem_proj1 WHERE email = '$email' && password = '$pass' LIMIT 1";

  $result = mysqli_query($conn, $select);



  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

   
    if($row['verify_status'] == '1'){


        $_SESSION['authenticated'] = TRUE;


    if($row['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $row['surname'];
        header('location:admin_desk.php');
        

    }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['surname'];
        header('location:user_desk.php');

    }
else{
    $_SESSION['status'] = "Please Verify Email Address to Login.";
    header('location:Login.php');
    exit(0);
}
    
}


else{
    $_SESSION['status'] = "Incorrect Email or Password.";
    header('location:Login.php');
    exit(0);
}
}
else{
$_SESSION['status'] = "User does not Exist, Please Register.";
header('location:Login.php');
exit(0);
}
};



?>