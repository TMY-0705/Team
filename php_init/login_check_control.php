<?php session_start() ?>
<?php 
	if(empty($_SESSION['loginfo']))
		header("Location: control_login.php?err=2");
	else if($_SESSION['loginfo']['account_id'] != 0)
		header("Location: control_login.php?err=2");
?>