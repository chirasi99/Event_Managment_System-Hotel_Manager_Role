<?php
session_start() ;

$msg = "";

include 'config.php';

$email = $_SESSION['mail'];
$verification_code = $_SESSION['verify_code'];

if (isset($_POST['submit'])) {

        $password = mysqli_real_escape_string($conn, $_POST['newpassword']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
                $msg = "Password should be at least 8 characters in length and should include at least one upper case letter, 
                                    one number, and one special character.";
            }
        else{

                $password = md5($password);
                $confirm_password = md5($confirm_password);
        
                if ($password === $confirm_password) {
                    $query = mysqli_query($conn, "UPDATE users SET password='{$password}', verification_code='{$verification_code}' WHERE email='{$email}'");
        
                    if ($query) {
                        header("Location: successfully-changed-password.php");
                    }
                } else {
                    $msg = "Password and Confirm Password do not match.";
                }
        }

       
    }

?>



<!DOCTYPE html>
<html lan*g="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>
<body>
        
        <?php include('header-1.php')?>                     
       
        <div class="MainBody">
                <div class="picContainer">
                        <img class="changepassword" src="./assets/change-pw.gif" alt="Login Image">
                </div>
                <div class="ChangeformContainer">
                        <form class="ChangeformDetails" action="" method="post">
                                <h4>Change Password</h4> 
                                <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $msg . "</p>"; ?>
                                <label for="">New Password<em>*</em></label>
                                <input type="password" name="newpassword" required>
                                <label for="">Confirm Password<em>*</em></label>
                                <input type="password" name="confirmpassword" required>
                                 <button class="confirmButton" name="submit">Confirm</button>
                         </form>         
                </div>
        </div>
        
</body>
</html>