<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB選択</title>
    <link rel="stylesheet" href="../css/header4.css">
    <link rel="stylesheet" href="../css/DB_select2.css">
</head>
<!-- header1 -->
<body>
	<form action="rate_check.php" method="post">
	<?php require 'header4.php' ?>
	<?php require '../php_init/db-connect.php' ?>
	<?php
	
	$sql=$db->query('SELECT * FROM Products JOIN Categories ON Products.category_id = Categories.category_id');
	foreach($sql as $row){

		echo '<button class="shohin" onclick="location.href=\'rate_check.php\?id=' . $row['product_id'] . '\'">';
        echo '<img class="img1" src="../img/'.$row['product_image']. '">';
		echo '<table class="itiran">';
			echo '<tr>';
				echo '<td class="text">メーカー：', $row['product_maker'], '</td>';
				echo '<td class="text">カテゴリー：', $row['category_name'], '</td>';
			echo '</tr>';
			echo '<tr>';
				if(strlen($row['product_name'])>10) {
					echo '<td class="text">商品名：', mb_substr($row['product_name'], 0,8), '…</td>';
				} else {
					echo '<td class="text">商品名：', $row['product_name'], '</td>';
				}
				echo '<td class="text">値段：', $row['product_price'], '</td>';
				echo '<td class="text">在庫数：', $row['product_stock'], '</td>';
			echo '</tr>';
		echo '</table>';
    echo '</button>';

	}
	?>
</body>
</html>