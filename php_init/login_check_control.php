<?php session_start() ?>
<?php 
	if(!isset($_SESSION['loginfo']))
		header("Location: control_login.php?err=2");
	else if($_SESSION['loginfo']['acc_id'] != 0)
		header("Location: control_login.php?err=2");
?>