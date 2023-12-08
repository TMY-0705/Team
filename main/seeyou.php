<?php session_start() ?>
<?php
	$acc_id = $_SESSION['loginfo']['acc_id'];
	unset($_SESSION['loginfo']);
	header("Location: login.php");
?>