<?php session_start() ?>
<?php
	$acc_id = $_SESSION['loginfo']['acc_id'];
	unset($_SESSION['loginfo']);
	unset($_SESSION['cart'][$acc_id]);
	header("Location: login.php");
?>