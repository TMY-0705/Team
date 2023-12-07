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
	<div class="base">
		<p class="menu_name">注文履歴</p>
		<hr>
		<?php 
			$sql = $db -> query("SELECT * FROM Histories");
			$result = $sql -> fetchAll();
			$sql = $db -> query("SELECT * FROM Accounts WHERE account_id = ".$_SESSION['loginfo']['acc_id']);
			$accinfo = $sql -> fetch();

			$sql = $db -> query(
				"SELECT * FROM Histories LEFT JOIN Histories_detail 
				ON Histories.history_id = Histories_detail.history_id
				JOIN Products ON Histories_detail.product_id = Products.product_id"
			);
			$detail = $sql -> fetchAll();

			foreach($result as $sheet){
				$total_cost = 0;
				foreach($detail as $cost){
					$total_cost += $cost['product_price'];
				}
				$postal = (substr($accinfo['account_postal'],0,3)."-".substr($accinfo['account_postal'],3)) ?? "行方不明";

				echo "<div class='master'>";

					echo "<table class='frame'>";

						echo "<thead class='element'><tr>";
							echo "<th class='item1'>注文日</th>";
							echo "<th class='item2'>合計金額</th>";
							echo "<th class='item3'>お届け先</th>";
						echo "</tr></thead>";

						echo "<tbody class='element'><tr>";
							echo "<td class='item1'>", date("Y年m月d日", strtotime($sheet['history_date'])), "</td>";
							echo "<td class='item2'>￥", $total_cost, "</td>";
							echo "<td class='item3'>", $postal, "</td>";
						echo "</tr></tbody>";

					echo "</table>";

				foreach($detail as $row){
				
					echo "<div class='content'>";

						echo "<div class='image'>";
							echo "<img src='../img/".$row['product_image']."' class='productimg'>";
						echo "</div>";

						echo "<div class='detail'>";
							echo "<h1 class='title'>".$row['product_name']."</h1>";
							echo "<h1 class='title'>￥".$row['product_price']."</h1>";
							echo "<p class='count'>数量: ".$row['history_detail_amount']."</p>";
						echo "</div>";

						echo "<div id='eva'>";
							echo "<form method='POST' action='rating.php'>";
								echo "<input type='range' min='1' max='5' value='3'>";
								echo "<span id='rate'>3</span><br>";
								echo "<button class='eve'>評価する</button>";
							echo "</form>";
						echo "</div>";

					echo "</div>";
				}
				echo "</div>";
				echo "<hr>";
			}
		?>
	</div>
</body>

</html>