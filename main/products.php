<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/products.css">
		<?php
			$name = $_GET['key'] ?? null;
			$maker = $_GET['maker'] ?? null;

			if($name)
				echo '<title>', $name, ' - 商品検索結果</title>';
			else if($maker)
				echo '<title>', $maker, ' - メーカー検索結果</title>';
			else
				echo '<title>トップ - 商品一覧</title>';
		?>
	</head>
	<body>
		<link rel="stylesheet" href="../css/header.css">

		<!-- header -->
		<?php require 'header.php'; ?>
		<?php require '../php_init/db-connect.php'; ?>

		<?php
			if($name) {
				$sql = $db -> query("SELECT * FROM Products WHERE product_name LIKE '%$name%'");
				echo "<p class='result'>$name の検索結果</p>";
			} else if($maker) {
				$sql = $db -> query("SELECT * FROM Products JOIN Categories
				ON Products.category_id = Categories.category_id WHERE product_maker LIKE '%$maker%'");
				echo "<p class='result'>$maker の検索結果</p>";
			} else {
				$sql = $db -> query('SELECT * FROM Products');
			}
			$cnt = 0;
			
		?>

		<table class="menu">
			<?php
				echo '<tr>';
				foreach($sql as $row){
					if($row['product_stock'] > 0) {
						echo '<td><a href=product_detail.php?id=', $row['product_id'],
							'><img src="../img/', $row['product_image'] ? $row['product_image'] : 'NoImage.png', 
							'" alt="', $row['product_name'],
							'"></a></td>';
					} else {
						continue;
					}
					
					$cnt++; // 1 2 3
					if($cnt % 3 == 0) echo '</tr><tr>';
				}
				echo '</tr>';
			?>
		</table>
	</body>
</html>