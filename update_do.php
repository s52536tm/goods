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
            <h2>Practice</h2>
            <pre>
                <?php
                    /* ここに、PHPのプログラムを記述します */
                    //phpinfo();

                    $file = $_FILES["picture"];
                    $ext = substr($file["name"], -4);

                    if ($ext == '.gif' || $ext == '.jpg' || $ext == '.png') :
                        $filePath = './img/' . $file['name'];
                        $success = move_uploaded_file($file['tmp_name'], $filePath);
                    
                    if ($success) :
                        $statement = $db->prepare('UPDATE goods SET picture=?, name=?, text=?, price=?, created=NOW() WHERE name=?');
                        $statement->execute([$file['name'],$_POST['name'],$_POST['text'],$_POST['price'],$_POST['point']]);
                        //$statement->bindParam(1,$_POST["memo"]);
                        //$statement->execute();
                        echo "商品データが変更されました";
                ?>
                <?php else: ?>
                ※ ファイルアップロードに失敗しました
                <?php endif; ?>
                <?php else: ?>
                ※拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください
                <?php endif; ?>
                <br>
                <a href="menu.html">トップに戻る</a>
                |
                <a href="goods.php">処理の選択に戻る</a>
            </pre>
        </main>
    </body>    
</html>

