
<?php
        session_start();
        include 'config.php';

        $service_id = $_GET['service_id'];

        $query = "DELETE FROM hotel_managers WHERE service_id='$service_id' ";
        $result = mysqli_query($conn, $query);

                if($result){
                                echo '<script>alert("Service Deleted Successfully")</script>';
                                header("Location: view-services.php");
                }
                else{
                        echo '<script>alert("Service Deleted Unsuccessfully")</script>';
                        header("Location: view-services.php");
                }



?>
