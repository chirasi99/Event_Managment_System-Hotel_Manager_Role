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
        <h4>View Service - Hotel Manager</h4>
       
                        <?php 
                                    $query = "SELECT * FROM hotel_managers";
                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $hotel_manager)
                                        {
                                            ?>
                                                        <div class="cards">
                                                            <div class="service1">
                                                            <div class="location-header"><h5>Location :- <?= $hotel_manager['location']; ?> </h5></div>
                                                            <img width="250px" height="200px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($hotel_manager['hotel_image']); ?>" />
                                                            <p><?= $hotel_manager['description']; ?> </p>
                                                            <div class="buttonContainer">
                                                                <a href="./view-each-service.php?service_id=<?=$hotel_manager['service_id']; ?>" class="viewButton" style="text-decoration:none">View</a>
                                                                <a href="./edit-services.php?service_id=<?=$hotel_manager['service_id']; ?>" class="editButton" style="text-decoration:none">Edit</a>
                                                                <a href="./delete-service.php?service_id=<?=$hotel_manager['service_id']; ?>" class="deleteButton" style="text-decoration:none">Delete</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h3> No Services Found </h4>";
                                    }
                                ?>
 </div>
        
</body>
</html>


