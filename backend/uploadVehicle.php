<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acc_id = $_POST['acc_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $insurance = $_POST['insurance'];
    $reg_no = $_POST['reg_no'];
    $exp_date = $_POST['exp_date'];
    

    $insert = "insert into vehicle(acc_id, brand, model, insurance, reg_no, exp_date) values('$acc_id', '$brand', '$model', '$insurance', '$reg_no', '$exp_date')";
    $run = mysqli_query($con, $insert);
    $response = [
        "message" => "Form submitted successfully",
    ];

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
  http_response_code(405); 
}

?>