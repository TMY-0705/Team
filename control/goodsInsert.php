<?php require '../php_init/login_check_control.php' ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="../css/goodsInsert.css">
</head>
<body>
<?php require 'header3.php' ?>
<?php require '../php_init/db-connect.php' ?>
<form action="goodsInsert-finish.php" method="post" enctype="multipart/form-data">
<span class="yohaku">・商品名　　</span><input type="text" class="text" name="pname" required><br>
<span class="yohaku">・メーカー名</span><input type="text" class="text" name="mname" required><br>
<span class="yohaku">・在庫数　　</span><input type="text" class="text" name="stock" required><br>
<span class="yohaku">・カテゴリー</span><select name="category" class="text" required>
<option value="" selected hidden required>選択してください</option>
<option value="1">5科参考書</option>
<option value="2">情報参考書</option>
<option value="3">国語参考書</option>
<option value="4">数学参考書</option>
<option value="5">社会参考書</option>
<option value="6">英語参考書</option>
<option value="7">理科参考書</option>
<option value="8">その他の参考書</option></select><br>
<span class="yohaku">・値段　　　</span><input type="text" class="text" name="price" required><br>
<span class="yohaku">・商品画像　　</span><input type="file" class="filebutton" name="upload_image" accept="image/*" required><br>
<input type="submit" class="button2" value="登録">
</form>
</body>
</html>