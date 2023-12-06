<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品更新</title>
    <link rel="stylesheet" href="../css/header3.css">
    <link rel="stylesheet" href="../css/goodsInsert.css">
</head>
<body>
<!-- header3.php -->
<?php require 'header3.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Products
			LEFT JOIN Categories
			ON Products.category_id = Categories.category_id
			LEFT JOIN Histories_detail
			ON Products.product_id = Histories_detail.product_id
			WHERE Products.product_id = $id
		"
	);
	$res = $sql->fetch(PDO::FETCH_ASSOC);

	$sql = $db->query("SELECT COUNT(product_id) as cnt, AVG(history_detail_rate) as avg FROM Histories_detail");
	$res2 = $sql->fetch(PDO::FETCH_ASSOC);
?>
<form action="update_finish.php?id=<?=$res['product_id']?>" method="POST" enctype="multipart/form-data">
<span class="yohaku">・商品名　　</span><input type="text" name="pname" class="text" value="<?php
						if (isset($res['product_name'])) {
							echo $res['product_name'];
						}
						?>"><br>
<span class="yohaku">・メーカー名</span><input type="text" name="mname" class="text" value="<?php
						if (isset($res['product_maker'])) {
							echo $res['product_maker'];
						}
						?>"><br>
<span class="yohaku">・在庫数　　</span><input type="text" name="stock" class="text" value="<?php
						if (isset($res['product_stock'])) {
							echo $res['product_stock'];
						}
						?>"><br>
<span class="yohaku">・カテゴリー</span><select name="category" name="category" class="text">
<option value="" selected hidden><?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}
						?></option>
<option value="1">5科参考書</option>
<option value="2">情報参考書</option>
<option value="3">国語参考書</option>
<option value="4">数学参考書</option>
<option value="5">社会参考書</option>
<option value="6">英語参考書</option>
<option value="7">理科参考書</option>
<option value="8">その他の参考書</option></select><br>
<span class="yohaku">・値段　　　</span><input type="text" name="price" class="text" value="<?php
						if (isset($res['product_price'])) {
							echo $res['product_price'];
						}
						?>"><br>
<span class="file">・商品画像　　</span><input type="file" name="upload_image" class="filebutton" accept="image/*" value="<?php
						if (isset($res['product_image'])) {
							echo $res['product_image'];
						}
						?>"><br>
<input type="submit" class="button2" value="更新">
</form>
</body>
</html>