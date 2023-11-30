<?php session_start() ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	// 入力した情報を取得する
	$name = $_POST['name'] ?? null;
	$mail = $_POST['mail'] ?? null;
	$pass1 = $_POST['pass1'] ?? null;
	$pass2 = $_POST['pass2'] ?? null;
	$postcode = $_POST['postcode'] ?? null;
	$prefecture = $_POST['prefecture'] ?? null;
	$town = $_POST['town'] ?? null;
	$house = $_POST['house'] ?? null;

	// データを挿入する
	try {
		$sqls = [
			0 => "SELECT * FROM Accounts",
			1 => "SELECT * FROM Categories",
			2 => "SELECT * FROM Products",
			3 => "SELECT * FROM Product_detail",
			4 => "SELECT * FROM Accounts",
			5 => "SELECT * FROM Accounts",
		];
	} catch (PDOException $e) {
		echo '<h2>PDOの例外発生！！！<br>', $e, "</h2>";
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>