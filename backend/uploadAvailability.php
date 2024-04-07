<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $v_id = $_POST['v_id'];
    $acc_id = $_POST['acc_id'];
    $from_id = $_POST['from_id'];
    $to_id = $_POST['to_id'];
    $tfrom = $_POST['tfrom'];
    $tto = $_POST['tto'];
    $phone = $_POST['phone'];
    $file = $_FILES['image'];
    $image = $file['name'];
    
    move_uploaded_file($file['tmp_name'], "availableImages/$image");

    $insert = "insert into available(v_id, acc_id, from_id, to_id, tfrom, tto, phone, image) values('$v_id', '$acc_id', '$from_id', '$to_id', '$tfrom', '$tto', '$phone', '$image')";
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