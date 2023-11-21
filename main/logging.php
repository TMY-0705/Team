<?php require '../php_init/db-connect.php' ?>
<?php
	// 入力した情報を取得する
	$user = $_POST['user_id'] ?? null;
	$pass = $_POST['password'] ?? null;

	// アカウントテーブルの内容を入力した情報にそって検索する
	$s = 'SELECT * FROM Accounts WHERE account_email = '."'$user'";
	// echo $s;
	$sql = $db -> query($s);

	// $sql = $db -> query('SELECT * FROM Accounts WHERE account_email="Admin"');

	// SQL文の結果を一行取得する
	$res = $sql -> fetch(PDO::FETCH_ASSOC);
	// echo $user, ", ", $res['account_email'], "<br>";
	// echo $pass, ", ", $res['account_pass'];
	// print_r($res);

    // $logged = password_verify($pass, password_hash($pass, PASSWORD_DEFAULT));

    if($res){
		if($pass == $res['account_pass']){
			header("Location: products.php");
		}else{
			header("Location: login.php?err=1");
		}
	} else {
		header("Location: login.php?err=2");
	}
	var_dump($res);
	exit();
?>