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
            display: flex; /* 要素を横並びにする */
            align-items: center; /* 要素を縦方向に中央揃え */
            padding: 10px;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        input {
            width: 300px; /* 適切な幅に調整 */
            box-sizing: border-box; /* borderやpaddingも含めたサイズ計算 */
        }

        header h1 {
            margin: 0; /* タイトルの余白をリセット */
        }

        header div {
            margin-left: auto; /* 右側に余白をもたせて右寄せにする */
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        header input {
            width: 1000px;
            height: 40px;
            /* width: 60%; */

        }
    </style>
</head>
<body>

    <header>
        <h1>Takuzon.co.jp</h1>
        <div>
            <nav>
                <a href="#">場所を変更する</a>
                <a href="#">インプット</a>
                <input type="text" placeholder="検索 Takuzon.co.jp">
                <a href="#">こんにちは、ログイン</a>
                <a href="#">注文履歴</a>
                <a href="#">カート</a>



            </nav>
        </div>
    </header>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h1>Hello, World!</h1>
    <!-- index.php -->
<?php
echo "This is the content from index.php";

// external.phpをinclude
include('../components/external.php');
?>

    <!-- 他のページのコンテンツを追加 -->

</body>
</html>