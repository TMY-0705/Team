<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/logout.css">
    <title>ログアウト</title>
</head>
<body>
    <form name="logout_form">
		<div class="logout_form_top"></div>
		<img src="../img/note-only.png" class="home" width="70" height="70">
		<h1>ログアウトしますか？</h1>
		<a href="seeyou.php" class="yes">はい</a>
		<a onclick="history.back()" class="no">いいえ</a>
    </form>
</body>
</html>