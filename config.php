<?php

$conn = mysqli_connect("localhost", "root", "", "vehicles");

if(!$conn){
        echo "Connection Failed";
}
