<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'header.php' ?>

<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Products
			JOIN Categories
			ON Products.category_id = Categories.category_id
			WHERE Products.product_id = $id
		");
	$res = $sql->fetch(PDO::FETCH_ASSOC);
	$stock = $res['product_stock'] ?? -1;

	$sql = $db->query("SELECT product_id, COUNT(product_id) as cnt, AVG(history_detail_rate) as avg
	FROM Histories_detail WHERE product_id=$id GROUP BY product_id");
	$res2 = $sql->fetch(PDO::FETCH_ASSOC);
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $res['product_name'] ?></title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/product_detail.css">
</head>

<body>
	<div class="master">
		<!-- PHP_START -->
		<div id="product_detail">
			<div id="product_detail_detail">
				<img src='../img/<?= $res['product_image'] ? $res['product_image'] : 'NoImage.png' ?>' alt='<?= $res['product_name'] ?>の画像がでてナイ！'>
				<div class="detail">
					<p class="title"><?= $res['product_name'] ?></p>
					<a href="products.php?maker=<?= $res['product_maker'] ?>" class="store">
						<?= $res['product_maker'] ?>の出版書一覧を表示
					</a>
					<p class="rating">
						<?php
							if (isset($res['product_maker'])) {
								echo $res['product_maker'];
							}
						?>
					</p>
					<span>
						<?php
							if( isset($res2['avg']) ){
								echo $res2['cnt'];
							} else echo "0";
						?>
						件の評価
					</span>
					&nbsp;
					<?php
						if( isset($res2['avg']) ){
							if($res2['product_id'] == $id) {
								echo "<span style='font-size: 3vw'> ", number_format($res2['avg'], 1), "</span>";
							}
						}
					?>
					<p class="title">￥
						<span id="price">
							<?=number_format($res['product_price'])?>
						</span>
					</p>
				</div>
			</div>
		</div>

		<div id="cost">
			<form action="cart_add.php" method="POST">
				<span class="yen" id="total">
					￥&nbsp;<?=number_format($res['product_price'])?>
				</span>
				<p class="any">数量:
					<input type="number" class="number" id="amount" name="amount" value="1" min="1" max="<?= $stock ?>" oninput="recalc();">
				</p>
				<input type="hidden" name="product_id" value="<?= $id ?>">
				<button type="submit">カートに入れる</button>
			</form>
		</div>
		<!-- PHP_END -->
	</div>
	<script src="../js/product_detail.js"></script>
</body>

</html>