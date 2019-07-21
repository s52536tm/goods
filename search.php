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
                <h1 class="font-weight-normal">商品データの検索</h1>
            </header>

            <main>
            <h2>確認する商品データを選択してください</h2>
            <?php
                if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                } else {
                    $page = 1;
                }
                    $start = 5 * ($page - 1);
                    $memos = $db->prepare('SELECT * FROM goods ORDER BY id LIMIT ?,5');
                    $memos->bindParam(1, $start, PDO::PARAM_INT);
                    $memos->execute();
            ?>
            <article>
                <?php while($memo = $memos->fetch()): ?>
                <p><a href="memo_goods.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['name'], 0, 50)); ?></a><hr><?php print(mb_substr($memo['text'], 0, 50)); ?><?php print((mb_strlen($memo['text'])) > 50 ? '...' : ''); ?></p>
                <time><?php print($memo['created']); ?></time>
                <hr>
                <?php endwhile; ?>

                <?php if ($page >= 2): ?>
                <a href="search.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
                <?php endif; ?>
                |
                <?php
                    $counts = $db->query('SELECT COUNT(*) as cnt FROM goods');
                    $count = $counts->fetch();
                    $max_page = ceil($count['cnt'] / 5);
                    if ($page < $max_page):
                ?>
                <a href="search.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
                |
                <?php endif; ?>
                <a href="menu.html">トップに戻る</a>
                |
                <a href="goods.php">処理の選択に戻る</a>
            </article>
            </main>
        </body>
    </html>

