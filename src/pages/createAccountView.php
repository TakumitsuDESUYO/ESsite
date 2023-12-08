<!DOCTYPE html>
<html lang="ja">
    <head>
        <style>
        </style>
    </head>
    <body>
    <form action="/src/components/createAccount.php" method="post">
        <div style="width:400px;height: 420px;border: solid 2px black;">
            <p style="text-align: center; font-size: 30px;">アカウント作成</p>
            <label for="user_ID">メールアドレス:</label>
            <input type="text" id="user_ID" name="user_ID" required>
            <label for="user_password">パスワード:</label>
            <input type="password" id="user_password" name="user_password" required><br>
            <button type="submit" style="width: 100px;">アカウント作成</button>
            <?php
                session_start();
                $error_text = isset($_SESSION['error']) ? $_SESSION['error'] : '';
                echo $error_text . "<br>";
                unset($_SESSION['error']);
            ?>  
        </div>  
    <form>
    </body>
</html>