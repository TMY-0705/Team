<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	// var_dump(json_encode($_POST));

	$acc_id = $_SESSION['loginfo']['acc_id'];
	$products = $_POST['product'] ?? null;
	$prices = $_POST['price'] ?? null;
	$amounts = $_POST['amount'] ?? null;
	$rate = 0;

	$today = date("Ymd");
	
	try {
		$sql = $db -> query("SELECT * FROM Carts WHERE account_id = $acc_id");
		$res = $sql -> fetchAll(PDO::FETCH_ASSOC);

		if($res && $products) {
			$sql = $db -> query("SHOW TABLE STATUS LIKE 'Histories'");
			$info = $sql -> fetch(PDO::FETCH_ASSOC);
			$next_id = $info['Auto_increment'];

			$sql = $db -> query("INSERT INTO Histories VALUE (NULL, $acc_id, $today)");
			
			$sql = $db -> query("SELECT * FROM Carts WHERE account_id = $acc_id");
			$res = $sql -> fetchAll(PDO::FETCH_ASSOC);
			$i = 0;

			foreach($res as $row){
				$sql = $db -> query(
					"SELECT * FROM Histories LEFT JOIN Histories_detail
					 ON Histories.history_id = Histories_detail.history_id
					 LEFT JOIN Products ON Histories_detail.product_id = Products.product_id
					 WHERE account_id = $acc_id AND Products.product_id = ".$products[$i]);
				$res = $sql -> fetch(PDO::FETCH_ASSOC);
				if($res) {
					$rate = $res['history_detail_rate'];
					$stock = $res['product_stock'];
				}

				$sql = $db -> query("INSERT INTO Histories_detail VALUE ($next_id, ".$products[$i].", ".$amounts[$i].", $rate)");
				$sql = $db -> query("UPDATE Products SET product_stock = product_stock - ".$amounts[$i]." WHERE product_stock >= 1");
				$sql = $db -> query("UPDATE Products SET product_stock = 0 WHERE product_stock < 0");
				$i++;
			}

			$sql = $db -> query("DELETE FROM Carts WHERE account_id = $acc_id");

			header("Location: purchased.php");
		} else if(!$products) {
			header("Location: cart.php?err=1");
		} else header("Location: cart.php?err=2");
	} catch (PDOException $e) {
		echo $e;
		header("Location: cart.php?err=$e", true, 307);
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>