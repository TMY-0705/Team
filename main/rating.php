<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$rate = $_POST['rate'] ?? null;
	$product_id = $_POST['product_id'] ?? null;
	$account_id = $_POST['account_id'] ?? null;
	$current = 0;

	// おそらく一番難しいところ
	try {
		$sql = $db -> query(
			"UPDATE Histories LEFT JOIN Histories_detail 
			ON Histories.history_id = Histories_detail.history_id
			SET history_detail_rate = $rate WHERE account_id = $account_id
			AND product_id = $product_id
		");
		header("Location: history.php");
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>