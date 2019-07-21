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
                <h1 class="font-weight-normal">店舗情報の詳細</h1>
            </header>

        <main>
            <h2>選択した店舗で販売している商品データの詳細が確認できます</h2>
            <?php
                /* ここに、PHPのプログラムを記述します */
                //phpinfo();

                $memos = $db->prepare('SELECT * FROM goods, stores WHERE stores.id=? AND stores.goods_id=goods.id');
                $memos->execute(array($_REQUEST['id']));
                $memo = $memos->fetch();
            ?>

            <article>
                <img src="img/<?php echo htmlspecialchars($memo['picture'], ENT_QUOTES); ?>" width="100" height="100" /><br>
                <pre><?php print($memo['text']); ?><hr><?php print($memo['price']); ?>円</pre>

                <a href="stores.php">戻る</a>
            </article>
        </main>
    </body>
</html>

