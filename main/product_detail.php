<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>カート一覧</title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/product_detail.css">
</head>
<body>
	<?php require 'header.php' ?>
	<?php require '../php_init/db-connect.php' ?>

	<?php
		$product_id = $_GET['id'];
		$sql = $db -> query(
			"SELECT * FROM Products LEFT JOIN Histories_detail 
			 ON Products.product_id = Histories_detail.product_id
			 WHERE Products.product_id = $product_id"
		);
		$res = $sql -> fetch(PDO::FETCH_ASSOC);
	?>
	<div class="content">
		<!-- PHP_START -->
		<div id="product_detail">
			<a href="#">カテゴリー</a><br>
			<img src="../img/<?=$sql['Products.product_image']?>">
			<div class="detail">
				<h1 class="title"><?=$sql['Products.product_name']?></h1>
				<a href="#" class="store"><?=$sql['Products.product_maker']?>のストアを表示</a>
				<p class="rating"><?php
					if(isset($sql['Histories_detail.product_maker'])){
						echo $sql['Histories_detail.product_maker'];
					}
				?></p>
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