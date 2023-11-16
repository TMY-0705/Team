<?php
    const SERVER = "mysql218.phy.lolipop.lan";
    const DBNAME = "LAA1517436-team";
    const USER = "LAA1517436";
    const PASS = "VDM0TURhK0FCNCRF";
    const DBINFO = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';                
    $db = new PDO(DBINFO, USER, PASS);

	$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>