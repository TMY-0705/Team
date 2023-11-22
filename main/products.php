<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/search_result.css">
		<title>Document</title>
	</head>
	<body>
		<link rel="stylesheet" href="../css/header.css">

		<!-- header -->
		<?php require 'header.php'; ?>
		<?php require '../php_init/db-connect.php'; ?>

		<table class="menu">
			<?php
				$sql = $db -> query('SELECT * FROM Products');
				$cnt = 0;

				echo '<tr>';
				foreach($sql as $row){
					$cnt++; // 1 2 3
					echo '<td><a href="#"><img src="../img/', $row['product_image'],'" alt="4"></a></td>';
					if($cnt % 3 == 0) echo '</tr><tr>';
				}
			?>
		</table>
	</body>
</html>