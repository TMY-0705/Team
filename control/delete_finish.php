<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除完了</title>
    <link rel="stylesheet" href="../css/header1.css">
    <link rel="stylesheet" href="../css/goodsInsert-finish.css">
</head>
<body>
	<?php require 'header.php' ?>
    <?php require '../php_init/db-connect.php'; ?>
    <?php
    try{
    $id = $_GET['id'];
	
    $stmt = $pdo->prepare("DELETE FROM Products 
                            WHERE id = $id ");
    $stmt->execute();
 
} catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
     
} finally {
    // DB接続を閉じる
    $pdo = null;
}
 
?>
    
	<br><br><br><br>
	<h1>削除しました。</h1>
	<br><br>
	<button type="button" class="button" onclick="location.href='DB_select.php'">一覧へ戻る</button>
</html>