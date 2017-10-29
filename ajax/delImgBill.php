<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$update = "UPDATE `order` SET path = '',statusID = 1, create_date_apply = NULL WHERE orderid = {$_POST['orderid']}";
$db->ExecuteSQL($update,true);
exit;
?>