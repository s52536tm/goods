<?php
    /* ここに、PHPのプログラムを記述します */
    try{
        $db = new PDO("mysql:dbname=db_goods; host=127.0.0.1; charset=utf8", "root", "");
    }
    catch(PDOException $e){
        echo "DB接続エラー:".$e->getMessage();
    }
?>

