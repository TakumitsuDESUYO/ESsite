
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <style>
            container{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            body {
                font-family: Arial, sans-serif;
                
            }
            form {
                width: 400px;
                height: 420px;
                margin: 50px auto;
                border: solid 1px black;
                border-radius: 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }
            input {
                width: 80%;
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
        <container>
        <form action="/src/components/loginForm.php" method="post">
            <p style="font-size: 30px;">ログイン</p>
            <div style="width: 350px;height: 200px;margin-top:20px;">
                <label for="user_ID">Username:</label>
                <input type="text" id="user_ID" name="user_ID" required>
                <label for="user_password">Password:</label>
                <input type="password" id="user_password" name="user_password" required><br>
            </div>
            <button type="submit" style="width: 300px;border-radius: 15px;">Login</button>
           
            <?php
                session_start();
                $error_text = isset($_SESSION['error']) ? $_SESSION['error'] : '';
                echo $error_text . "<br>";
                unset($_SESSION['error']);
            ?>  
        </form>
        <a href="/src/pages/createAccountView.php">アカウント作成はこちらから</a>
        </container>
    </body>
</html>