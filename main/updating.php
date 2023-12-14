<?php session_start() ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	// 入力した情報を取得する
	$name = $_POST['name'] ? $_POST['name'] : null;
	$mail = $_POST['mail'] ? $_POST['mail'] : null;
	$pass1 = $_POST['pass1'] ? $_POST['pass1'] : "";
	$pass2 = $_POST['pass2'] ? $_POST['pass2'] : "";
	$postcode = $_POST['postcode'] ? $_POST['postcode'] : null;
	$prefecture = $_POST['prefecture'] ? $_POST['prefecture'] : null;
	$town = $_POST['town'] ? $_POST['town'] : null;
	$house = $_POST['house'] ? $_POST['house'] : null;

	$isPassNull = !$pass1 && !$pass2;

	// データを挿入する
	try {
		$err = 1;
		$sql = $db -> query("SELECT * FROM Accounts WHERE account_email = '$mail'");
		// アカウントの存在確認
		if($sql -> fetch()) header("Location: account_create.php?err=$err", true, 307);

		$err = 2;
		// パスワードが一致していないときに前の画面に戻す
		if($pass1 != $pass2){
			header("Location: account_update.php?err=$err", true, 307);
		}

		$err = 3;
		// パスワードが空かどうかで処理を分ける
		if($isPassNull) {
			$s = "UPDATE Accounts SET 
				account_name = '$name',
				account_email = '$mail',
				account_postal = '$postcode',
				account_addr_main = '$prefecture',
				account_addr_detail = '$town',
				account_addr_building = '$house'
				WHERE account_id = ".$_SESSION['loginfo']['acc_id'].";";
		} else {
			$s = "UPDATE Accounts SET 
				account_name = '$name',
				account_email = '$mail',
				account_pass = '$pass1',
				account_postal = '$postcode',
				account_addr_main = '$prefecture',
				account_addr_detail = '$town',
				account_addr_building = '$house'
				WHERE account_id = ".$_SESSION['loginfo']['acc_id'].";";
		}
		$sql = $db -> query($s);
		$res = $sql -> fetch(PDO::FETCH_ASSOC);

		header("Location: update_complete.php", true, 307);
	} catch (PDOException $e) {
		echo $e;
		header("Location: account_update.php?err=$err", true, 307);
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>