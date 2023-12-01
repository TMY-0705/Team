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
	<?php require 'header.php' ?> <!-- header -->
	<?php require '../php_init/db-connect.php' ?>

	<?php 
		$sql=$db->query('SELECT * FROM Products');
		$res=$sql->fetchAll(PDO::FETCH_ASSOC);
		$acc_id = $_SESSION['loginfo']['acc_id'];
		$total_cost = 0;
	?>

	<div class="master">
		<div id="product_detail">
			<span id="title">ショッピングカート</span>
			<hr>
			
			<!-- PHP_START -->
			<?php
				if(isset($_SESSION['cart'][$acc_id])) {
					foreach($res as $row){
						if( is_null( $_SESSION['cart'][$acc_id][$row['product_id']] ?? null ) ) continue;

						echo '<div class="content">';

							echo '<div id="product_detail_detail">';
							echo '<img src="../img/', $row['product_image'], '" alt="', $row['product_image'], 'の画像がでてナイ！">';
							echo '</div>';

							echo '<div class="detail">';
							echo '<h1 class="title">', $row['product_name'], '</h1>';
							echo '<h1 class="title">￥', $row['product_price'], '</h1>';
							echo '<h2 class="any">数量: <input type="number" class="number" id="amount" name="amount" value="', $_SESSION['cart'][$acc_id][$row['product_id']]['amount'],'" min="1"> | <a href="cart_del.php?id=', $row['product_id'],'">削除</a></h2>';
							echo '</div>';

						echo '</div><hr>';
						
						$total_cost += $_SESSION['cart'][$acc_id][$row['product_id']]['amount'] * $row['product_price'];
					}
				} else {
					echo '<h1>カートに商品が入っていません。</h1>';
				}
			?>
			<!-- PHP_END -->
		</div>

		<div id="cost">
			<span>合計金額</span>
			<form action="purchased.php" method="POST">
				<!-- PHP_START -->
				￥<?=$total_cost?>
				<!-- PHP_END -->
				<button type="submit">購入する</button>
			</form>
		</div>
	</div>
</body>

</html>