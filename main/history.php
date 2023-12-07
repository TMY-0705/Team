<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/history.css">
	<title>Document</title>
</head>

<body>
	<?php require 'header.php' ?>
	<h1>注文履歴</h1>
	<hr>
	<?php 
		$sql = $db -> query("SELECT * FROM Histories");
		$result = $sql -> fetchAll();

		$sql = $db -> query(
			"SELECT * FROM Histories LEFT JOIN Histories_detail 
			ON Histories.history_id = Histories_detail.history_id"
		);
		$detail = $sql -> fetchAll();

		foreach($result as $sheet){
			echo "<div class='master'>";

				echo "<table class='frame'>";

					echo "<thead class='element'><tr>";
						echo "<th class='item'>注文日</th>";
						echo "<th class='item'>合計金額</th>";
						echo "<th class='item'>お届け先</th>";
					echo "</tr></thead>";

					echo "<tbody class='element'><tr>";
						echo "<td class='item'>", $sheet['history_date'], "</td>";
						echo "<td class='item'>￥2000</td>";
						echo "<td class='item'>000-0000</td>";
					echo "</tr></tbody>";

				echo "</table>";

			foreach($detail as $row){
			
				echo "<div class='content'>";

					echo "<div id='product_detail'>";
						echo "<img src='../img/book.jpg' class='productimg'>";
					echo "</div>";

					echo "<div class='detail'>";
						echo "<h1 class='title'>タイトル</h1>";
						echo "<h1 class='title'>￥1000</h1>";
						echo "<p class='count'>数量: | <a href='#'>削除</a></p>";
					echo "</div>";

					echo "<div id='eva'>";
						echo "<form action='#'>";
							echo "<h1 class='eve'>評価する</h2>";
							echo "😂🤣😅";
						echo "</form>";
					echo "</div>";

				echo "</div>";
			}
			echo "</div>";
			echo "<hr>";
		}
	?>
</body>

</html>