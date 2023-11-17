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
	<?php require 'header.php'; ?>
	<div class="content">
		<div id="product_detail">
			<a href="#">カテゴリー</a><br>
			<img src="../img/SUGAKU.png">
			<div class="detail">
				<h1 class="title">タイトル</h1>
				<a href="#" class="store">△△△のストアを表示</a>
				<p class="rating">4.0 ★★★★☆</p>
				<a href="#">XX件の評価</a>
				<h1 class="title">￥1000</h1>
				<!-- PHP_START -->
				<!-- PHP_END -->
			</div>
		</div>
		
		<div id="cost">
			<form action="cart.php" method="POST">
				<span class="yen">￥1000</span>
				<p class="any">数量:<input type="number" class="number"></p>
				<!-- PHP_START -->
				<!-- PHP_END -->
				<button type="submit">カートに入れる</button>
			</form>
		</div>
	</div>
</body>
</html>