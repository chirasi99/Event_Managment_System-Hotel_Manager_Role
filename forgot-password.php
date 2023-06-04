<?php


session_start() ;
// if (isset($_SESSION['SESSION_EMAIL'])) {
//     header("Location: hotel-manager-home.php");   default go to the home page of hotel manager
//     die();
// }

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $verification_code = mysqli_real_escape_string($conn, substr(number_format(time() * rand(), 0, '', ''), 0, 6));


    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET verification_code='{$verification_code}' WHERE email='{$email}'");

        if ($query) { 
            $_SESSION['verify_code']= $verification_code;
            $_SESSION['mail'] = $email;       
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '2020cs197@stu.ucsc.cmb.ac.lk';                     //SMTP username
                $mail->Password   = '20001975';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('2020cs197@stu.ucsc.cmb.ac.lk');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email Verification';
                $mail->Body    = 'Your verification code is : <b style="font-size:15px;">' . $verification_code. '</b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";   
            header('Location: resend-otp-verification.php');     
        }
    } else {
        $msg = "$email - This email address do not found.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>
<body>
        <?php include('header-1.php')?>

        <div class="MainBody">
                <div class="picContainer">
                        <img class="Changepassword" src="./assets/Forgot password.gif" alt="Display Success signed up Image">
                </div>
               <form action="" method="post">
                <div class="recoverContainer">
                            <div class="recoverDetails">
                                    <h4>Forgot Password</h4>
                                    <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $msg . "</p>"; ?>
                                    <label for="email">Enter your Email<em>*</em></label>
                                    <input type="email" name="email" required >
                                    <button class="SubmitButton" name='submit' type='submit'>Send Reset OTP</button>
                                    <p>Back to! <a href="login.php">Login</a>.</p>
                                </div>         
                    </div>
               </form>
        </div>
        
</body>
</html>