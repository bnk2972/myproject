<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$repair = "UPDATE `order` SET statusID = 7 WHERE orderID = {$_POST['orderid']}";
$db->ExecuteSQL($repair);
exit;
?>