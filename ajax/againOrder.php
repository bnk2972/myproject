<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$SQL = "UPDATE `order` SET statusID = 1  WHERE orderID = {$_POST['id']}";
$db->ExecuteSQL($SQL);
exit;
?>