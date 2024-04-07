<?php
include 'db/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $select = "select * from accounts";
    $run = mysqli_query($con, $select);
    while($row = mysqli_fetch_array($run)){
        $email_db = $row['email'];
        if($email_db == $email){
            $pass_db = $row['pass'];
            if($pass_db == $pass){
                $name_db = $row['name'];
                $type_id = $row['type_id'];
                $acc_id = $row['acc_id'];
                $response = [
                    "success" => true,
                    "message" => "Form submitted successfully",
                    "email" => $email,
                    "name" => $name_db,
                    "type_id" => $type_id,
                    "acc_id" => $acc_id
                ];
                $_SESSION["acc_id"] = $acc_id;
                header("Content-Type: application/json");
                echo json_encode($response);
            }else{
                $response = [
                    "success" => false,
                    "message" => "Form not submitted",
                  ];
              
                  header("Content-Type: application/json");
                  echo json_encode($response);
                  exit();
                // $response->getBody()->write("<script>console.log('You entered wrong email/password');</script>");
            }
        }
    }
} else {
  http_response_code(405); 
}

?>