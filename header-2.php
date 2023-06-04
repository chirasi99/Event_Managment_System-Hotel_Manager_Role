<?php
include 'config.php';

        $fname=$_SESSION['fname'];
        $lname=$_SESSION['lname'];
?>

<div class="MainHeader">
                        <div class="logoContainer">
                                <a href="./hotel-manager-home.php"><img class="logo" src="./assets/logo.png" alt="LOGO" ></a>
                        </div>
                        <div class="navbar-details-after-registration">
                                <div class="useraccount">
                                        <a href=""><i class="fa-solid fa-circle-user fa-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;"></i></a>
                                </div>
                                <div class="userdetails">
                                        <a href="#"><?php echo " " . $fname ." " .$lname; ?></a>
                                        <hr size="1px">
                                        <a href="./hotel-manager-home.php" class="home">Home</a>
                                        <a href="./logout.php" class="logout">Logout</a>
                                </div>
                                <div class="usericons">
                                         <a href="#"><i class="fa-solid fa-bell fa-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;"></i></a>
                                         <a href="#"><i class="fa-solid fa-message fa-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;"></i></a>

                                </div>
                         </div>
                </div>    


