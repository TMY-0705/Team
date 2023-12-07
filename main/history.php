<?php require '../php_init/login_check.php' ?>
<?php require '../php_init/db-connect.php' ?>
<?php $rated = false; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/history.css">
	<title>注文履歴一覧</title>
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

			$current_id = $detail[0]['history_id'];
			$target_id = $current_id;

			foreach($result as $sheet){
				$total_cost = 0;
				foreach($detail as $cost){
					if($cost['history_id'] == $target_id)
						$total_cost += $cost['product_price'] * $cost['history_detail_amount'];
				}
				$postal = (substr($accinfo['account_postal'],0,3)."-".substr($accinfo['account_postal'],3)) ?? "行方不明";

				echo "<div class='master'>", "\n";

					echo "<table class='frame'>", "\n";

						echo "<thead class='element'><tr>", "\n";
							echo "<th class='item1'>注文日</th>", "\n";
							echo "<th class='item2'>合計金額</th>", "\n";
							echo "<th class='item3'>お届け先</th>", "\n";
						echo "</tr></thead>", "\n";

						echo "<tbody class='element'><tr>", "\n";
							echo "<td class='item1'>", date("Y年m月d日", strtotime($sheet['history_date'])), "</td>", "\n";
							echo "<td class='item2'>￥", number_format($total_cost), "</td>", "\n";
							echo "<td class='item3'>", $postal, "</td>", "\n";
						echo "</tr></tbody>", "\n";

					echo "</table>", "\n";

				foreach($detail as $row){
					$current_id = $row['history_id'];

					// echo $current_id, ", ", $target_id, "<br>", "\n";
					if($target_id > $current_id) {
						continue;
					}
					else if($target_id < $current_id) {
						$target_id = $row['history_id'];
						$current_id = $detail[0]['history_id'];
						break;
					}
					echo "<br>", "\n";
					echo "<div class='content'>", "\n";

						echo "<div>", "\n";
						echo "<img class='product_img' src='../img/".($row['product_image'] ? $row['product_image'] : 'NoImage.png')."'>", "\n";
						echo "</div>", "\n";

						echo "<div class='detail'>", "\n";
							echo "<span class='title'>".$row['product_name']."<br>", "\n";
							echo "￥".number_format($row['product_price'])."</span><br><br>", "\n";
							echo "<span class='count'>数量: ".number_format($row['history_detail_amount'])." 冊</span>", "\n";
						echo "</div>", "\n";

						echo "<form class='ratezone' method='POST' action='rating.php'>", "\n";
							echo "<span class='rate_txt'>評価決定欄</span><br><br>", "\n";
							echo "<span id='rate'>", "\n";
							if($row['history_detail_rate']){
								echo "星".$row['history_detail_rate'];
								$rated = true;
							} else echo "？";
							echo "</span><br>", "\n";
							echo "<input class='rater' id='rater' type='range' name='rate' min='1' max='5' value='";
							if($row['history_detail_rate']){
								echo $row['history_detail_rate'];
							} else echo "0";
							echo "' onInput='rateValueChange()'><br><br>", "\n";
							echo "<input type='hidden' name='product_id' value=".$row['product_id'].">", "\n";
							echo "<input type='hidden' name='account_id' value=".$row['account_id'].">", "\n";
							
							echo "<button class='submittt' id='submittt' disabled>", "\n";
							if($row['history_detail_rate']) echo "評価済み", "\n";
							else echo "？", "\n";
							echo "</button>", "\n";
						echo "</form>", "\n";

					echo "</div>", "\n";
				}
				echo "</div>", "\n";
				echo "<hr>", "\n";
				
			}
			echo "<input type='hidden' id='rated' value=".$rated.">", "\n";
		?>
		<script src="../js/history.js" defer></script>
	</div>
</body>

</html>