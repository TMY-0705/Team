<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/data_insert.css">
    <script src="../js/postcode.js"></script>
    <title>Document</title>
</head>
<body>
	<?php
		$name = $_POST['name'] ?? null;
		$mail = $_POST['mail'] ?? null;
		$pass1 = $_POST['pass1'] ?? null;
		$pass2 = $_POST['pass2'] ?? null;
		$postcode = $_POST['postcode'] ?? null;
		$prefecture = $_POST['prefecture'] ?? null;
		$town = $_POST['town'] ?? null;
		$house = $_POST['house'] ?? null;
	?>

	<form name="contact" action="">    
        <img src="../img/note-only.png" class="home" width="70" height="70">
        <div>
        <h1>アカウントを作成</h1>
        <p class="char">名前 (最大32文字)</p>
        	<input type="text" name="name" class="text" maxlength="32" value="<?=$name?>">
        <p class="char">メールアドレス (最大128文字)</p>
        	<input type="text" name="mail" class="text" maxlength="128" value="<?=$mail?>">
        <p class="char">パスワード (最大128文字)</p>
        	<input type="password" name="pass1" class="text" maxlength="128" value="<?=$pass1?>">
        <p class="char">もう一度パスワードを入力してください</p>
        	<input type="password" name="pass2" class="text" maxlength="128" value="<?=$pass2?>">
        <p class="char">郵便番号 (7文字)</p>
        	<input type="text" name="postcode" class="postcode" maxlength="7" value="<?=$postcode?>">
        <p class="char">都道府県・市区町村 (最大128文字)</p>
        	<input type="text" name="prefecture" class="text" maxlength="128" value="<?=$prefecture?>">
        <p class="char">丁目・番地・号 (最大128文字)</p>
        	<input type="text" name="town" class="text" maxlength="128" value="<?=$town?>">
        <p class="char">建物名・部屋番号 (最大128文字)</p>
			<input type="text" name="house" class="text" maxlength="128" value="<?=$house?>"><br>
		<p class="err-msg">
			<?php
				$err = $_POST['err_code'] ?? null;
				switch($err){
					case 1:
						echo 'そのメールアドレスは予約済みです。';
						break;
					case 2:
						echo 'データが入力されていない箇所があります。';
						break;
					case 3:
						echo 'パスワードが一致していません。';
						break;
				}
			?>
		</p>
			<input type="button" class="insert_button" onclick="location.href='creating.php'" value="登録する">
        </form>
      </div>
</body>
</html>