<?php require("dbconnect.php"); ?>
<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../../css/style.css">

        <title>goods database</title>
    </head>
    <body>
        <header>
            <h1 class="font-weight-normal">商品データの変更</h1>    
        </header>

        <main>
            <h2>商品のデータを更新・修正してください</h2>
            <?php
                if (isset($_POST['name']) || is_numeric($_POST['name'])) {
                    $name = $_POST['name'];
                    print $name;

                    $goods = $db->prepare('SELECT * FROM goods WHERE name=?');
                    $goods->execute(array($name));
                    $goods_info = $goods->fetch();
                    $goods_name = $goods_info['name'];
                    $goods_price = $goods_info['price'];
                    $goods_enc_name = htmlspecialchars( $goods_name , ENT_QUOTES ) ;
                    $goods_enc_price = htmlspecialchars( $goods_price , ENT_QUOTES ) ;
                }
            ?>
            <form action="update_do.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="point" value="<?php echo($name); ?>" />
                現在の画像：<img src="img/<?php echo htmlspecialchars($goods_info['picture'], ENT_QUOTES); ?>" width="64" height="64" /><br>
                商品画像：<input type="file" name="picture" /><br>
                商品名：<textarea name="name" cols="50" rows="2"><?php echo htmlspecialchars($goods_info["name"], ENT_QUOTES); ?></textarea><br>
                説明文：<textarea name="text" cols="50" rows="10" placeholder="商品の紹介・説明"><?php echo htmlspecialchars($goods_info["text"], ENT_QUOTES); ?></textarea><br>
                価格：<input type="number" name="price" maxlength="11"　value="<?php echo $goods_enc_price; ?>" />円<br>
                <input type="submit" value="変更する"><br><br>
                <a href="menu.html">トップに戻る</a>
                |
                <a href="goods.php">処理の選択に戻る</a>
            </form>
        </main>
    </body>    
</html>
