

<?php

session_start();
@include 'database.php';

                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

               
                require 'phpmailer/src/Exception.php';
                require 'phpmailer/src/PHPMailer.php';
                require 'phpmailer/src/SMTP.php';



function resend_email_verify($surname, $email, $verify_token)
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
$mail->Subject = ' Resent Email Verification from Fail-No-More Online Library';

$email_template = "
                        <h2> You have registered with FNM Online Library</h2>
                        <h5> Verify your email adress to Login with the giver link</h5>
                        <br></br>
                        <a href= 'http://localhost/FEMTECH_Project/verify_email.php?token=$verify_token'>Click Me </a> 
                        ";

                        $mail->Body = $email_template;
                        $mail->send();
                      
                       $mail->smtpClose();


}


if(isset($_POST['submit']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $select = "SELECT * FROM fem_proj1 WHERE email = '$email' LIMIT 1";
         $result = mysqli_query($conn, $select);

         if(mysqli_num_rows($result) > 0)
         {
            $row = mysqli_fetch_array($result);
            if($row['verify_status'] == '0')
            {
                    $name = $row['name'];
                    $email = $row['email'];
                    $verify_token = $row['verify_token'];

                    resend_email_verify($surname, $email, $verify_token);

                    $_SESSION['status'] = "Verification Email Link has been sent to your email.";
                    header('location: Login.php');
                   exit(0);
            }
            else{
                $_SESSION['status'] = "Email Already Verified, Please Login.";
                header('location: Login.php');
               exit(0);
            }
         }
         else{
            $_SESSION['status'] = "Email is not Registered. Please Register Now";
            header('location: register.php');
           exit(0);
         }


    }
    else{
        $_SESSION['status'] = "Please Enter the email field.";
        header('location:resend_email_verification.php');
       exit(0);
    }
}


?>