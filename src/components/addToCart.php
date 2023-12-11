<?php
session_start();

$conn = new mysqli("localhost", "root", "", "sample_data");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$merchandise_id = isset($_POST['merchandise_id']) ? $_POST['merchandise_id'] : null;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;

$sql = "INSERT INTO user_cart (cart_user, cart_items) VALUES ('$user_id', '$merchandise_id')";

if ($conn->query($sql) === TRUE) {
    echo "商品をカートに追加しました";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
