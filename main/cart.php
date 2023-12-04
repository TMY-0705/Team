<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>カート一覧</title>
	<link rel="stylesheet" href="../css/cart.css">
	<link rel="stylesheet" href="../css/product_detail2.css">
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
					$i = 0;
					foreach($res as $row){
						if( is_null( $_SESSION['cart'][$acc_id][$row['product_id']] ?? null ) ) continue;

						echo '<div class="content">';

							echo '<div id="product_detail_detail">';
							echo '<img src="../img/', $row['product_image'], '" alt="', $row['product_image'], 'の画像がでてナイ！">';
							echo '</div>';

							echo '<div class="detail">';
							echo '<p class="title"">', $row['product_name'], '</p>';
							echo '<p class="title">￥', number_format($row['product_price']), '</p>';
							echo '<input type="hidden" id="price_',$i,'" value="', $row['product_price'], '">';
							echo '<h3 class="any">数量: <input type="number" class="number" id="amount_',$i,'" name="amount" value="', $_SESSION['cart'][$acc_id][$row['product_id']]['amount'],'" min="1" oninput="recalc();"> | <a href="cart_del.php?id=', $row['product_id'],'">削除</a></h3>';
							echo '</div>';

						echo '</div><hr>';
						
						$total_cost += $_SESSION['cart'][$acc_id][$row['product_id']]['amount'] * $row['product_price'];
						++$i;
					}
				} else {
					echo '<h1>カートに商品が入っていません。</h1>';
				}
			?>
			<!-- PHP_END -->
		</div>

		<div id="cost">
			<span>合計金額</span>
			<form action="purchase.php" method="POST">
				<!-- PHP_START -->
				<span id="total">
					￥<?=number_format($total_cost)?>
				</span>
				<?php
					foreach($_SESSION['cart'][$acc_id] as $data) {
						foreach($data as $amount) {
							echo '<input type="hidden" name="detail[][]" value="', $amount, '">';
						}
					}
				?>
				<!-- PHP_END -->
				
				<button type="submit">購入する</button>
			</form>
		</div>
	</div>
	<script>
		const user = <?= json_encode($acc_id) ?>;
		var n = <?= $i ?>;
	</script>

	<script src="../js/cart.js" defer></script>
</body>

</html>