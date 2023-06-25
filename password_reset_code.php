

<?php
session_start();
@include 'database.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



    function send_password_reset($get_name,$get_email,$token)
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
    
    
    
    $mail->setFrom('abdulrahimabdulganiyu1@gmail.com', $get_name);
    $mail->addAddress($get_email);
    
    $mail->isHTML(true);                                 
    $mail->Subject = ' Reset Pasword Notification';
    
    $email_template = "
                            <h2> Hello,</h2>
                            <h5> You are recieving this email because we recieved a password reset request from Your account</h5>
                            <br></br>
                            <a href= 'http://localhost/FEMTECH_PROJECT/password-change.php?token=$token&email=$get_email'>Click Me </a> 
                            ";
    
                            $mail->Body = $email_template;
                            $mail->send();
                          
                           $mail->smtpClose();




    }




if(isset($_POST['submit']))
{
    $email = mysqli_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM fem_proj1 WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
            $row = mysqli_fetch_array($check_email_run);
            $get_name = $row['surname'];
            $get_email = $row['email'];

            $update_token = "UPDATE fem_proj1 SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
            $update_token_run = mysqli_query($conn, $update_token);

            if($update_token_run)
            {
                    send_password_reset($get_name,$get_email,$token);
                    $_SESSION['status'] = "We e-mailed you a password reset link.";
                    header('location: password_reset.php');
                   exit(0);
            }
            else{
                $_SESSION['status'] = "Something When Wrong. #1";
                header('location: password_reset.php');
               exit(0);

            }
    }
    else{
        $_SESSION['status'] = "No Email Found.";
        header('location: password_reset.php');
       exit(0);
    }
}





if(isset($_POST['submit']))
{
    $email = mysqli_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM fem_proj1 WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
            $row = mysqli_fetch_array($check_email_run);
            $get_name = $row['surname'];
            $get_email = $row['email'];

            $update_token = "UPDATE fem_proj1 SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
            $update_token_run = mysqli_query($conn, $update_token);

            if($update_token_run)
            {
                    send_password_reset($get_name,$get_email,$token);
                    $_SESSION['status'] = "We e-mailed you a password reset link.";
                    header('location: password_reset.php');
                   exit(0);
            }
            else{
                $_SESSION['status'] = "Something When Wrong. #1";
                header('location: password_reset.php');
               exit(0);

            }
    }
    else{
        $_SESSION['status'] = "No Email Found.";
        header('location: password_reset.php');
       exit(0);
    }
}



        if(isset($_POST['password_submit']))
        {
            $email = mysqli_escape_string($conn, $_POST['email']);
            $new_password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);

            $token = mysqli_escape_string($conn, $_POST['password_token']);

           if(!empty($token))
            {
                if(!empty($email) && !empty($new_password) && !empty($cpassword))
                {
                        $check_token = "SELECT verify_token FROM fem_proj1 WHERE verify_token='$token' LIMIT 1";
                        $check_token_run= mysqli_query($conn, $check_token);

                        if(mysqli_num_rows($check_token_run) > 0 )

                        {
                                if($new_password == $cpassword)
                                {
                                        $update_password = "UPDATE fem_proj1 SET password = '$new_password' WHERE verify_token= '$token' LIMIT 1";
                                        $update_password_run = mysqli_query($conn, $update_password);

                                        if($update_password_run)
                                        {
                                            
                                            $new_token = md5(rand()) ."funds";
                                            $update_to_new_token = "UPDATE fem_proj1 SET verify_token = '$new_token' WHERE verify_token= '$token' LIMIT 1";
                                            $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);

                                            $_SESSION['status'] = "New Password Updated Succesfully.";
                                            header("location: Login.php");
                                           exit(0);
                                        }
                                        else{
                                            $_SESSION['status'] = "Did not update password. Something went wrong.!";
                                            header("location: password-change.php?token=$token&&&email=$email");
                                           exit(0);
                                        }
                                }
                                else{
                                    $_SESSION['status'] = "Password and Comfirm Password does not Match";
                                    header("location: password-change.php?token=$token&&&email=$email");
                                   exit(0);
                                }
                        
                }
                else{
                    $_SESSION['status'] = "Invalid Token";
                    header("location: password-change.php?token=$token&&&email=$email");
                   exit(0);
                }
                
            }
            else{
                $_SESSION['status'] = "All Fields are Mandatory";
            header("location: password-change.php?token=$token&&&email=$email");
           exit(0);
            }
           
        }
        
        else{
            $_SESSION['status'] = "No Token Available";
            header('location: password_change.php');
           exit(0);
        }
    }


?>