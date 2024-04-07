<?php
// get_previous_messages.php

include '../db/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['sender_id']) && isset($_GET['receiver_id'])) {
        $senderId = $_GET['sender_id'];
        $receiverId = $_GET['receiver_id'];

        // Fetch previous messages from the chat table based on sender and receiver acc_ids
        $sql = "SELECT * FROM chats 
                WHERE (sender_acc_id = $senderId AND reciever_acc_id = $receiverId) 
                OR (sender_acc_id = $receiverId AND reciever_acc_id = $senderId)
                ORDER BY timestamp ASC";

        $result = $con->query($sql);
        $messages = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
            echo json_encode($messages); // Send the messages as a JSON response
        } else {
            http_response_code(204); // No Content (no messages found)
        }
    } else {
        http_response_code(400); // Bad request
    }
}
?>
