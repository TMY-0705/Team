<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$id = $_POST['product_id'] ?? null;
	$amount = $_POST['amount'] ?? null;

	$_SESSION['cart'] = [
		'product_id' => $id,
		'amount' => $amount,
	];

	
?>