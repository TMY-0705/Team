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
	<title><?= $res['product_name'] ?></title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/product_detail.css">
	<script src="../js/product_detail.js"></script>
</head>

<body>
	<div class="content">
		<!-- PHP_START -->
		<div id="product_detail">
			<a href="#">カテゴリー</a><br>
			
			<img src='../img/<?= $res['product_image'] ?>' alt='<?= $res['product_image'] ?>の画像がでてナイ！'>
			<div class="detail">
				<h1 class="title"><?= $res['product_name'] ?></h1>
				<a href="#" class="store"><?= $res['product_maker'] ?>のストアを表示</a>
				<p class="rating">
					<?php
						if (isset($res['product_maker'])) {
							echo $res['product_maker'];
						}
					?>
				</p>
				<a href="#"><?php
					if( isset($res2['avg']) ){
						echo $res2['cnt'];
					} else echo "0";
				?>件の評価</a>
				<h1 class="title">￥<?=$res['product_price']?></h1>
			</div>
		</div>

		<div id="cost">
			<form action="cart.php" method="POST">
				<span class="yen" id="total" mouseDown="reCalc()" onKeyup="recalc()">4</span>
				<p class="any" id="amount">数量:<input type="number" class="number"></p>
				<button type="submit">カートに入れる</button>
			</form>
		</div>
		<!-- PHP_END -->
	</div>
</body>

</html>