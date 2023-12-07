<!-- contact_form.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームからのデータを取得
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        // メール送信などの処理を追加する

        // 結果メッセージを表示
        echo "<h1>問い合わせの送信が完了しました。</h1>";
        echo "<p>指定のメールアドレス</p>";
    } else {
        // 問い合わせフォームを表示
    ?>
        <h1>問い合わせフォーム</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="message">問い合わせ内容:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    <?php
    }
    ?>
</body>
</html>
