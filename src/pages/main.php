<!-- index.php -->
<?php
// 必要なヘッダーを設定
header("Content-Type: text/html; charset=UTF-8");

// タイトルを設定
$title = "My PHP Page";

// HTMLコードを出力
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            height: 50px;
            min-width: 1000px;
            z-index: 1000;
            border: solid red;
        }

        header h1 {
            margin: 0;
            border: solid red;
        }

        header div {
            width: 100%;
            display: flex;
            align-items: center;
            border: solid red;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
            border: solid red;
        }

        input {
            width: 65%;
            box-sizing: border-box;
        }

        /* カート表示用のスタイル */
        #cart-container {
            position: fixed;
            top: 100px; /* headerの下に配置 */
            right: -300px; /* 初期位置は画面外 */
            width: 300px;
            height: 100%;
            background-color: #333;
            color: #fff;
            transition: right 0.3s ease; /* アニメーション設定 */
        }

        #cart-content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Takuzon.co.jp</h1>
        <div>
            <a href="#">場所を変更する</a>
            <input type="text" placeholder="検索 Takuzon.co.jp">
            <a href="#">こんにちは、ログイン</a>
            <a href="#">注文履歴</a>
            <a href="#" onclick="toggleCart()">カート</a>
        </div>
    </header>

    <!-- カート表示用のコンテナ -->
    <div id="cart-container">
        <div id="cart-content">
            <!-- カートの中身が表示される部分 -->
            <!-- ここにカート内の商品などを表示するコードを追加 -->
            カートの中身がここに表示されます。
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="width: 90%; border: solid; margin: auto;">
        <!-- 商品表示機能 -->
        <?php
        include('../components/SpecimenDisplay.php');
        echo "<button>aa</button>";
        ?>
    </div>

    <h1>Hello, World!</h1>

    <!-- 問い合わせ機能 -->
    <?php
    echo "This is the content from index.php";
    include('../components/external.php');
    ?>

    <script>
        function toggleCart() {
            var cartContainer = document.getElementById('cart-container');
            // カートの表示状態を切り替える
            if (cartContainer.style.right === '0px') {
                cartContainer.style.right = '-300px';
            } else {
                cartContainer.style.right = '0px';
            }
        }
    </script>
</body>

</html>
