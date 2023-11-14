<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/konyukan.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Document</title>
</head>
<body>
	<?php require 'header.php'; ?>
    <p class="edit_profile">
        <a href="#">
            アカウント編集
        </a>
    </p>
    <h1 class="kanryou">購入完了しました</h1>
    <form action="#">
        <div class="content">
            <img class="book" src="../img/book.jpg" alt="本の写真">
            <div class="sute">
                <h1 class="taitol">タイトル</h1>
                <h3>￥1000</h3>
                <p>数量：<input type="number" class="num"></p>
            </div>
        </div>
        <div class="clearfix">
        <button type="submit" >一覧に戻る</button>
        </div>
    </form>    
</body>
</html>