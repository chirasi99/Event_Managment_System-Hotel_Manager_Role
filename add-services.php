<?php
session_start() ;
include 'config.php';
$displaymessage = "";

if(isset($_POST['save_addservices'])){
            $vehicle_no = mysqli_real_escape_string($conn, $_POST['vehicle_no']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $manufacture_yr = mysqli_real_escape_string($conn, $_POST['manufacture_yr']);
            $owner_name = mysqli_real_escape_string($conn, $_POST['owner_name']);
         
            $sql = "INSERT INTO vehicle_details (vehicle_no, color, type, manufacture_yr ,owner_name) 
            VALUES 
            ('{$vehicle_no}','{$color}','{$type}','{$manufacture_yr}','{$owner_name}')";
        
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="./css/new/styles-hotel.css" />
   <link rel="stylesheet" href="./css/new/style.css" />
   <link rel="stylesheet" href="./css/new/style1.css" />

   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

   <title>Add New vehical</title>
</head>

<body>

<!-- -------------------------------------Start header for hotel-------------------------------------------------- -->

<!-- -------------------------------------End header for hotel-------------------------------------------------- -->



   <div class="main-container">
     
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="" method="post" class="form" enctype="multipart/form-data">
            <h1 class="title">Add New Vehicle</h1>

            <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $displaymessage . "</p>"; ?>
             <div class="row">
             <div class="column">
                   <div class="text-group">
                     <label class="label" for="vehicle_no">Vechical No</label>
                     <input type="text" name="vehicle_no" placeholder="Enter vehical no here" maxlength="25" required>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="color">Color</label>
                     <input type="text" name="color" placeholder="Enter color here" maxlength="25" required>
                   </div>
                </div>
             </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="type">Vechical Type</label>
                     <input type="text" name="type" placeholder="Enter type here" maxlength="25" required>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="manufacture_yr">Manufacture Year</label>
                      <input type="text" name="manufacture_yr" maxlength="25" required>
                   </div>
                </div>
             </div>

           
             <div class="text-group">
               <label for="owner_name">Owner Name</label>        
               <input class="otherfac" type="text" name="owner_name"  placeholder="Enter owner name here"">
            </div>
            <div class="footer-container">
               <button type="submit" name="save_addservices" class="btn btn-filled btn-theme-purple">Add New Vehicle</button>
            </div>
         </form>
      </div>
   </div>
</body>
</html>