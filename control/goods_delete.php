<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除確認</title>
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" href="../css/goods_delete.css">
</head>
<body>
	<?php require 'header.php' ?>
    <p class="sakujo">削除しますか？</p>
    <button class="shohin"><img class="img1" src="../img/!#">
	<table class="itiran">
		<tr>
			<td>メーカー：ＸＸＸ</td>
			<td>カテゴリー：ＸＸＸ</td>
		</tr>
		<tr>
			<td>商品名：ＸＸＸ</td>
			<td>値段：ＸＸＸ</td>
			<td>在庫数：ＸＸＸ</td>
		</tr>
	</table>
    </button><br>
    <a href="delete_finish.php" class="yes">はい</a>
    <a href="#" onclick="history.back()" class="no">いいえ</a>
</body>
</html>