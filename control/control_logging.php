<?php session_start() ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	unset($_SESSION['loginfo']);
	// 入力した情報を取得する
	$user = $_POST['user_id'] ? $_POST['user_id'] : null;
	$pass = $_POST['password'] ? $_POST['password'] : null;

	// アカウントテーブルの内容を入力した情報にそって検索する
	$s = "SELECT * FROM Accounts WHERE account_email = '$user' AND account_pass = '$pass'";
	// echo $s;
	$sql = $db -> query($s);

	// $sql = $db -> query('SELECT * FROM Accounts WHERE account_email="Admin"');

	// SQL文の結果を一行取得する
	$res = $sql -> fetch(PDO::FETCH_ASSOC);

    $logged = password_verify($pass, password_hash($pass, PASSWORD_DEFAULT));

    if($res){
		$isAdmin = $res['account_id'] == 0;
		if(!$isAdmin) header("Location: control_login.php?err=2");
		
		if($pass == $res['account_pass'] || $logged){
			$_SESSION['loginfo'] = [
				'acc_id' => $res['account_id'],
				'email' => $user,
				'pass' => $pass,
			];
			header("Location: control_menu.php");
		}else{
			header("Location: control_login.php?err=1");
		}
	} else {
		header("Location: control_login.php?err=1");
	}
?>