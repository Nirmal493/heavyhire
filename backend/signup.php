<?php
include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $type_id = $_POST['type_id'];
    $check_same = "select * from accounts";
    $run_same = mysqli_query($con, $check_same);
    while($row = mysqli_fetch_array($run_same)){
      $emailDB = $row['email'];
      if($email == $emailDB){
        $response = [
          "success" => false,
          "message" => "Form not submitted",
        ];
    
        header("Content-Type: application/json");
        echo json_encode($response);
        exit();
      }
    }
    $insert = "insert into accounts(email, pass, type_id, name, phone) values('$email', '$pass', '$type_id', '$name', '$phone')";
    $run = mysqli_query($con, $insert);
    $response = [
        "success" => true,
        "message" => "Form submitted successfully",
    ];

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
  http_response_code(405); 
}

?>