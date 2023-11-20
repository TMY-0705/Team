<?php require '../php_init/db-connect.php' ?>
<?php
	$user=$_POST['user_id'];
	$pass=$_POST['password'];

	$sql = $db -> prepare('SELECT * FROM Accounts WHERE account_email=?');
	$sql -> execute([$user]); 
    
	$res = $sql -> fetch(PDO::FETCH_ASSOC);

    // $logged = password_verify($pass, password_hash($pass, PASSWORD_DEFAULT));

    if($res)
?>