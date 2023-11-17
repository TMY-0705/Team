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
    <button class="shohin"><img class="img1" src="../img/SUGAKU.png" onclick="location.href='goods_update.php'">
		<table class="itiran">
			<tr>
				<td>メーカー：ＸＸＸ</td>
				<td>カテゴリー：ＸＸＸ</td>
				<td id="btn">
				<input type="button" class="button" onclick="location.href='goods_delete.php'" value="削除" >
				</td>
			</tr>
			<tr>
				<td>商品名：ＸＸＸ</td>
				<td>値段：ＸＸＸ</td>
				<td>在庫数：ＸＸＸ</td>
			</tr>
		</table>
    </button>
</body>
</html>