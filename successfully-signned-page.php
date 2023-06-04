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
        <title>Successfully SignUp - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>
<body>
        <?php include('header-1.php')?>
        
        <div class="MainBody">
                <div class="picContainer">
                        <img class="SuccessSignupPic" src="./assets/displaysuccess.gif" alt="Display Success signed up Image">
                </div>
               <form action="" method='post'>
               <div class="logContainer">
                        <div class="logDetails">
                                <p>Click Here to LOGIN to the System</p>
                                <div class="arrowContainer">
                                 <img src="./assets/arrow.gif" alt="arrow key">
                                <button class="SignedButton" name="submit">LOGIN</button>
                        </div>         
                </div>
               </form>
        </div>
        
</body>
</html>