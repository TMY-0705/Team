<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>ログイン</title>
</head>
<body>
  	<img src="../img/note-only.png" class="home" width="70" height="70">
	
    <form name="login_form" method="POST" action="logging.php">
        <div class="login_form_top">
		<p class="login">ログイン</p>
		<p class="two">メールアドレス</p>
		<input type="address" class="three" name="user_id" placeholder="メールアドレスを入力してください">
        <p class="two">パスワード</p>
        <input type="password" class="three" name="password" placeholder="パスワードを入力してください">
        <p class="err_msg">
			<?php
				$err = $_GET['err'] ?? null;
				switch($err){
					case 1:
						echo 'メールアドレスまたはパスワードが違います。';
						break;
					case 2:
						echo 'このサイトを利用するにはログインが必要です。';
						break;
				}
			?>
		</p>
        <input type="submit" class="login_button" value="ログイン">
        <section></section>
        <a href="../control/control_login.php"><div class="link">管理者用ログインページ</div></a>
	</div>
	<input type="button" class="create_button" onclick="location.href='account_create.php'" value="アカウントを作成する">
	</form>
</body>
</html>