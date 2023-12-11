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

    // パスワードのハッシュ化
    $hashed_password = password_hash($user_password_input, PASSWORD_DEFAULT);


    $sql = "INSERT INTO user_data (user_ID, user_password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_ID_input, $hashed_password);


    if ($stmt->execute()) {
        echo "新規登録成功";
        header("Location: /src/pages/login.php");
    } else {
        echo "新規登録失敗";
        $_SESSION['error'] = '新規登録に失敗しました。';
        header("Location: /src/pages/");
    }

    $stmt->close();
    $conn->close();
}
?>