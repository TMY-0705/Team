<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
  <img src="../img/note-only.png" class="home" width="70" height="70">
    <form name="login_form">
        <div class="login_form_top">
			<p class="login">管理者ログイン</p>
			<p class="two">メールアドレス</p>
			<input type="address" class="three" name="user_id" placeholder="メールアドレス入力してください">
        <p class="two">パスワード</p>
          	<input type="password" class="three" name="password"placeholder="パスワードを入力してください">
        <br>
        <input type="button" class="login_button" onclick="location.href='control_menu.html'" value="ログイン">
        <section></section>
        <a href="../main/login.html"><div class="link">利用者用ログインページ</div></a>
      </div>
      </form>
</body>
</html>