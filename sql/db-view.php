<?php session_start() ?>
<?php require '../php_init/db-connect.php' ?>

<style>
    table, th, td{
        border: 1px solid #000000;
        border-collapse: collapse;
        padding: 4px;
    }
</style>

<?php
	echo password_hash("Admin", PASSWORD_DEFAULT);
	// 入力した情報を取得する
	$name = $_POST['name'] ?? null;
	$mail = $_POST['mail'] ?? null;
	$pass1 = $_POST['pass1'] ?? null;
	$pass2 = $_POST['pass2'] ?? null;
	$postcode = $_POST['postcode'] ?? null;
	$prefecture = $_POST['prefecture'] ?? null;
	$town = $_POST['town'] ?? null;
	$house = $_POST['house'] ?? null;

	// データを挿入する
	try {
		$sqls = [
			0 => "SELECT * FROM Accounts",
			1 => "SELECT * FROM Categories",
			2 => "SELECT * FROM Products",
			3 => "SELECT * FROM Histories",
			4 => "SELECT * FROM Histories_detail",
			5 => "SELECT * FROM Carts",
		];

		foreach($sqls as $sql){
			$res = $db -> query($sql, PDO::FETCH_ASSOC);
			echo '<table>';
			foreach($res as $row){
				echo '<tr>';
				foreach($row as $i){
					echo '<td>', $i,'</td>';
				}
				echo '</tr>';
			}
			echo '</table><br>';
		}

	} catch (PDOException $e) {
		echo '<h2>PDOの例外発生！！！<br>', $e, "</h2>";
	} catch (Exception $e) {
		echo '<h2>通常の例外発生！！！<br>', $e, "</h2>";
	} catch (Throwable $e) {
		echo '<h2>特殊な例外発生！！！<br>', $e, "</h2>";
	}
?>