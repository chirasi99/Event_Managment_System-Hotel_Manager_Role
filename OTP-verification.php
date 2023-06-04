<?php 
session_start() ;

include('config.php');
$errormessage = "";

if(isset($_POST["verify"])){
        $verification_code = $_SESSION['verify_code'];
        $email = $_SESSION['mail'];
        $otp = $_POST['otp'];

        if($verification_code != $otp){
          $errormessage = "Invalid OTP code. Verification unsuccessful.";
        }else{
            mysqli_query($conn, "UPDATE users SET email_status = 1 WHERE email = '$email'");
            header('location: successfully-signned-page.php');
            
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>
<body>

        <?php include('header-1.php')?>               

        <div class="MainBody">
                <div class="picContainer">
                        <img class="otppic" src="./assets/otp-verification.gif" alt="OTP Verification Image">
                </div>
               <form action="" method="post">
               <div class="otpverifyContainer">
                        <div class="otpverifyDetails">
                                <h4>otp Verification</h4>
                                <p style='font-size:14px; line-height:25px; word-spacing:0.5px; letter-spacing:0.8px;'>
                                 We have send your OTP-code to your <b>Email</b>. Enter your OTP-code to confirm your email address.</p>
                                 <label for="otp">Enter OTP-Code<em>*</em></label>
                                 <input type="text" name="otp" required >
                                 <button class="OTPSubmitButton" name="verify">Submit</button>    
                                 <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: 20px;'>" . $errormessage . "</p>"; ?>
                                </div>                  
                        </div>         
                </div>
               </form>
        </div>
        
</body>
</html>
