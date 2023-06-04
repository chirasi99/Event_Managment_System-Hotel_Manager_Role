
<?php
session_start() ;
include 'config.php';
$displaymessage = "";

if(isset($_POST['save_addservices'])){


if(!empty($_FILES["hotel_image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["hotel_image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         echo $fileName;
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['hotel_image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

  
            $servicetype = mysqli_real_escape_string($conn, $_POST['servicetype']);
            $hotelname = mysqli_real_escape_string($conn, $_POST['hotelname']);
            $location = mysqli_real_escape_string($conn, $_POST['location']);
            $halltype = mysqli_real_escape_string($conn, $_POST['halltype']);
            $maxcrowd = mysqli_real_escape_string($conn, $_POST['maxcrowd']);
            $acstatus = mysqli_real_escape_string($conn, $_POST['acstatus']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $otherfacilities = mysqli_real_escape_string($conn, $_POST['otherfacilities']);
                
            $sql = "INSERT INTO hotel_managers (service_type, hotel_image, hotel_name, location ,hall_type ,max_crowd ,ac_status ,price, description,other_facilities ) 
            VALUES 
            ('{$servicetype}','{$imgContent}','{$hotelname}','{$location}','{$halltype}','{$maxcrowd}','{$acstatus}','{$price}','{$description}','{$otherfacilities}')";
        
            $result = mysqli_query($conn, $sql);
                
            if($result)
            {
                header("Location: view-services.php");
               
            }
            else
            {
                $displaymessage = "Services added unsuccessfully";
                header("Location: add-services.php");
            }

            }
    }
 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Services - Hotel Manager</title>
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
                        <img class="AddServices" src="./assets/add_service_main.gif" alt="Adding Services Image">
                </div>
                <div class="formContainer">
                        <form class="formDetails" action="" method="post" enctype="multipart/form-data">
                                <h4>Add Services</h4> 
                                <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $displaymessage . "</p>"; ?>
                                <label for="servicetype">Service Type</label>
                                <input type="text" name="servicetype"  value="Hotel">
                                        
                                
                                <label for="hotelimage">Hotel Image <em>*</em>  (Note:- Allowed only JPG, JPEG, PNG, & GIF files to uplaod)</label>        
                                <input class="hotelimageinput" type="file" name="hotel_image"  required="" capture>
                        
                                
                                <label for="hotelname">Hotel Name<em>*</em></label>
                                <input type="text" name="hotelname" required>

                                <label for="location">Location<em>*</em></label>
                                <input type="text" name="location" required>

                                <label for="halltype">Hall Type<em></em></label>

                                <select name = "halltype" class="dropdownmenu">
                                        <option value = "indoor" selected>Indoor</option>
                                        <option value = "outdoor">Outdoor</option>
                                </select>


                                <label for="maxcrowd">Max Crowd<em>*</em></label>
                                <input type="number" name="maxcrowd" required>

                                <label for="acstatus">Air Condition Status</label>
                                <select name = "acstatus" class="dropdownmenu">
                                        <option value = "yes" selected>Yes</option>
                                        <option value = "no">No</option>
                                </select>

                                <label for="price">Price Head<em>*</em></label>
                                <input type="text" name="price" required>

                                <label for="description">Description<em>*</em></label>
                                <textarea name="description" cols="30" rows="6"></textarea>
                

                                <label for="otherfacilities">Other Facilities</label>
                                <textarea name="otherfacilities" id="" cols="30" rows="4"></textarea>

                                 <button class="addserviceButton" name="save_addservices">Add Service</button>
                         </form>         
                </div>
        </div>
        
</body>
</html>