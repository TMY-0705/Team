<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$id = $_POST['product_id'] ?? null;
	$amount = $_POST['amount'] ?? null;
	$acc_id = $_SESSION['loginfo']['acc_id'];
	$current = 0;

	try {
		$sql = $db -> query("SELECT * FROM Carts WHERE account_id = $acc_id");
		$res = $sql -> fetchAll(PDO::FETCH_ASSOC);

		$insert = "INSERT INTO Carts VALUE (null, $acc_id, $id, $amount)";
		
		// echo json_encode($res);
		if($res) {
			$cnt = 0;
			foreach($res as $row) {
				if($row['product_id'] == $id){
					$new_amount = $row['amount']+$amount;
					$sql = $db -> query("UPDATE Carts SET amount = $new_amount WHERE account_id = $acc_id AND product_id = $id");
					++$cnt;
				}
			}
			if(!$cnt) $sql = $db -> query($insert);
		} else {
			$sql = $db -> query($insert);
		}

		header("Location: cart.php");
	} catch (PDOException $e) {
		echo '<h2>PDOの例外発生！！！<br>', $e, '</h2>';
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, '</h2>';
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, '</h2>';
	}
?>