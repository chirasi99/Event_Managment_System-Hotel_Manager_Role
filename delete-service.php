
<?php
        session_start();
        include 'config.php';

        $ID = $_GET['ID'];

        $query = "DELETE FROM vehicle_details WHERE ID='$ID' ";
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
