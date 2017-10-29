<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$memberid = $_POST['memberid'];
$address = $_POST['address'];
$update = "UPDATE member SET address = '{$address}' WHERE memberID = {$memberid}";
$db->ExecuteSQL($update);
exit;
?>