<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acc_id = $_POST['acc_id'];
    $rating = $_POST['rating'];
    $user_id = $_POST['user_id'];

    $check_query = "SELECT * FROM rating WHERE user_id = '$user_id' and acc_id = '$acc_id'";
    $result = $con->query($check_query);

    if ($result->num_rows > 0) {
        $query = "UPDATE rating SET rating = '$rating' where user_id = $user_id and acc_id = $acc_id";
    } else {
        $query = "INSERT INTO rating (acc_id, rating, user_id) VALUES ('$acc_id', '$rating', '$user_id')";
    }
    $run = mysqli_query($con, $query);
    $response = [
        "message" => "Rated successfully",
    ];

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
  http_response_code(405); 
}

?>