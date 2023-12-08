<?php
// セッションの開始
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // データベース接続情報
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sample_data";

    // ユーザーが送信したフォームデータを取得
    $user_ID_input = $_POST["user_ID"];
    $user_password_input = $_POST["user_password"];

    // MySQLに接続
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // 接続エラーの確認
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // パスワードのハッシュ化
    $hashed_password = password_hash($user_password_input, PASSWORD_DEFAULT);

    // プリペアドステートメントの準備
    $sql = "INSERT INTO user_data (user_ID, user_password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // バインドパラメータの設定
    $stmt->bind_param("ss", $user_ID_input, $hashed_password);

    // ステートメントの実行
    if ($stmt->execute()) {
        // 登録成功の場合
        echo "新規登録成功";
        // ログインページなどにリダイレクト
        // header("Location: /src/pages/login.php");
    } else {
        // 登録失敗の場合
        echo "新規登録失敗";
        $_SESSION['error'] = '新規登録に失敗しました。';
        // エラーメッセージ表示などの処理
        // header("Location: /src/pages/");
    }

    // ステートメントを閉じる
    $stmt->close();

    // MySQL接続を閉じる
    $conn->close();
}
?>