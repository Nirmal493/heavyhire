<?php 
include 'db/db.php';
$book_sid = $_GET['book_id'];
$types = $_GET['type'];

$book_id = intval($book_sid);
$type = intval($types);

$mark = "UPDATE book SET type='$type' WHERE book_id=$book_id";
$runMark = $con->query($mark);
$response = [
    "message" => "Marked successfully",
    "type" => $type,
    "book_id" => $book_id
];

header("Content-Type: application/json");
echo json_encode($response);

?>