<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$id = $_GET['id'] ?? null;
	$current = 0;

	// DBに不備があるため、SESSIONを代用。
	try {
		$sql = $db -> query("DELETE FROM Carts WHERE product_id = $id");
		header("Location: cart.php");
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>