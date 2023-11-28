<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB選択</title>
    <link rel="stylesheet" href="../css/header1.css">
    <link rel="stylesheet" href="../css/DB_select.css">
</head>
<!-- header1 -->
<body>
	<?php require 'header.php' ?>
	
    <button class="shohin" onclick="location.href='goods_update.php'">
		<img class="img1" src="../img/SUGAKU.png">
		<table class="itiran">
			<tr>
				<td class="text">メーカー：ＸＸＸ</td>
				<td class="text">カテゴリー：ＸＸＸ</td>
				<td id="btn">
				<a href="goods_delete.php" class="delete"><div class="delin">削除</div></a>
				</td>
			</tr>
			<tr>
				<td class="text">商品名：ＸＸＸ</td>
				<td class="text">値段：ＸＸＸ</td>
				<td class="text">在庫数：ＸＸＸ</td>
			</tr>
		</table>
    </button>
	
</body>
</html>