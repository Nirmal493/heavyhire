<?php
// your_php_script.php

include '../db/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['message']) && isset($_POST['receiver_id'])) {
        $message = $_POST['message'];
        $receiverId = $_POST['receiver_id'];
        $senderId = $_POST['sender_id']; // Assuming you have a session variable storing the current user's ID
        $sendername=$_POST['sender_name'];
        echo $senderId;
        // Insert the message into the chat table
        $sql = "INSERT INTO chats (sender_acc_id, reciever_acc_id, message, status,sender_name)
                VALUES ('$senderId', '$receiverId', '$message', 1,'$sendername')";

        if ($con->query($sql) === TRUE) {
            http_response_code(200); // Message successfully sent
        } else {
            http_response_code(500); // Internal server error
        }
    } else {
        http_response_code(400); // Bad request
    }
}
