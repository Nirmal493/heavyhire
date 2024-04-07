<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $avai_id = $_POST['avai_id'];
    $v_id = $_POST['v_id'];
    $acc_id = $_POST['acc_id'];
    $loc = $_POST['loc'];
    $tfrom = $_POST['tfrom'];
    $tto = $_POST['tto'];
    $phone = $_POST['phone'];
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "availableImages/$image");
    }else{
        $image = $_POST['oimage'];
    }
    

    $insert = "UPDATE available SET v_id = '$v_id', acc_id = '$acc_id', loc = '$loc', tfrom = '$tfrom', tto = '$tto', phone = '$phone', image = '$image' WHERE avai_id = $avai_id";
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