<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select imgPath from how_to_pay where id = 1";
$result = $db->MySql($sql);
if(file_exists("../img/howtopay/".$result[0]['imgPath'])) unlink("../img/howtopay/".$result[0]['imgPath']);
$sql = "UPDATE how_to_pay SET imgPath = NULL WHERE id = 1";
if($db->ExecuteSQL($sql,true)){
    echo true;
}
exit;
?>