<?php session_start() ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	unset($_SESSION['loginfo']);

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
		$err = 1;
		$sql = $db -> query('SELECT * FROM Accounts WHERE account_email = '.$mail);
		// アカウントの存在確認
		if($sql -> fetch()) header("Location: account_create.php?err=$err", true, 307);
		
		$err = 2;
		if($pass1 != $pass2){
			header("Location: account_create.php?err=$err", true, 307);
		}

		$err = 3;
		$s = "INSERT INTO Accounts VALUE ('$name', $mail, $pass2, $postcode, '$prefecture', '$town', '$house');";
		$sql = $db -> query($s);
		$res = $sql -> fetch(PDO::FETCH_ASSOC);

		$_SESSION['loginfo'] = [
			'email' => $mail,
			'pass' => $pass1,
		];

		header("Location: create_complete.php");
	} catch (PDOException $e) {
		header("Location: account_create.php?err=$err", true, 307);
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>