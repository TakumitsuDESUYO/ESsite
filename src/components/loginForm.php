<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sample_data";

    $user_ID_input = $_POST["user_ID"];
    $user_password_input = $_POST["user_password"];
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT user_ID, user_password FROM user_data WHERE user_ID = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_ID_input, $user_password_input);
    $stmt->execute();

    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "ログイン成功";
        $_SESSION['user_id'] = $user_ID_input;
        header("Location: /src/pages/main.php");
    } else {
        echo "ログイン失敗";
        $_SESSION['error'] = 'ログインに失敗しました。IDとパスワードを確認してください';
        header("Location: /src/pages/");
    }


    $stmt->close();
    $conn->close();
}
?>