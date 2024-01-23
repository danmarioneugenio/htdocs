<?php
$mysqli = new mysqli("localhost", "your_username", "your_password", "hotel_booking");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$roomId = $_POST['id'];

// Check if the room is already booked
$result = $mysqli->query("SELECT is_booked FROM rooms WHERE id = $roomId");
$row = $result->fetch_assoc();

if ($row['is_booked']) {
    echo "Room is already booked!";
} else {
    $mysqli->query("UPDATE rooms SET is_booked = 1 WHERE id = $roomId");
    echo "Room booked successfully!";
}

$mysqli->close();
?>
