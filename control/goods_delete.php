<!DOCTYPE html>
<html lang="ja">
<head>
	<?php require '../php_init/db-connect.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除確認</title>
    <link rel="stylesheet" href="../css/header1.css">
    <link rel="stylesheet" href="../css/goods_delete.css">
</head>
<body>
	<?php require 'header.php' ?>
	<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Products
			JOIN Categories
			ON Products.category_id = Categories.category_id
			WHERE Products.product_id = $id
		"
	);
	$res = $sql->fetch(PDO::FETCH_ASSOC);

	$sql = $db->query("SELECT COUNT(product_id) as cnt, AVG(history_detail_rate) as avg FROM Histories_detail");
	$res2 = $sql->fetch(PDO::FETCH_ASSOC);
?>
    <p class="sakujo">削除しますか？</p>
    <button class="shohin"><img class="img1" src='../img/<?= $res['product_image'] ?>' alt='<?= $res['product_image'] ?>の画像がでてナイ！'>
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