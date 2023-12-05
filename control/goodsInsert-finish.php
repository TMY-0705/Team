<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link rel="stylesheet" href="../css/header1.css">
    <link rel="stylesheet" href="../css/goodsInsert-finish.css">
</head>
<!-- header1.php -->
<body>
	<?php require 'header2.php' ?>
	<?php require '../php_init/db-connect.php' ?>
	<?php
	$sql=$db->prepare('insert into Products Values (NULL, ?, ?, ?, ?, ?, ?)');
	$sql->execute([$_POST["pname"], $_POST["price"], $_POST["stock"], $_FILES['upload_image']['name'], $_POST["mname"], $_POST["category"]]);

	$filename = $_FILES['upload_image']['name'];
	$uploaded_path = '../img/'.$filename;
	$result = move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploaded_path);

    echo '<h1>登録しました</h1>';

    echo '<button class="shohin"><img class="img1" src="../img/'.$_FILES['upload_image']['name']. '">';

	echo '<table class="itiran">';
		echo '<tr>';
			echo '<td>メーカー：', $_POST['mname'], '</td>';
			echo '<td>カテゴリー：', $_POST['category'], '</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td>商品名：', $_POST['pname'], '</td>';
			echo '<td>値段：', $_POST['price'], '</td>';
			echo '<td>在庫数：', $_POST['stock'], '</td>';
		echo '</tr>';
	echo '</table>';
    ?>
	</button><br><br><br>
    <input type="button" class="button" onclick="location.href='goodsInsert.php'" value="続けて登録する">
    
</body>
</html>