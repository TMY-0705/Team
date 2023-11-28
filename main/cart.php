<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>カート一覧</title>
	<link rel="stylesheet" href="../css/cart.css">
	<link rel="stylesheet" href="../css/product_detail.css">
</head>
<body>
	<!-- header -->
	<?php require 'header.php'; ?>
	<?php require '../php_init/db-connect.php' ?>
	<div class="content">
		<div id="product_detail">
			<span id="title">ショッピングカート</span>
			<hr>
			<!-- PHP_START -->
			<?php
			echo '<div class="content">';
				echo '<div id="product_detail">';
					echo '<a href="#">カテゴリー</a><br>';
					echo "<img src='../img/<?= $res['product_image'] ?>' alt='<?= $res['product_image'] ?>の画像がでてナイ！'>";
					echo '<div class="detail">';
						echo '<h1 class="title">タイトル</h1>';
						echo '<h1 class="title">￥1000</h1>';
						echo '<h2 class="a">';
							echo '<p class="any">数量:<input type="number" class="number"></p>';
						echo '</h2>';
						<!-- PHP_START -->
						<!-- PHP_END -->
					echo '</div>';
				echo '</div>';
			echo '</div>';
			?>
			<!-- PHP_END -->
			
		</div>
		
		<div id="cost">
			<span>合計金額</span>
			<form action="purchased.php" method="POST">
				<!-- PHP_START -->
				￥1000
				<!-- PHP_END -->
				<button type="submit">購入する</button>
			</form>
		</div>
	</div>
</body>
</html>