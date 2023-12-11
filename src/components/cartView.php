<?php

session_start();


$conn = new mysqli("localhost", "root", "", "sample_data");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="ja">


<body>

    <div >
        <?php
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        $cart_sql = "SELECT * FROM user_cart WHERE cart_user = '$userId'";
        $cart_result = $conn->query($cart_sql);

        if ($cart_result->num_rows > 0) {
            echo '<div id="cart-content">';
            while ($cart_row = $cart_result->fetch_assoc()) {
                $merchandiseId = $cart_row['cart_items'];
                $item_sql = "SELECT * FROM merchandise_data WHERE merchandise_id = '$merchandiseId'";
                $item_result = $conn->query($item_sql);

                if ($item_result->num_rows > 0) {
                    while ($item_row = $item_result->fetch_assoc()) {
                        echo "<div style='width: 100%; height: 60px; border: solid red; display: flex; margin: 10px;'>
                                <div style='width: 20%; height: 60px; border: solid red;'>
                                    <img src=\"" . $item_row["merchandise_image"] . "\" alt=\"商品画像\" style=\"width: 100%; height: 100%;\">
                                </div>
                                <div style='width: 80%; height: 60px; border: solid red; display: flex; flex-direction: column;'>
                                    <div style='width: 100%; height: 25px; border: solid red;'>
                                        {$item_row['merchandise_name']}
                                    </div>
                                    <div style='width: 100%; height: 25px; border: solid red; display: flex; flex-direction: row;'>
                                        <div style='width: 70%; height: 25px; border: solid red;'>
                                            {$item_row['merchandise_price']}円
                                        </div>
                                        <div style='width: 30%; height: 25px; border: solid red;'>
                                            <button onclick=\"cartDelete($item_row[merchandise_id],'$userId')\">>削除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    } 
                    echo "<button onclick='redirectToCheckout()'>カートの中身を購入する</button>";
                }
            }
            echo '</div>';
        } else {
            echo '<div id="cart-content">カートは空です。</div>';
        }
        ?>
    </div>



    <script>
        function cartDelete(merchandise_id,user_id) {

            console.log(user_id + "の" + merchandise_id +"を削除します")

                    // JavaScriptからデータをPHPに送信する
        var xhr = new XMLHttpRequest();
        var url = '/src/components/cartDelete.php';
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
        
        function redirectToCheckout() {
        var checkoutUrl = 'purchasePage.php';
        window.location.href = checkoutUrl;
    }

    </script>
</body>

</html>

<?php
$conn->close();
?>
