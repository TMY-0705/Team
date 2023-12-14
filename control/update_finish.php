<?php require '../php_init/login_check_control.php' ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新完了</title>
    <link rel="stylesheet" href="../css/header1.css">
    <link rel="stylesheet" href="../css/goodsInsert-finish.css">
</head>
<!-- header bar1 -->
<body>
	<?php require 'header.php' ?>
	<?php require '../php_init/db-connect.php' ?>
	<?php
	
	$id = $_GET['id']; $filename = $_FILES['upload_image']['name'];

	if($filename) {
		$sql=$db->prepare('update Products set product_name=?,product_price=?,product_stock=?,product_image=?,product_maker=?,category_id=? WHERE product_id=?');
		$sql->execute([$_POST["pname"], $_POST["price"], $_POST["stock"], $filename, $_POST["mname"], $_POST["category"],$id]);
		
		$uploaded_path = '../img/'.$filename;
		$result = move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploaded_path);
	} else {
		$sql=$db->prepare('update Products set product_name=?,product_price=?,product_stock=?,product_maker=?,category_id=? WHERE product_id=?');
		$sql->execute([$_POST["pname"], $_POST["price"], $_POST["stock"], $_POST["mname"], $_POST["category"],$id]);
	}
	
    $array = ['なし', '5科参考書', '情報参考書','国語参考書','数学参考書','社会参考書','英語参考書','理科参考書','その他の参考書'];
	$i = $_POST['category'];
    echo '<h1>更新しました</h1>';
	echo '<button class="shohin">';
	if($filename)
		echo '<img class="img1" src="../img/'.$filename. '">';
	echo '<table class="itiran">';
	echo '<tr>';

			echo '<td>メーカー：', $_POST['mname'], '</td>';
			echo '<td>カテゴリー：',$array[$i] , '</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td>商品名：', mb_substr($_POST['pname'],0,10), '…</td>';
			echo '<td>値段：', $_POST['price'], '</td>';
			echo '<td>在庫数：', $_POST['stock'], '</td>';
		echo '</tr>';
	echo '</table>';
    ?>
	</button>
	<br><br><br>
    <input type="button" class="button" onclick="location.href='DB_select.php'" value="一覧へ戻る">
</body>
</html>