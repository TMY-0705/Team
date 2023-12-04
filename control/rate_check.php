<?php require '../php_init/db-connect.php' ?>
<!DOCTYPE html>
<html lang="ja">
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB選択</title>
    <link rel="stylesheet" href="../css/header4.css">
    <link rel="stylesheet" href="../css/DB_select.css">
</head>
<body>
	<link rel="stylesheet" href="../css/rate_check.css">
	<?php require 'header4.php' ?>
    
	<div class="detail">
	    <img src='../img/<?= $res['product_image'] ?>' alt='<?= $res['product_name'] ?>の画像がでてナイ！'>
		<table>
			<tbody>
				<tr>
					<td>メーカー：
						<?php
						if (isset($res['product_maker'])) {
							echo $res['product_maker'];
						}
						?>
					</td>
					<td>カテゴリー：
						<?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}
						?>
					</td>
				</tr>
				<tr>
					<td>商品名：<?= $res['product_name'] ?><</td>
					<td>値段：
					<?php
						if (isset($res['product_price'])) {
							echo $res['product_price'];
						}
						?>
					</td>
				</tr>
				<tr>
					<td>在庫数：
					<?php
						if (isset($res['product_stock'])) {
							echo $res['product_stock'];
						}
						?>
					</td>
				</tr>
				<tr>
					<td>3.9 ★★★★☆ 2518件</td>
				</tr>
				<tr><td>星5つ 1320件 52.42%</td></tr>
				<tr><td>星4つ 561件 22.28%</td></tr>
				<tr><td>星3つ 128件 5.083%</td></tr>
				<tr><td>星2つ 179件 7.109%</td></tr>
				<tr><td>星1つ 330件 13.11%</td></tr>
				</tr>
			</tbody>
		</table>
	</div>
</body>