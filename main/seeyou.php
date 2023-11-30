<?php session_start() ?>
<?php
	unset($_SESSION['loginfo']);
	unset($_SESSION['cart']);
	header("Location: login.php");
?>