<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Nammarestaurant";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $arriving_time = $_POST['arriving_time'];
    $seat_number = $_POST['seat_number'];
    $number_of_people = $_POST['number_of_people'];
    $order_item = $_POST['order'];
    $stmt = $conn->prepare("INSERT INTO reservations (name, arriving_time, seat_number, number_of_people, order_item) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $name, $arriving_time, $seat_number, $number_of_people, $order_item);
    if ($stmt->execute()) {
        echo "New reservation created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

