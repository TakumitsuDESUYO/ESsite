<?php
// session_start();

// MySQLに接続
$conn = new mysqli("localhost", "root", "", "sample_data");

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ユーザーがログインしているか確認
if (isset($_SESSION['user_id'])) {
    // ログインしている場合
    $user_id = $_SESSION['user_id'];

    // データを取得するクエリ
    $sql = "SELECT * FROM merchandise_data";
    $result = $conn->query($sql);

    // クエリの実行と結果の処理
    if ($result->num_rows > 0) {
        echo '<div style="display: flex; flex-wrap: wrap;">'; // 横に並べるためのスタイル

        while ($row = $result->fetch_assoc()) {
            echo "<div style=\"width: 200px; height: 400px; border: solid 1px black; margin: 10px;\">
                    <p>商品データ</p>
                    <div style=\"width: 100px; height: 100px; border: solid 1px black; overflow: hidden;\">
                        <img src=\"" . $row["merchandise_image"] . "\" alt=\"Food Image\" style=\"width: 100%; height: 100%;\">
                    </div>"
                . $row["merchandise_name"] ." <br>"
                . $row["merchandise_comment"] ."
                    <p>値段". $row["merchandise_price"] ."円<p>
                    <button onclick=\"addToCart($row[merchandise_id],'$userId')\">商品をカートに入れる</button>
                  </div>";
        }

        echo '</div>'; // 横に並べるためのスタイルの終了
    } else {
        // データが存在しない場合
        echo "0 results";
    }
} else {
    // ログインしていない場合
    echo "ログインしていません。";
}

// データベース接続を閉じる
$conn->close();
?>

<script>
    function addToCart(merchandise_id, user_id) {
        // JavaScriptからデータをPHPに送信する
        var xhr = new XMLHttpRequest();
        var url = '/src/components/addToCart.php'; // あなたのPHPファイルのパスに変更してください
        var params = 'merchandise_id=' + merchandise_id + '&user_id=' + user_id;

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        }

        xhr.send(params);
    }
</script>