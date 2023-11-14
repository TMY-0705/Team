<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>カート一覧</title>
	<link rel="stylesheet" href="../css/cart.css">
</head>
<body>
	<!-- header -->
	<div class="content">
		<div id="product_detail">
			<span id="title">ショッピングカート</span>
			<hr>
			<!-- PHP_START -->
			<!-- PHP_END -->
		</div>
		
		<div id="cost">
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