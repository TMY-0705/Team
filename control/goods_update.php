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
<span class="yohaku">・商品名　　</span><input type="text" class="text"><br>
<span class="yohaku">・メーカー名</span><input type="text" class="text"><br>
<span class="yohaku">・在庫数　　</span><input type="text" class="text"><br>
<span class="yohaku">・カテゴリー</span><input type="text" class="text"><br>
<span class="yohaku">・値段　　　</span><input type="text" class="text"><br>
<span class="file">・商品画像　</span><input type="file" class="button" accept="image/*"><br>
<input type="button" class="button2" onclick="location.href='update_finish.php'" value="更新">