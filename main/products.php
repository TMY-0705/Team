<?php require '../php_init/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/search_result.css">
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
      
		<table class="menu">
			<?php
				if($name)
				    echo $name,' の検索結果';
					$sql = $db -> query("SELECT * FROM Products WHERE product_name LIKE '%$name%'");	
				else if($maker)
				    echo $maker,' の検索結果'
					$sql = $db -> query("SELECT * FROM Products JOIN Categories
					ON Products.category_id = Categories.category_id WHERE product_maker LIKE '%$maker%'");
					
				else
					$sql = $db -> query('SELECT * FROM Products');
				$cnt = 0;

				echo '<tr>';
				foreach($sql as $row){
					$cnt++; // 1 2 3
					echo '<td><a href=product_detail.php?id=', $row['product_id'],
						 '><img src="../img/', $row['product_image'], 
						 '" alt="', $row['product_name'],
						 '"></a></td>';
					if($cnt % 3 == 0) echo '</tr><tr>';
				}
			?>
		</table>
	</body>
</html>