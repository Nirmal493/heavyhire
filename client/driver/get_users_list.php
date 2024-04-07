<?php
// get_user_list.php

// Assuming you have already established a database connection in your db.php file
include '../db/db.php';

// Function to sanitize input and prevent SQL injection
function sanitize($data)
{
    global $con;
    return mysqli_real_escape_string($con, $data);
}

// Query to get the list of users from the chat table whose type_id in accounts table is equal to 1
$sql = "SELECT DISTINCT c.sender_acc_id, a.name FROM chats c
        INNER JOIN accounts a ON c.sender_acc_id = a.acc_id
        WHERE a.type_id = 2";

$result = $con->query($sql);

if ($result) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $user = array(
            'id' => $row['sender_acc_id'],
            'name' => $row['name']
        );
        $users[] = $user;
    }
    echo json_encode($users); // Return the list of users as JSON data
} else {
    // Handle the case when the query fails
    echo json_encode(array('error' => 'Failed to fetch user list.'));
}

// Close the database connection
$con->close();
?>
