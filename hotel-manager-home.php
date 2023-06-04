<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: login.php");
        die();
    }

    include 'config.php';
    
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);   
    }

    if (isset($_POST['submit_addService'])){
        header('location: add-services.php');
    }
    if (isset($_POST['submit_calender'])){
        header('location: calender.php');
    }
    if (isset($_POST['submit_viewServices'])){
        header('location: view-services.php');
    }


$_SESSION['fname']=$row['fname'];
$_SESSION['lname']=$row['lname'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style2.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>


</head>
<body>
        
                <?php include('header-2.php');  ?>

        <div class="MainBody">
                <form class="homeContainer1" method="post">

                        <div class="item1" >
                                <img src="./assets/add_services.gif" alt="Add Services">
                                <button name="submit_addService">Add Services</button>
                        </div>
                        <div class="item2-1">
                                <img src="./assets/reservation_schedule.gif" alt="Reservation Schedule">
                                <button>Reservation Schedule</button>
                        </div>
                        <div class="item3-1">
                                <img src="./assets/add_offers.gif" alt="Add Offers/Promotions">
                                <button>Add Offers/Promotions</button>
                        </div>
                </form>

                <form class="homeContainer2" method="post">
                        <div class="item1">
                                <img src="./assets/view_services.gif" alt="View Services" >
                                <button name="submit_viewServices">View Services</button>
                        </div>
                        <div class="item2-2">
                                <img src="./assets/chat.gif" alt="Chat" >
                                <button>Chat</button>
                        </div>
                        <div class="item3">
                                <img src="./assets/report.gif" alt="View Reports">
                                <button>View Reports</button>
                        </div>
                        </form>  

                <form class='homeContainer3' method = "post">
                        <div class="item4-1">
                                <img src="./assets/view_profile.gif" alt="View Profile">
                                <button>View Profile</button>
                        </div>
                        <div class="item4-2">
                                <img src="./assets/payment.gif" alt="Payments">
                                <button>Payments</button>
                        </div>
                        <div class="item2-1">
                                <img src="./assets/Online calendar.gif" alt="Reservation Calender">
                                <button name="submit_calender">Reservation Calender</button>
                        </div>

                </form>


</div>
</body>
</html>