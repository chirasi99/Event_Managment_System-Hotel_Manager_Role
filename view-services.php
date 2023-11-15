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
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="./css/footer.css" />
        <link rel="stylesheet" href="./css/styles-hotel.css">
        <link rel="stylesheet" href="./css/new/table.css" />


<style>
        .table-container,
        .table-container::before,
        .table-container::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0; 
        }

        .table-container {
        font-family: 'Poppins';
        height: auto;
        min-height: 50vh;
        display: grid;
        justify-content: center;
        align-items: center;
        color: #4f546c;
        background-color: #f9fbff;
        }

        .table-container table {
        border-collapse: collapse;
        box-shadow: 0 5px 10px #e1e5ee;
        background-color: white;
        text-align: left;
        overflow: hidden;
        border-style:none !important;
        }

        .table-container thead {
            box-shadow: 0 5px 10px #e1e5ee;
        }

        .table-container th {
            padding: 2rem 3rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 12px;
            font-weight: 900;
            border-style:none !important;
        } 

        .table-container td {
            padding: 2rem 3.8rem;
            border-style:none !important;
            font-size: 12px;
        }

        .table-container a {
            text-decoration: none;
            color: #2962ff;
        }

        .table-container .status {
            border-radius: 0.2rem;
            /* background-color: red; */
            padding: 0.2rem 1rem;
            text-align: center;
        }
        .table-container .status-pending {
            background-color: #fff0c2;
            color: #a68b00;
            }

        .table-container .status-paid {
            background-color: #c8e6c9;
            color: #388e3c;
            }

        .table-container .status-unpaid {
            background-color: #ffcdd2;
            color: #c62828;
            }


        .table-container .amount {
            text-align: right;
        }

        .table-container tr:nth-child(even) {
            background-color: #f4f6fb;
        }

        .filter-card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 40%;
            border-radius: 5px;
            margin: 10px;
            padding: 10px 10px 10px 10px;
        }

        .filter-card .container {
            padding: 2px 16px;
            font-size:14px;
        }

        .logo {
            width: 7.7rem !important; 
            position: absolute;
        }

        .menu-bar {
            margin-top: -25px !important;
        }

        .filter-card .container label {
            margin-left:8px;
        }
        .filter-card.month .container input {
            margin-left:25px;
        }

        @media print {
            .footer{
                display: none;
            }

            @page:first {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: -0.9in;
                margin-bottom: 0.2in;
            }
            @page {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: 0.2in;
                margin-bottom: 0.2in;
            }
        }
</style>


<title>View Vehicle Details</title>

</head>

<body>




<div class="main-content">

<section class="table-container">
<a href="./add-services.php? ?>" class="deleteButton" style="text-decoration:none; color:white; width: 150px; margin-left:-2px; background-color:#037AFF">Add New Vehicle</a>
   
   <table style="margin-top:25px; margin-bottom:50px;" id="myTable">
            <thead>
            <tr>
                <th>Vehicle No</th>
                <th>Color</th>
                <th>Vehical Type</th>
                <th>Manufacture Year</th>
                <th>Owner Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
            
            <?php 
                $query = "SELECT * FROM vehicle_details";
                $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $vehicle){
                    ?>
                    <tr>
                        <td><?=$vehicle['vehicle_no']?></td>
                        <td><?=$vehicle['color']?></td>
                        <td><?=$vehicle['type']?></td>
                        <td><?=$vehicle['manufacture_yr']?></td>
                        <td><?=$vehicle['owner_name']?></td>
                        <td><div class="buttonContainer">
                            <a href="./edit-services.php?ID=<?=$vehicle['ID']; ?>" class="editButton" style="text-decoration:none; color:white">Edit</a>
                            <a href="./delete-service.php?ID=<?=$vehicle['ID']; ?>" class="deleteButton" style="text-decoration:none; color:white">Delete</a>
                        </div></td>
                    </tr>

                     <?php
                         }
                    }
                    else{
                        echo "<h3> No Services Found </h4>";
                    }
                    ?>
            </tbody>
        </table>
</section>
</div>
</body>

</html>
