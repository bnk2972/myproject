<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$DEL = "DELETE FROM `order` WHERE orderID = '{$_POST['orderid']}'";
$db->ExecuteSQL($DEL,true);
$DEL = "DELETE FROM order_detail WHERE orderID = '{$_POST['orderid']}'";
$db->ExecuteSQL($DEL,true);
exit;
?>