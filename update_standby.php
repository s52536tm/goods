<?php require('dbconnect.php'); ?>
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
            <h2>更新・修正する商品の名前を入力してください</h2>
            <form action="update.php" method="post">
                商品名：<input type="text" id="name" name="name" maxlength="100"　value="">
                <input type="submit" value="変更する"><br>
                商品名が不明な場合：<a href="search.php">商品一覧</a><br><br>
                <a href="menu.html">トップに戻る</a>
            </form>
        </main>
    </body>
</html>

