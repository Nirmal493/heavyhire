<?php
include 'db/db.php';
// $inputData = file_get_contents('php://input');

// parse_str($inputData, $putData);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $v_id = $_POST['v_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $insurance = $_POST['insurance'];
    $reg_no = $_POST['reg_no'];
    $exp_date = $_POST['exp_date'];
    

    $insert = "UPDATE vehicle SET brand = '$brand', model = '$model', insurance = '$insurance', reg_no = '$reg_no', exp_date = '$exp_date' WHERE v_id = $v_id";
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