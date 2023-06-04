<?php

    session_start();
    
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: hotel-manager-home.php");
        die();
    }

    include 'config.php';
    $msg = "";


    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");


        if(mysqli_num_rows($select)) {
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
    
                if (!empty($row['verification_code'])) {
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: hotel-manager-home.php");
                } else {
                    $msg = "First verify your account and try again.";
                }
            } else {
                $msg = "Email or password do not match.";
            }
        }else{
            $msg = "It seems to be you are not still registered. Please click 'Create New Account' and sign up.";
        }   
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>

<body>
        
        <?php include('header-1.php')?>               
        
        <div class="MainBody">
                <div class="picContainer">
                        <img class="loginPic" src="./assets/login.gif" alt="Login Image">
                </div>
                <div class="loginformContainer">
                                <form class="loginformDetails" action="" method="post">
                                        <h4>SIGN IN</h4>
                                        <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $msg . "</p>"; ?>
                                        <label for="">Email<em>*</em></label>
                                        <input type="email" name="email" required>
                                        <label for="">Password<em>*</em></label>
                                        <input type="password" name="password" required>
                                        <button class="loginButton" name="submit">Sign In</button>
                                        <p>or <a href="./signup.php">Create new account</a><br>
                                                or Forgot Password? <a href="./forgot-password.php">Reset Password</a>
                                        </p>

                                </form>
                        </div>
        </div>

</body>

</html>