<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$memberid = $_POST['memberid'];
$sql = "SELECT COUNT(*) AS countcart FROM tmp_order_detail WHERE memberid = {$memberid}";
$result = $db->MySQL($sql);
echo $result[0]['countcart'];
exit;
?>