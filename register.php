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
            <h1 class="font-weight-normal">商品データの新規登録</h1>    
        </header>

        <main>
            <h2>新規登録する商品のデータを入力してください</h2>
            <form action="register_do.php" method="post" enctype="multipart/form-data">
                商品画像：<input type="file" name="picture"/><br>
                商品名：<input type="text" id="name" name="name" maxlength="100"　value=""/><br>
                説明文：<textarea name="text" cols="50" rows="10" placeholder="商品の紹介・説明"></textarea><br>
                価格：<input type="text" id="price" name="price" maxlength="11"　value=""/>円<br>
                <input type="submit" value="登録する"><br><br>
                <a href="menu.html">トップに戻る</a>
                |
                <a href="goods.php">処理の選択に戻る</a>
            </form>
        </main>
    </body>    
</html>

