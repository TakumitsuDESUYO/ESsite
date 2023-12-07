<?php
// データベース接続情報
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sample_data";

// ユーザーが送信したフォームデータを取得
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_ID_input = $_POST["user_ID"];
    $user_password_input = $_POST["user_password"];

    // MySQLに接続
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // 接続エラーの確認
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // プリペアドステートメントの準備
    $sql = "SELECT user_ID, user_password FROM user_data WHERE user_ID = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);

    // バインドパラメータの設定
    $stmt->bind_param("ss", $user_ID_input, $user_password_input);

    // ステートメントの実行
    $stmt->execute();

    // 結果を取得
    $stmt->store_result();

    // 結果を処理
    if ($stmt->num_rows > 0) {
        // データが一致する場合
        echo "ログイン成功";
    } else {
        // データが一致しない場合
        echo "ログイン失敗";
    }

    // ステートメントを閉じる
    $stmt->close();

    // MySQL接続を閉じる
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 50px auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="user_ID">Username:</label>
        <input type="text" id="user_ID" name="user_ID" required>
        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>