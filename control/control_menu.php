<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/control_menu.css">
        <title>管理者メニュー</title>
    </head>
    <body>
		<?php require 'header2.php' ?>

        <form name="menu">
            <a href="DB_select.php" class="menu1">
				<img src="../img/menu1.png" alt="商品編集">
			</a>
			<a href="DB_select2.php" class="menu2">
				<img src="../img/menu2.png" alt="評価確認">
			</a><br>
        	
            <a href="../main/products.php" class="menu3">
                <img src="../img/menu3.png" alt="利用者側ページ">
            </a>
            <a href="control_logout.php" class="menu4">
                <img src="../img/menu4.png" alt="ログアウト">
            </a>
        </form>
    </body>
</html>