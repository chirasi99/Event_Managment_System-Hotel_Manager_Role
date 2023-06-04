<?php
    session_start();
    include 'config.php';
    $displaymessage = "";


    if(isset($_POST['update'])){
           
                $service_id = mysqli_real_escape_string($conn, $_POST['service_id']);
                $servicetype = mysqli_real_escape_string($conn, $_POST['servicetype']);
                $hotelname = mysqli_real_escape_string($conn, $_POST['hotelname']);
                $location = mysqli_real_escape_string($conn, $_POST['location']);
                $halltype = mysqli_real_escape_string($conn, $_POST['halltype']);
                $maxcrowd = mysqli_real_escape_string($conn, $_POST['maxcrowd']);
                $acstatus = mysqli_real_escape_string($conn, $_POST['acstatus']);
                $price = mysqli_real_escape_string($conn, $_POST['price']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $otherfacilities = mysqli_real_escape_string($conn, $_POST['otherfacilities']);


                // if(empty($_FILES['hotel_img'])){
                //         $fileName = basename($_FILES["hotel_img"]["name"]); 
                // }
                // else {
                //         $fileName = basename($hotel_manager['hotel_image']);
                // }
                
                // $fileType = pathinfo($fileName, PATHINFO_EXTENSION);         
                //         echo "aaa :";
                //         echo $fileName;
                        
                //         // Allow certain file formats 
                //         $allowTypes = array('jpg','png','jpeg','gif'); 
                //         if(in_array($fileType, $allowTypes)){ 
                //             $image = $_FILES['hotel_img']['tmp_name']; 
                //             $imgContent = addslashes(file_get_contents($image));
                            

                $sql = "UPDATE hotel_managers SET service_type='{$servicetype}', hotel_name='{$hotelname}', location='{$location}',
                hall_type='{$halltype}', max_crowd='{$maxcrowd}', ac_status='{$acstatus}', price='{$price}', description='{$description}', other_facilities='{$otherfacilities}'
                WHERE service_id='$service_id' ";
        
                $result_query = mysqli_query($conn, $sql);

                if($result_query){
                        header("Location: view-services.php");
                        
                }
                else{
                        $displaymessage= "Services Not Updated";
                        
                }
                    
        }
//     }
         

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Service - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style2.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

</head>
<body>
        <header>
                <?php include('header-2.php')?>
        </header>

        <div class="MainBody">
                <div class="picContainer">
                        <img class="editServices" src="./assets/update.gif" alt="Editing Services Image">
                </div>
                <div class="formContainer">
                        <form class="formDetails" action="" method="post" enctype="multipart/form-data">
                                <h4>Edit Services</h4> 
                                <?php echo "<p style='color:white; background-color:red; padding-left:8px; margin-top: -13px;'>" . $displaymessage . "</p>"; ?>

                                        <?php
                                                if(isset($_GET['service_id']))
                                                {
                                                $service_id = mysqli_real_escape_string($conn, $_GET['service_id']);
                                                $query = "SELECT * FROM hotel_managers WHERE service_id='$service_id' ";
                                                $result = mysqli_query($conn, $query);

                                                if(mysqli_num_rows($result) > 0)
                                                {
                                                        $hotel_manager = mysqli_fetch_array($result);
                                                        ?>
                                                         <input type="hidden" name="service_id" value="<?= $hotel_manager['service_id']; ?>">


                                                        <label for="servicetype">Service Type</label>
                                                        <input type="text" name="servicetype"  value="Hotel">

                                                        <!-- <label for="hotelimage">Hotel Image  (Note:- Allowed only JPG, JPEG, PNG, & GIF files to uplaod)</label>   -->
                                                        <!-- <img src="data:image/jpg;charset=utf8;base64,
                                                        <?php 
                                                        // echo base64_encode($hotel_manager['hotel_image']); 
                                                        ?>
                                                        " alt="" width="100" style='border:2px solid white; margin-bottom:8px;'>       -->
                                                        <!-- <input class="hotelimageinput" type="file" name="hotel_img"> -->
                                                        <label for="hotelname">Hotel Name<em>*</em></label>
                                                        <input type="text" name="hotelname" required value="<?= $hotel_manager['hotel_name']; ?>">

                                                        <label for="location">Location<em>*</em></label>
                                                        <input type="text" name="location" required value="<?= $hotel_manager['location']; ?>">

                                                        <label for="halltype">Hall Type<em></em></label>

                                                        <select name = "halltype" class="dropdownmenu">
                                                                <option value = "indoor" selected>Indoor</option>
                                                                <option value = "outdoor">Outdoor</option>
                                                        </select>


                                                        <label for="maxcrowd">Max Crowd<em>*</em></label>
                                                        <input type="number" name="maxcrowd" required value="<?= $hotel_manager['max_crowd']; ?>">

                                                        <label for="acstatus">Air Condition Status</label>
                                                        <select name = "acstatus" class="dropdownmenu">
                                                                <option value = "yes" selected>Yes</option>
                                                                <option value = "no">No</option>
                                                        </select>

                                                        <label for="price">Price Head<em>*</em></label>
                                                        <input type="text" name="price" required value="<?= $hotel_manager['price']; ?>">

                                                        <label for="description">Description<em>*</em></label>
                                                        <textarea name="description" id="" cols="30" rows="6"><?= $hotel_manager['description']; ?></textarea>


                                                        <label for="otherfacilities">Other Facilities</label>
                                                        <textarea name="otherfacilities" id="" cols="30" rows="4"><?= $hotel_manager['other_facilities']; ?></textarea>

                                                        <button class="updateserviceButton" name="update">Update Services</button>
                                                        <?php
                                                }
                                                else
                                                {
                                                        echo "<h4>No Such Id Found</h4>";
                                                }
                                                }
                                        ?>
                         </form>         
                </div>
        </div>
        
</body>
</html>


