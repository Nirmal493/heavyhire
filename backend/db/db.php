<?php 

$con = mysqli_connect("localhost", "root", "", "heavyhire");
// $con = mysqli_connect("localhost", "root", "abhinav", "school");

if($con === true){ 
    echo "not connected"; 
}

?>