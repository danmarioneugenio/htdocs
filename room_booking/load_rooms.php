<?php
$mysqli = new mysqli("localhost", "your_username", "your_password", "hotel_booking");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM rooms");
$rooms = '';

while ($row = $result->fetch_assoc()) {
    $class = $row['is_booked'] ? 'room booked' : 'room';
    $rooms .= '<div class="' . $class . '" data-id="' . $row['id'] . '">' . $row['room_number'] . '</div>';
}

echo $rooms;
$mysqli->close();
?>
