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
<form action="update_finish.php" method="post" enctype="multipart/form-data">
<span class="yohaku">・商品名　　</span><input type="text" class="text"><br>
<span class="yohaku">・メーカー名</span><input type="text" class="text"><br>
<span class="yohaku">・在庫数　　</span><input type="text" class="text"><br>
<span class="yohaku">・カテゴリー</span><select name="category" class="text">
<option value="" selected hidden>選択してください</option>
<option value="1">5科参考書</option>
<option value="2">情報参考書</option>
<option value="3">国語参考書</option>
<option value="4">数学参考書</option>
<option value="5">社会参考書</option>
<option value="6">英語参考書</option>
<option value="7">理科参考書</option>
<option value="8">その他の参考書</option></select><br>
<span class="yohaku">・値段　　　</span><input type="text" class="text"><br>
<span class="file">・商品画像　　</span><input type="file" class="filebutton" accept="image/*"><br>
<input type="submit" class="button2" value="更新">
</form>
</body>
</html>