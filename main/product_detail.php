<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/search_result.css">
		<link rel="stylesheet" href="../css/detail.css">
		<title>Document</title>
	</head>
	<body>
		<!-- header -->
		<?php require 'header.php'; ?>
		
		<div class="content">
			<div id="product_detail">
				<!-- PHP_START -->
				<img class="detail" src="../img/SUGAKU.png">
				<span class="name">す　う　が　く</span><br>
				<span class="price">￥1300</span>
				<!-- PHP_END -->
			</div>
			
			<div id="price">
				<span>合計金額</span>
				<form action="purchased.php" method="POST">
					<!-- PHP_START -->
					<!-- PHP_END -->
					<button type="submit">購入する</button>
				</form>
			</div>
		</div>
	</body>
</html>