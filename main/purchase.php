<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$acc_id = $_SESSION['loginfo']['acc_id'];
	$today = date("Ymd");
	try {
		$sql = $db -> query("INSERT INTO Histories VALUE (NULL, $acc_id, $today)");
		
	} catch (PDOException $e) {
		echo $e;
		header("Location: cart.php?err=$err", true, 307);
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>