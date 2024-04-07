<?php
include 'db/db.php';
$v_sid = $_GET['v_id'];
$v_id = intval($v_sid);

$deleteVehicle = "delete from vehicle where v_id=$v_id";
$runDelete = $con->query($deleteVehicle);
$response = [
    "message" => "Deleted successfully",
    "v_id" => $v_id
];

header("Content-Type: application/json");
echo json_encode($response);


?>