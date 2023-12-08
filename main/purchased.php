<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/konyukan.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>購入完了</title>
</head>
<body>
	<?php require 'header.php'; ?>
    <p class="kanryou">購入完了しました</p>
	<form action="products.php">
		<button type="submit" onclick="location.href='products.php'">一覧に戻る</button>
	</form>
</body>
</html>