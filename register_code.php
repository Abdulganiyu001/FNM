

<?php

session_start();

include_once "database.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



function sendemail_verify($surname,$email,$verify_token)
{
$mail = new PHPMailer(true);

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer'  => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );


$mail->isSMTP();

$mail->SMTPDebug =0;                  
                                
$mail->SMTPAuth   = true; 

  
$mail->Host       = "smtp.gmail.com"; 
$mail->Username   = "abdulrahimabdulganiyu1@gmail.com";                     
$mail->Password   = "qzkavhvhnkpsquaj";                              
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
$mail->Port       = 465;                                    



$mail->setFrom('abdulrahimabdulganiyu1@gmail.com', $surname);
$mail->addAddress($email);

$mail->isHTML(true);                                 
$mail->Subject = 'Email Verification from Fail-No-More Online Library';

$email_template = "
            <h2> You have registered with FNM Online Library</h2>
            <h5> Verify your email adress to Login with the given link</h5>
            <br></br>
            <a href= 'http://localhost/FEMTECH_PROJECT/verify_email.php?token=$verify_token'>Click Me </a> 
            ";

            $mail->Body = $email_template;
            $mail->send();
          
           $mail->smtpClose();


};




if(isset($_POST['submit'])){
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $usertype = $_POST['user_type'];
  $verify_token = md5(rand());


  $select = "SELECT * FROM fem_proj1 WHERE email = '$email' LIMIT 1";

        $result = mysqli_query($conn, $select);

        $row = mysqli_fetch_array($result);

        if(mysqli_num_rows($result) > 0){

           

            $_SESSION['status'] = "User already Exists.";
           header('location:register.php');
        }else{
                $insert = "INSERT INTO fem_proj1 (surname, email, password, user_type, verify_token) VALUES('$surname','$email', '$pass', '$usertype', '$verify_token')";
              $query_run = mysqli_query($conn, $insert);
                
              if($query_run)
              {
                  sendemail_verify("$surname", "$email", "$verify_token");

                  $_SESSION['status'] = "Registration Successfull.! Please verify your Email Address.";
                  header('location:register.php');
              }else{
                  $_SESSION['status'] = "Registration Failed.";
                  header('location:register.php');
              }
            }
        



    };



?>