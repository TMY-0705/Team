<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	var_dump(json_encode($_POST));

	$acc_id = $_SESSION['loginfo']['acc_id'];
	$today = date("Ymd");
	$amount =  $_SESSION['cart'][$acc_id]['product_id']['amount'];
	try {
		$sql = $db -> query("INSERT INTO Histories VALUE (NULL, $acc_id, $today)");
		$sql = $db -> query("INSERT INTO Histories_detail VALUE (NULL, $acc_id, $amount)");
		header("Location: purchased.php");
	} catch (PDOException $e) {
		echo $e;
		header("Location: cart.php?err=$e", true, 307);
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>