<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>アカウント編集完了</title>
	<link rel="stylesheet" href="../css/insert_complete.css">
</head>

<body>
	<style>
		h3 {
			text-align: center;
		}
	</style>

	<?php
		$pass1 = $_POST['pass1'] ?? null;
		$isPassNull = !$pass1;
	?>
	<div>
		<img src="../img/note-only.png" class="home" width="70" height="70">
		<h1>編集完了しました</h1>

		<?php
			if(!$isPassNull)
				echo '<h3>安全性を確保するために、ログアウトしてください。<h3>';
			else
				echo '<h3></h3>';
			
			echo '<input type="button" class="button" ';
			
			if($isPassNull)
				echo 'onclick="location.href=\'products.php\'" value="商品一覧に戻る"';
			else
				echo 'onclick="location.href=\'seeyou.php\'" value="ログインページ"';
			
			echo '>';
		?>
		
	</div>
</body>

</html>