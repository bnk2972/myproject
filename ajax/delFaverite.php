<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$productid = $_POST['productid'];
$DELETE = "DELETE FROM addfaverite WHERE memberID = {$_SESSION['MEMBER_ID']} AND productID = {$productid}";
$db->ExecuteSQL($DELETE);  
exit;
?>