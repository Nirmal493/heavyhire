<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $star = $_POST['star'];
    $acc_id = $_POST['acc_id'];
    $user_id = $_POST['user_id'];
    $insert = "insert into rating(acc_id, rating, user_id) values('$acc_id', '$star', '$user_id')";
    $run = mysqli_query($con, $insert);
    $response = [
        "message" => "Successfully rated",
    ];

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
  http_response_code(405); 
}

?>