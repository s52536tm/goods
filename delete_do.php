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
            <h2>Practice</h2>
            <pre>
                <?php
                    /* ここに、PHPのプログラムを記述します */
                    //phpinfo();

                    $statement = $db->prepare("DELETE FROM goods WHERE name=?");
                    $statement->execute([$_POST['name']]);
                    //$statement->bindParam(1,$_POST["memo"]);
                    //$statement->execute();
                    echo "商品データが削除されました";
                    
                ?>
                <br>
                <a href="menu.html">トップに戻る</a>
                |
                <a href="goods.php">処理の選択に戻る</a>
            </pre>
        </main>
    </body>    
</html>

