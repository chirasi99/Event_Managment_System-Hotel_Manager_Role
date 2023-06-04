<?php
    session_start();
    include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Services - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style2.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

</head>
<body>
        <header>
                <?php include('header-2.php'); ?>
        </header>

        <div class="MainBody">
                <div class="viewContainer">
                        <div class="viewDetails">
                                <h4>View Service</h4>
                                <?php

                                        if(isset($_GET['service_id']))
                                        {
                                            $service_id = mysqli_real_escape_string($conn, $_GET['service_id']);
                                            $query = "SELECT * FROM hotel_managers WHERE service_id='{$service_id}' ";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($result) > 0)
                                            {
                                                $hotel_manager = mysqli_fetch_array($result);
                                                ?>
                                                <ol>
                                                        <li>Service Type :-  <p class="form-control"><?=$hotel_manager['service_type'];?> </p> </li>
                                                        <li>Hotel Name :-  <p class="form-control"><?=$hotel_manager['hotel_name'];?> </p> </li>
                                                        <li>Location :-  <p class="form-control"><?=$hotel_manager['location'];?> </p> </li>
                                                        <li>Hall Type :-  <p class="form-control"><?=$hotel_manager['hall_type'];?> </p> </li>
                                                        <li>Max Crowd :-  <p class="form-control"><?=$hotel_manager['max_crowd'];?> </p> </li>
                                                        <li>Air Condition Status:-  <p class="form-control"><?=$hotel_manager['ac_status'];?> </p> </li>
                                                        <li>Price Head :-  <p class="form-control"><?=$hotel_manager['price'];?> </p> </li>
                                                        <li>Description :-  <p class="form-control"><?=$hotel_manager['description'];?> </p> </li>
                                                        <li>Other Facilities :-  <p class="form-control"><?=$hotel_manager['other_facilities'];?> </p> </li>
                                                        <div class="imagedisplay">
                                                                 <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($hotel_manager['hotel_image']); ?>" alt="service_image" width="320px" height="300px" style='border:2px solid white; margin-bottom:8px;'>      
                                                        </div>

                                                        
                                                </ol>
                                                    

                                                <?php


                                            }
                                            else
                                            {
                                                echo "<h4>No Such Id Found</h4>";
                                            }
                                        }
                                ?>

                                
                        </div>         
                </div>
        </div>
       
</body>
</html>



