<!DOCTYPE html>
<html lang="en">

<?php require 'header.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Products
			JOIN Categories
			ON Products.category_id = Categories.category_id
			LEFT JOIN Histories_detail 
			ON Products.product_id = Histories_detail.product_id
			WHERE Products.product_id = $id
		"
	);
	$res = $sql->fetch(PDO::FETCH_ASSOC);
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $res['product_name'] ?></title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/product_detail.css">
</head>

<body>
	<div class="content">
		<!-- PHP_START -->
		<div id="product_detail">
			<a href="#">カテゴリー</a><br>
			<img src='../img/<?= $sql['product_image'] ?>' alt='<?= $sql['product_name'] ?>の画像がでてナイ！'>
			<div class="detail">
				<h1 class="title"><?= $sql['product_name'] ?></h1>
				<a href="#" class="store"><?= $sql['product_maker'] ?>のストアを表示</a>
				<p class="rating">
					<?php
						if (isset($sql['product_maker'])) {
							echo $sql['product_maker'];
						}
					?>
				</p>
				<a href="#">XX件の評価</a>
				<h1 class="title">￥1000</h1>
			</div>
		</div>

		<div id="cost">
			<form action="cart.php" method="POST">
				<span class="yen">￥1000</span>
				<p class="any">数量:<input type="number" class="number"></p>
				<button type="submit">カートに入れる</button>
			</form>
		</div>
		<!-- PHP_END -->
	</div>
</body>

</html>