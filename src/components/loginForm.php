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
        header("Location: /src/pages/main.php");
    } else {
        // データが一致しない場合
        echo "ログイン失敗";
        $_SESSION['error'] = 'ログインに失敗しました。IDとパスワードを確認してください';
        header("Location: /src/pages/");
    }

    // ステートメントを閉じる
    $stmt->close();

    // MySQL接続を閉じる
    $conn->close();
}
?>