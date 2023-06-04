<?php
        include('config.php');
        if (isset($_POST['submit'])){
                header('location: login.php');
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Successfully Chaneged Password - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>
<body>
        <?php include('header-1.php')?>  

        <div class="MainBody">
                <div class="picContainer">
                        <img class="SuccessforgotPasswordChangePic" src="./assets/success-reset-pw.gif" alt="Password Chaneged Success Image">
                </div>
                <form action="" method="post">
                <div class="changeforgotPWContainer">
                        <div class="changeforgotPWDetails">
                                <h5>Password Change Successfully</h5>
                                <img class="successicon" src="./assets/successicon.gif" alt="display success icon">
                                <p>Click Here to LOGIN to the System</p>
                                <div class="arrowContainer">
                                 <img src="./assets/arrow.gif" alt="arrow key">
                                <button class="newLoginButton" name="submit">LOGIN</button>
                        </div>         
                </div>
                </form>
        </div>
        
</body>
</html>