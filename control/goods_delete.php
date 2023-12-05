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
			<td>メーカー：<?php
							if (isset($res['product_maker'])) {
								echo $res['product_maker'];
							}
						?></td>
			<td>カテゴリー：<?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}
						?></td>
		</tr>
		<tr>
			<td>商品名：<?php
						if (isset($res['product_name'])) {
							echo mb_substr($res['product_name'],0,10);
						}
						?>…</td>
			<td>値段：￥<?php
						if (isset($res['product_price'])) {
							echo $res['product_price'];
						}
						?></td>
			<td>在庫数：<?php
						if (isset($res['product_stock'])) {
							echo $res['product_stock'];
						}
						?>冊</td>
		</tr>
	</table>
    </button><br>	
    <a href="delete_finish.php?id=$id" class="yes">はい</a>
    <a href="#" onclick="history.back()" class="no">いいえ</a>
</body>
</html>