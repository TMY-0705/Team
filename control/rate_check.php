<?php require '../php_init/db-connect.php' ?>
<!DOCTYPE html>
<html lang="ja">
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB選択</title>
    <link rel="stylesheet" href="../css/header4.css">
    <link rel="stylesheet" href="../css/DB_select.css">
</head>
<body>
	<link rel="stylesheet" href="../css/rate_check.css">
	<?php require 'header4.php' ?>
    
	<div class="detail">
	    <img src='../img/<?= $res['product_image'] ?>' alt='<?= $res['product_name'] ?>の画像がでてナイ！'>
		<table>
			<tbody>
				<tr>
					<td>メーカー：
						<?php
						if (isset($res['product_maker'])) {
							echo $res['product_maker'];
						}
						?>
					</td>
					<td>カテゴリー：
						<?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}
						?>
					</td>
				</tr>
				<tr>
					<td>商品名：<?php
						if (isset($res['product_name'])) {
							echo $res['product_name'];
						}
						?></td>
					<td>値段：￥
					<?php
						if (isset($res['product_price'])) {
							echo $res['product_price'];
						}
						?>
					</td>
				</tr>
				<tr>
					<td>在庫数：
					<?php
						if (isset($res['product_stock'])) {
							echo $res['product_stock'];
						}
						?>冊
					</td>
				</tr>
				<tr>
					<td>
						<?php
						$hyouka = $db->query(
							"SELECT SUM(history_detail_rate) as sum
 							 FROM Histories_detail
 							WHERE Histories_detail.product_id = $id"

						);
						if ($hyouka) {
							$hyoukaResult = $hyouka->fetch(PDO::FETCH_ASSOC);
                            $hyoukaSum = $hyoukaResult['sum'];


						} 		
						$sumQuery = $db->query(
							"SELECT COUNT(history_detail_rate) as count FROM Histories_detail
							WHERE Histories_detail.product_id = $id"
						);
						
						if ($sumQuery) {
							$sumResult = $sumQuery->fetch(PDO::FETCH_ASSOC);
							$sumCount = $sumResult['count'];
						
						}
						if($hyoukaSum&&$sumCount){
                        $hyoukakan = round($hyoukaSum/$sumCount,1);
						}else{
							$hyoukakan=null;
						}
						if ($hyoukakan) {
							echo $hyoukakan;
						
						}else{
							echo '評価なし';
						}
						$hosi = round($hyoukakan ?? 0);
						for($i=1;$i<=5;$i++){
							if($hosi>0){
								echo '★';
								$hosi--;
							}else{
                                echo '☆';
							}
						}	
						
						if ($sumCount) {
						
						
							echo $sumCount;
						} else {
							echo '0';
						}
						

						?>件</td>
				</tr>
				<?php
				for($i =1;$i<=5;$i++){
				
				$sql = $db->query("SELECT COUNT(product_id) as count FROM Histories_detail
				WHERE Histories_detail.history_detail_rate = $i");
                if ($sql) {
					$hyoukaResult = $sql->fetch(PDO::FETCH_ASSOC);
					$hyouka = $hyoukaResult['count'];
                    $hiritu = round($hyouka/$sumCount,1);
					echo '<tr><td>星',$i,'つ', $hyouka,'件',$hiritu,'%</td></tr>';

				}else{
					echo '<tr><td>星',$i,'つ0件0%</td></tr>';
				}

				}
			
				?>
			</tbody>
		</table>
	</div>
</body>