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
		$sql = $db->query('SELECT * FROM Carts LEFT JOIN Products ON Carts.product_id = Products.product_id');
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		$acc_id = $_SESSION['loginfo']['acc_id'];
		$total_cost = 0;
	?>

	<form action="purchase.php" method="POST">
		<div class="master">
			<div id="product_detail">
				<span id="title">ショッピングカート</span>
				<hr>

				<!-- PHP_START -->
				<?php
				if ($res) {
					$i = 0;
					foreach ($res as $row) {
						$product_id = $row['product_id'] ?? null;
						if (is_null($product_id)) continue;

						echo '<div class="content">', "\n";

						echo '<div id="product_detail_detail">', "\n";
						echo '<img src="../img/', $row['product_image'] ? $row['product_image'] : 'NoImage.png', '" alt="', $row['product_image'], 'の画像がでてナイ！">', "\n";
						echo '</div>', "\n";

						echo '<div class="detail">', "\n";
						echo '<input type="hidden" name="product[]" value="', $product_id, '"></input>';
						echo '<p class="title"">', $row['product_name'], '</p>', "\n";
						echo '<p class="title">￥', number_format($row['product_price']), '</p>', "\n";
						echo '<input type="hidden" name="price[]" id="price_', $i, '" value="', $row['product_price'], '">', "\n";
						echo '<h3 class="any">数量: ', "\n";
						echo '<input type="number" name="amount[]" class="number" id="amount_', $i, '" name="amount" value="', $row['amount'], '" min="1" oninput="recalc();">', "\n";
						echo ' | <a href="cart_del.php?id=', $row['product_id'], '">削除</a></h3>', "\n";
						echo '</div>', "\n";

						echo '</div><hr>', "\n";

						$total_cost += $row['amount'] * $row['product_price'];
						++$i;
					}
				} else {
					echo '<h1>カートに商品が入っていません。</h1>', "\n";
				}
				?>
				<!-- PHP_END -->
			</div>

			<div id="cost">
				<span>合計金額</span>

				<!-- PHP_START -->
				<span id="total" onload="defaultCost();">
					￥<?= number_format($total_cost) ?>
				</span>
				<input id="isChanged" type="hidden" name="isChanged" value="false">
				<?php
				if ($res) {
					foreach ($res as $row) {
						$product_id = $row['product_id'] ?? null;
						$amount = $row['amount'] ?? null;
						if (is_null($product_id) || is_null($amount)) continue;
					}
				}
				
				?>
				<!-- PHP_END -->

				<button type="submit">購入する</button>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		const user = <?= json_encode($acc_id) ?>;
		var n = <?= $i ?>;
		var defaultCost = <?= $total_cost ?>;
	</script>

	<script src="../js/cart.js" defer></script>
</body>

</html>